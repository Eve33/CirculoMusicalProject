<?php
 session_start();
 
class User
{
    private $db;

    public function __construct($host, $port, $dbname, $dbuser, $password) {
        $dsn = "mysql:host=$host; dbname=$dbname;";
        try{
            $this->db = new PDO($dsn, $dbuser, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);       
        }
        catch(PDOException $ex)
        {
            echo 'Error en conexión con la conecion a la BD' . $ex.getMessage();
            die();
        }         
    }

    //Para Sesiones y registro de usuarios

    public function signUp($nombre, $apellidoPat, $apellidoMat, $direccion, $fechaN, $telefono, $email, $usuario, $password){
        try {  

            $tipoUsuario = '2';

            $sql = "INSERT INTO `info_usuario`(`nombre`, `apellidoPat`, `apellidoMat`, `direccion`, `fechaNac`, `telefono`, `email`) VALUES (?,?,?,?,?,?,?)";
            $sql1 = "SELECT `idInfoUsuario` FROM `info_usuario` WHERE `telefono`= $telefono";
            $sql2 = "INSERT INTO `usuario`(`usuario`, `password`,`tipoUsuario` , `idInfoUsuario`) VALUES (?,?,?,?)";

            $instruccion = $this->db->prepare($sql);
            $result=$this->db->prepare($sql1);
            $instruccion2 = $this->db->prepare($sql2);

            $instruccion->execute(array($nombre, $apellidoPat, $apellidoMat, $direccion, $fechaN, $telefono, $email));
            $result->execute(array($email));
            $idInfoUsuario = $result->fetch(PDO::FETCH_ASSOC)['idInfoUsuario'];
            $instruccion2->execute(array($usuario, $password, $tipoUsuario, $idInfoUsuario));

            $_SESSION['signinuser'] = "El usuario se ha registrado correctamente.";
            header('Location: ../SignUp/SignUp.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['signinuser'] = "El usuario no se ha registrado." .  $ex.getMessage();            
            header('Location: ../SignUp/SignUp.php');  
        }
    }

    public function logIn($usuario, $password){
        try{
            $resultado = $this->db->prepare("SELECT * FROM `usuario` WHERE `usuario` = ? AND `password` = ?");
            $resultado->execute(array($usuario, $password));
            $renglon = $resultado->fetchAll();
            
            if(count($renglon) == 1)
            {
                return true;
            }
            else{
                $_SESSION['messageAlert'] = "El usuario o la contraseña no son válidos con algun registro."; 
                header('Location: ../LogIn/LogIn.php');                                 
                return false;
            }
       }catch(PDOException $e)
       {
            $_SESSION['messageAlert'] = "Error en verificar usuario.". $e->getMessage();
            header('Location: ../LogIn/LogIn.php');  
       } 
    }

    public function getTypeUser($user) {
        try{
            $sql = $this->db->prepare("SELECT * FROM `usuario` WHERE `usuario` = ?");
            $sql->execute(array($user));
            $typeUser = $sql->fetch(PDO::FETCH_ASSOC)['idUsuario'];
            return $typeUser;
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    //PARA ADMINISTRADOR

    //Para ARTISTA del admin

    public function consultArtist(){       
        try {
            $sql = "SELECT * FROM `artista`";
            $artists = $this->db->prepare($sql);  
            $artists->execute();
            $table = $artists;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de artistas." . $ex->getMessage();
        } 
    }

    public function insertArtist($nombre, $genero, $biografia, $precio){
        try {  
            $sql = "INSERT INTO `artista`(`nombre`, `genero`, `biografia`, `precioContratacion`) VALUES (?,?,?,?)";
            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($nombre, $genero, $biografia, $precio));

            $_SESSION['insertArtist'] = "El artista se ha dado de alta correctamente.";
            header('Location: ../UserAdmin/AdminArtist.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['insertArtist'] = "El artista no se ha dado de alta correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminArtist.php');  
        }
    }

    public function deleteArtist($idArt){
        try {  
            $sql = "DELETE FROM `artista` WHERE `idArtista` = ?";
            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($idArt));

            $_SESSION['deleteArtist'] = "El artista se ha dado de baja correctamente.";
            header('Location: ../UserAdmin/AdminArtist.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteArtist'] = "El artista no se ha dado de baja correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminArtist.php');  
        }
    }

    //Para PRODUCTO del admin

    public function consultProduct(){       
        try {
            $sql = "SELECT * FROM `producto`";
            $products = $this->db->prepare($sql);  
            $products->execute();
            $table = $products;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de productos." . $ex->getMessage();
        } 
    }

    public function insertProduct($nombre, $desc, $cat, $pUni,$pVen,$pRen){
        try {  
            $sql = "INSERT INTO `producto`(`nombre`, `descripcion`, `categoria`, `precioUnitario`, `precioVenta`, `precioRenta`) VALUES (?,?,?,?,?,?)";

            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($nombre, $desc, $cat, $pUni,$pVen,$pRen));

            $_SESSION['insertProd'] = "El producto se ha dado de alta correctamente.";
            header('Location: ../UserAdmin/AdminProducts.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['insertProd'] = "El producto no se ha dado de alta correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminProducts.php');  
        }
    }

    public function deleteProduct($idProd){
        try {  
            $sql = "DELETE FROM `producto` WHERE `idProducto` = ?";

            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($idProd));

            $_SESSION['deleteProd'] = "El producto se ha dado de baja correctamente.";
            header('Location: ../UserAdmin/AdminProducts.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteProd'] = "El producto no se ha dado de baja correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminProducts.php');  
        }
    }

    //Para INVENTARIO del admin

    public function consultInvent(){
        try {
            $sql = "SELECT * FROM `inventario`";
            $invents = $this->db->prepare($sql);  
            $invents->execute();
            $table = $invents;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de inventario." . $ex->getMessage();
        } 
    }
  
    public function consultProdInvent(){
        try {
            $sql = "SELECT `idProducto` FROM `inventario`";
            $invents = $this->db->prepare($sql);  
            $invents->execute();
            $table = $invents;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener los productos de inventario." . $ex->getMessage();
        } 
    }

    public function insertInvent($idPInv, $cPInv){
        try {  

            $timeActual = date('H:i:s');
            $dateActual = date('Y-m-d');

            $sql = "SELECT * FROM `inventario` WHERE `idProducto` = ?";
            $products = $this->db->prepare($sql);  
            $products->execute(array($idPInv));
            $v = $products->fetch(PDO::FETCH_ASSOC);

            $idPSelec = $v['idProducto'];
            $cantAnt = $v['cantidadExistencia'];

            if(count($v) == 1)
            {
                $sql1 = "INSERT INTO `inventario`(`idProducto`, `cantidadExistencia`, `fechaEntrada`, `horaEntrada`) VALUES (?,?,?,?)";
                $instruccion = $this->db->prepare($sql1);
                $instruccion->execute(array($idPInv, $cPInv, $dateActual, $timeActual));
            }
            else{
                $cPInv += $cantAnt;
                $sql2 = "UPDATE `inventario` SET `cantidadExistencia`=?,`fechaEntrada`=?,`horaEntrada`=? WHERE `idProducto` = ?";
                $instruccion2 = $this->db->prepare($sql2);
                $instruccion2->execute(array($cPInv, $dateActual, $timeActual, $idPInv));
            }

            $_SESSION['insertInvent'] = "El producto se ha añadido a tu inventario correctamente.";
            header('Location: ../UserAdmin/AdminInvent.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['insertInvent'] = "El producto no se ha añadido a tu inventario correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminInvent.php');  
        }
    }

    public function updateInvent($idPInv, $cPInvRest){
        
        try{
            $timeActual = date('H:i:s');
            $dateActual = date('Y-m-d');

            $sql = "SELECT * FROM `inventario` WHERE `idProducto` = ?";
            $products = $this->db->prepare($sql);  
            $products->execute(array($idPInv));
            $v = $products->fetch(PDO::FETCH_ASSOC);

            $idPSelec = $v['idProducto'];
            $cantAnt = $v['cantidadExistencia'];

            if($cantAnt>=$cPInvRest)
            {
                $cantAnt -= $cPInvRest;
                $sql2 = "UPDATE `inventario` SET `cantidadExistencia`=? WHERE `idProducto` = ?";
                $instruccion2 = $this->db->prepare($sql2);
                $instruccion2->execute(array($cantAnt, $idPInv));

                $_SESSION['deleteInvent'] = "El producto se ha restado de tu inventario correctamente.";
                header('Location: ../UserAdmin/AdminInvent.php');
            }
            else{
                $_SESSION['deleteInvent'] = "Error, la cantidad excede de existencias del producto.";
                header('Location: ../UserAdmin/AdminInvent.php');  
            }  
        }
        catch (PDOException $ex) {
            echo "Error al restar producto a tu inventario." . $ex->getMessage();
        } 
    }

    //Para COMENTARIOS PUBLICOS
    public function consultComentsPub(){
        try {
            $sql = "SELECT * FROM `comentPub`";
            $coments = $this->db->prepare($sql);  
            $coments->execute();
            $table = $coments;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de comentarios publicos" . $ex->getMessage();
        }
    }

    public function insertComentPub($nomPub, $emailPub, $telefPub, $mensajePub){
        try {  
            $sql = "INSERT INTO `comentpub`(`nombre`, `email`, `telefono`, `mensaje`) VALUES (?,?,?,?)";
            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($nomPub, $emailPub, $telefPub, $mensajePub));

            $_SESSION['comentsPub'] = "Se ha enviado correctamente tu comentario.";
            header('Location: ../Contact/Contact.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['comentsPub'] = "Error No se ha enviado tu comentario." . $ex.getMessage();   
            header('Location: ../Contact/Contact.php');  
        }
    }

    //Para solicitudes especificas
    public function consultSolicEvent(){
        try {
            $option = "Evento";
            $state = "En Espera";
            $sql = "SELECT * FROM `solicitud` WHERE `asunto` = ? AND `estado` = ?";
            $solicitudE = $this->db->prepare($sql);  
            $solicitudE->execute(array($option, $state));
            $table = $solicitudE;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de solicitud de Eventos." . $ex->getMessage();
        } 
    }

    public function consultSolicRenta(){
        try {
            $option = "Renta";
            $state = "En Espera";
            $sql = "SELECT * FROM `solicitud` WHERE `asunto` = ? AND `estado` = ?";
            $solicitudE = $this->db->prepare($sql);  
            $solicitudE->execute(array($option, $state));
            $table = $solicitudE;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de solicitud de Eventos." . $ex->getMessage();
        } 
    }

    public function consultSolicVenta(){
        try {
            $option = "Venta";
            $state = "En Espera";
            $sql = "SELECT * FROM `solicitud` WHERE `asunto` = ? AND `estado` = ?";
            $solicitudE = $this->db->prepare($sql);  
            $solicitudE->execute(array($option, $state));
            $table = $solicitudE;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de solicitud de Eventos." . $ex->getMessage();
        } 
    }

    //Para EVENTOS del admin
    public function consultEvent(){       
        try {
            $sql = "SELECT * FROM `evento`";
            $events = $this->db->prepare($sql);  
            $events->execute();
            $table = $events;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de evento." . $ex->getMessage();
        } 
    }

    public function insertEvent($idSolic, $nombreEve, $fecha, $locacion, $nEntr, $pEntr, $idArt){
        try {  
            $sql = "SELECT * FROM `evento`";
            $eventValidator = $this->db->prepare($sql);  
            $eventValidator->execute();
            $v = $eventValidator->fetch(PDO::FETCH_ASSOC);

            $fechaV = $v['fecha'];
            $idArtV = $v['idArtista'];
            $LocV = $v['locacion'];

            if($fechaV == $fecha && $idArtV == $idArt)
            {
                $_SESSION['insertEve'] = "El artista no esta disponible en la fecha ".$fecha.".";            
                header('Location: ../UserAdmin/AdminEvents.php'); 
            }
            elseif ($fechaV != $fecha && $LocV != $LocV) {
                $_SESSION['insertEve'] = "El lugar no esta disponible en la fecha ".$fecha.".";            
                header('Location: ../UserAdmin/AdminEvents.php'); 
            }
            else{

                $state = "Aprobado";
                $sql0 = "SELECT `precioContratacion`  FROM `artista` WHERE `idArtista` = ?";
                $sql1 = "INSERT INTO `evento`(`idSolicitud`,`nombre`, `fecha`, `locacion`, `numeroEntradas`, `precioEntrada`, `idArtista`, `precioTotal`) VALUES (?,?,?,?,?,?,?,?)";
                $sql2 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
                $artist = $this->db->prepare($sql);
                $instruccion = $this->db->prepare($sql1);              
                $instruccion2 = $this->db->prepare($sql2);
                $artist->execute(array($idArt));
                $precioContArt = $artist->fetch(PDO::FETCH_ASSOC)['precioContratacion'];
                $precioT = floatval($precioContArt) + intval($nEntr) *floatval($pEntr) * 0.3;
                $instruccion->execute(array($idSolic, $nombreEve, $fecha, $locacion, $nEntr, $pEntr, $idArt, $precioT));
                $instruccion2->execute(array($state, $idSolic));

                $_SESSION['insertEve'] = "El evento se ha dado de alta correctamente.";
                header('Location: ../UserAdmin/AdminEvents.php');  
            }
        }
        catch (PDOException $ex) {
            $_SESSION['insertEve'] = "El evento no se ha dado de alta correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminEvents.php');  
        }
    }

    public function deleteEvent($idEve, $state){
        try {  

            $sql = "SELECT `idSolicitud` FROM `evento` WHERE `idEvento` = ?";
            $solic = $this->db->prepare($sql);  
            $solic->execute(array($idEve));
            $v = $solic->fetch(PDO::FETCH_ASSOC);

            $idSolic = $v['idSolicitud'];

            $sql1 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
            $sql2 = "DELETE FROM `evento` WHERE `idEvento` = ?";
            $instruccion1 = $this->db->prepare($sql1);
            $instruccion2 = $this->db->prepare($sql2);
            $instruccion1->execute(array($state, $idSolic));
            $instruccion2->execute(array($idEve));

            $_SESSION['deleteEve'] = "El evento se ha dado de baja correctamente.";
            header('Location: ../UserAdmin/AdminEvents.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteEve'] = "El evento no se ha dado de baja correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminEvents.php');  
        }
    }

     //Para VENTAS

     public function consultVenta(){
        try {
            $sql = "SELECT * FROM `venta`";
            $vents = $this->db->prepare($sql);  
            $vents->execute();
            $table = $vents;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de Venta." . $ex->getMessage();
        } 
    }

    public function insertVenta($idSolic)
    {
        try{
            $sql = "INSERT INTO `venta`(`idSolicitud`, `fecha`, `hora`, `total`) VALUES (?,?,?,?)";
            $sql2 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
            $instruccion = $this->db->prepare($sql);
            $instruccion2 = $this->db->prepare($sql2);

            $timeActual = date('H:i:s');
            $dateActual = date('Y-m-d');
            $price = 0.00;

            $state = 'Aprobado';

            $instruccion->execute(array($idSolic, $dateActual, $timeActual, $price));
            $instruccion2->execute(array($state, $idSolic));

            $_SESSION['insertVent'] = "La venta se ha insertado correctamente.";
            header('Location: ../UserAdmin/AdminVenta.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['insertVent'] = "La venta no se ha insertado correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminVenta.php');  
        }
    }

    public function deleteVenta($idVent)
    {
        try {  
            $state = "Cancelado";

            $sql = "SELECT `idSolicitud` FROM `venta` WHERE `idVenta` = ?";
            $solic = $this->db->prepare($sql);  
            $solic->execute(array($idVent));
            $v = $solic->fetch(PDO::FETCH_ASSOC);

            $idSolic = $v['idSolicitud'];

            $sql1 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
            $sql2 = "DELETE FROM `venta` WHERE `idVenta` = ?";
            $instruccion1 = $this->db->prepare($sql1);
            $instruccion2 = $this->db->prepare($sql2);
            $instruccion1->execute(array($state, $idSolic));
            $instruccion2->execute(array($idVent));

            $_SESSION['deleteVent'] = "El evento se ha dado de baja correctamente.";
            header('Location: ../UserAdmin/AdminVenta.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteVent'] = "El evento no se ha dado de baja correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminVenta.php');  
        }
    }

    //Para DETALLE VENTA

    public function consultDetalleVent(){
        try {
            $sql = "SELECT * FROM `detalleventa` ORDER BY `idVenta`";
            $detvents = $this->db->prepare($sql);  
            $detvents->execute();
            $table = $detvents;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de detalle venta." . $ex->getMessage();
        } 
    }

    public function insertDV($idVent, $idProd, $cant, $desc){
        try {  
            
            $sql = "SELECT `cantidadExistencia` FROM `inventario` WHERE `idProducto` = ?";
            $prods =$this->db->prepare($sql); 
            $prods->execute(array($idProd));
            $cantPI = $prods->fetch(PDO::FETCH_ASSOC)['cantidadExistencia'];

            if(intval($cantPI)>=$cant)
            {
                $subtotal = 0.00;
                $sql2 = "INSERT INTO `detalleventa`(`idVenta`, `idProducto`, `cantidad`, `descuento`, `subtotal`) VALUES (?,?,?,?,?)";
                $instruccion =$this->db->prepare($sql2); 
                $instruccion->execute(array($idVent, $idProd, $cant, $desc, $subtotal));

                $_SESSION['insertDV'] = "El detalle de venta se ha insertado correctamente.";
                header('Location: ../UserAdmin/AdminVenta.php');                
            }
            else{
                $_SESSION['insertDV'] = "Error, la cantidad excede de existencias del producto.";
                header('Location: ../UserAdmin/AdminVenta.php');  
            }
        }
        catch (PDOException $ex) {
            $_SESSION['insertDV'] = "Error no se ha insertado el detalle de venta." . $ex;   
            header('Location: ../UserAdmin/AdminVenta.php');  
        }
    }

    public function deleteDV($idVent, $idDV) {
        try {
            $sql = "DELETE FROM `detalleventa` WHERE `idVenta` = ? AND `idDetalleVenta` = ?";
            $detr = $this->db->prepare($sql);  
            $detr->execute(array($idVent, $idDV));

            $_SESSION['deleteDV'] = "Se ha eliminado correctamente el detalle de venta.";
            header('Location: ../UserAdmin/AdminVenta.php'); 
        }
        catch (PDOException $ex) {
            $_SESSION['deleteDV'] = "Error no se ha eliminado el detalle de venta." . $ex.getMessage();
            header('Location: ../UserAdmin/AdminVenta.php'); 
        } 
    }

    //Para RENTA

    public function consultRenta(){
        try {
            $sql = "SELECT * FROM `renta`";
            $rents = $this->db->prepare($sql);  
            $rents->execute();
            $table = $rents;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de Renta." . $ex->getMessage();
        } 
    }

    public function insertRenta($idSolic, $cantDias) {
        try{

            $state = "Aprobado";
            $state2 = 'En Renta';

            $sql = "INSERT INTO `renta`(`idSolicitud`, `fecha`, `hora`, `cantDias`, `estado`, `total`) VALUES (?,?,?,?,?,?)";    
            $sql2 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
            $instruccion = $this->db->prepare($sql);
            $instruccion2 = $this->db->prepare($sql2);

            $timeActual = date('H:i:s');
            $dateActual = date('Y-m-d');
            $price = 0.00;

            $instruccion->execute(array($idSolic, $dateActual, $timeActual, $cantDias, $state2, $price));
            $instruccion2->execute(array($state, $idSolic));

            $_SESSION['insertRent'] = "La renta se ha insertado correctamente.";
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['insertRent'] = "La renta no se ha insertado correctamente." . $ex;            
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
    }

    public function updateRenta($idRent, $cDias)  {
        try {  
            $state = "Modificado";

            $sql = "SELECT `idSolicitud` FROM `renta` WHERE `idRenta` = ?";
            $solic = $this->db->prepare($sql);  
            $solic->execute(array($idRent));
            $v = $solic->fetch(PDO::FETCH_ASSOC);

            $idSolic = $v['idSolicitud'];

            $sql1 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
            $sql2 = "UPDATE `renta` SET `cantDias`= ? WHERE `idRenta` = ?";
            $instruccion1 = $this->db->prepare($sql1);
            $instruccion2 = $this->db->prepare($sql2);
            $instruccion1->execute(array($state, $idSolic));
            $instruccion2->execute(array($cDias,$idRent));

            $_SESSION['deleteRent'] = "La renta se ha modificado correctamente.";
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteRent'] = "La renta no se ha eliminado correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
    }

    public function updateRentaEstado($idRent, $estado)  {
        try {  
            $state = "Modificado";

            $sql = "SELECT `idSolicitud` FROM `renta` WHERE `idRenta` = ?";
            $solic = $this->db->prepare($sql);  
            $solic->execute(array($idRent));
            $v = $solic->fetch(PDO::FETCH_ASSOC);

            $idSolic = $v['idSolicitud'];

            $sql1 = "UPDATE `solicitud` SET `estado`= ? WHERE `idSolicitud`=?";
            $sql2 = "UPDATE `renta` SET `estado`= ? WHERE `idRenta` = ?";
            $instruccion1 = $this->db->prepare($sql1);
            $instruccion2 = $this->db->prepare($sql2);
            $instruccion1->execute(array($state, $idSolic));
            $instruccion2->execute(array($estado,$idRent));

            $_SESSION['deleteRent'] = "La renta se ha modificado correctamente.";
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteRent'] = "La renta no se ha eliminado correctamente." . $ex.getMessage();            
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
    }

    //Para DETALLE RENTA 

    public function consultDetalleRent(){
        try {
            $sql = "SELECT * FROM `detallerenta` ORDER BY `idRenta`";
            $detrents = $this->db->prepare($sql);  
            $detrents->execute();
            $table = $detrents;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de detalle renta." . $ex->getMessage();
        } 
    }

    public function insertDR($idRent, $idProd, $cant, $desc){
        try {  
            
            $sql = "SELECT `cantidadExistencia` FROM `inventario` WHERE `idProducto` = ?";
            $prods =$this->db->prepare($sql); 
            $prods->execute(array($idProd));
            $cantPI = $prods->fetch(PDO::FETCH_ASSOC)['cantidadExistencia'];

            if(intval($cantPI)>=$cant)
            {
                $subtotal = 0.00;
                $sql2 = "INSERT INTO `detallerenta`(`idRenta`, `idProducto`, `cantidad`, `descuento`, `subtotal`) VALUES (?,?,?,?,?)";
                $instruccion =$this->db->prepare($sql2); 
                $instruccion->execute(array($idRent, $idProd, $cant, $desc, $subtotal));

                $_SESSION['insertDR'] = "El detalle de renta se ha insertado correctamente.";
                header('Location: ../UserAdmin/AdminRenta.php');                
            }
            else{
                $_SESSION['insertDR'] = "Error, la cantidad excede de existencias del producto.";
                header('Location: ../UserAdmin/AdminRenta.php');  
            }
        }
        catch (PDOException $ex) {
            $_SESSION['insertDR'] = "Error no se ha insertado el detalle de renta." . $ex.getMessage();   
            header('Location: ../UserAdmin/AdminRenta.php');  
        }
    }

    public function deleteDR($idRent, $idDR) {
        try {
            $sql = "DELETE FROM `detallerenta` WHERE `idRenta` = ? AND `idDetalleRenta` = ?";
            $detr = $this->db->prepare($sql);  
            $detr->execute(array($idRent, $idDR));

            $_SESSION['deleteDR'] = "Se ha eliminado correctamente el detalle de renta.";
            header('Location: ../UserAdmin/AdminRenta.php'); 
        }
        catch (PDOException $ex) {
            $_SESSION['deleteDR'] = "Error no se ha eliminado el detalle de renta." . $ex.getMessage();
            header('Location: ../UserAdmin/AdminRenta.php'); 
        } 
    }

    //PARA CLIENTE

    //Para SOLICITUDES del cliente
    public function consultSolicitud(){
        try {
            $user = $_SESSION['loginuser'];
            $sql = "SELECT `idUsuario` FROM `usuario` WHERE `usuario` = ?";
            $solicValidator = $this->db->prepare($sql);  
            $solicValidator->execute(array($user));
            $v = $solicValidator->fetch(PDO::FETCH_ASSOC);

            $idUser = $v['idUsuario'];

            $sql1 = "SELECT * FROM `solicitud` WHERE `idUsuario` = ?";
            $solicitud = $this->db->prepare($sql1);  
            $solicitud->execute(array($idUser));
            $table = $solicitud;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de solicitud." . $ex;
        } 
    }

    public function insertSolic($asuntoS, $descS){
        try {  
            $user = $_SESSION['loginuser'];
            $sql = "SELECT `idUsuario` FROM `usuario` WHERE `usuario` = ?";
            $solicValidator = $this->db->prepare($sql);  
            $solicValidator->execute(array($user));
            $v = $solicValidator->fetch(PDO::FETCH_ASSOC);

            $idUser = $v['idUsuario'];
            $estado = 'En Espera';

            $dateActual = date('Y-m-d');

            $sql1 = "INSERT INTO `solicitud`(`idUsuario`,`fecha`, `asunto`, `descripcion`, `estado`) VALUES (?,?,?,?,?)";
            $instruccion = $this->db->prepare($sql1);
            $instruccion->execute(array($idUser, $dateActual, $asuntoS, $descS, $estado));

            $_SESSION['insertSolic'] = "La solicitud se ha dado de alta correctamente.";           
            header('Location: ../UserClient/ClientSolic.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['insertSolic'] = "La solicitud no se ha dado de alta correctamente." . $ex;            
            header('Location: ../UserClient/ClientSolic.php');  
        }
    }

    public function getYear()
    {
        $table = date("Y");
        return $table;
    }

    public function consultGEvePorMes($mes)  {
        try {
            $varCero = 0.0;
            $sql = "SELECT SUM(`precioTotal`) AS total FROM `evento` WHERE MONTH(`fecha`) = ?";
            $rents = $this->db->prepare($sql);  
            $rents->execute(array($mes));
            $table = $rents->fetch(PDO::FETCH_ASSOC);
                        
            if(is_null($table['total']))
            {
                return $varCero;             
            }
            else {
                return floatval($table['total']);
            }
        }
        catch (PDOException $ex) {
            echo "Error al obtener ganancias ." . $ex->getMessage();
        } 
    }

    public function consultGVentPorMes($mes) {
        try {
            $varCero = 0.0;

            $sql = "SELECT SUM(`total`) AS total  FROM `venta` WHERE MONTH(`fecha`) = ?";
            $rents = $this->db->prepare($sql);  
            $rents->execute(array($mes));
            $table = $rents->fetch(PDO::FETCH_ASSOC);

           if(is_null($table['total']))
           {
               return $varCero;             
            }
           else {
               return floatval($table['total']);
           }
        }
        catch (PDOException $ex) {
            echo "Error al obtener venta ." . $ex->getMessage();
        } 
    }

    public function consultGRentPorMes($mes)  {
        try {
            $varCero = 0.0;

            $sql = "SELECT SUM(`total`) AS total FROM `renta` WHERE MONTH(`fecha`) = ?";
            $rents = $this->db->prepare($sql);  
            $rents->execute(array($mes));
            $table = $rents->fetch(PDO::FETCH_ASSOC);

           if(is_null($table['total']))
           {
               return $varCero;             
            }
           else {
               return floatval($table['total']);
           }

        }
        catch (PDOException $ex) {
            echo "Error al obtener renta ." . $ex->getMessage();
        } 
    }
}
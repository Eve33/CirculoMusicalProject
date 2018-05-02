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
            echo 'Error en conexión con la conecion a la BD' , $ex.getMessage();
            die();
        }         
    }

    //Para Sesiones y registro de usuarios

    public function signUp($nombre, $apellidoPat, $apellidoMat, $direccion, $fechaN, $telefono, $email, $usuario, $password){
        try {  
            $sql = "INSERT INTO `info_usuario`(`nombre`, `apellidoPat`, `apellidoMat`, `direccion`, `fechaNac`, `telefono`, `email`) VALUES (?,?,?,?,?,?,?)";
            $sql1 = "SELECT `idInfoUsuario` FROM `info_usuario` WHERE `telefono`= $telefono";
            $sql2 = "INSERT INTO `usuario`(`usuario`, `password`, `idInfoUsuario`) VALUES (?,?,?)";

            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($nombre, $apellidoPat, $apellidoMat, $direccion, $fechaN, $telefono, $email));

            $result=$this->db->prepare($sql1);
            $result->execute(array($email));

            $idInfoUsuario = $result->fetch(PDO::FETCH_ASSOC)['idInfoUsuario'];

            echo $idInfoUsuario;

            $instruccion2 = $this->db->prepare($sql2);
            $instruccion2->execute(array($usuario, $password, $idInfoUsuario));

            $_SESSION['signinuser'] = "El usuario se ha registrado correctamente.";
            header('Location: ../SignUp/SignUp.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['signinuser'] = "El usuario no se ha registrado correctamente.";            
            echo "Error en el registro de usuario. " . $ex->getMessage();
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
                $_SESSION['loginuser'] = "El usuario o la contraseña no son válidos con algun registro."; 
                header('Location: ../LogIn/LogIn.php');                                 
                return false;
            }
       }catch(PDOException $e)
       {
            $_SESSION['loginuser'] = "Error en verificar usuario.".$e->getMessage();
            header('Location: ../LogIn/LogIn.php');  
       } 
    }

    //Para Administrador

    //Para artistas del admin

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

    public function getIDArtist(){       
        try {
            $sql = "SELECT `idArtista` FROM `artista`";
            $idArt = $this->db->prepare($sql);  
            $idArt->execute();
            $table = $idArt;
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
            $_SESSION['insertArtist'] = "El artista no se ha dado de alta correctamente.";            
            echo "Error en el registro de usuario. " . $ex->getMessage();
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
            $_SESSION['deleteArtist'] = "El artista no se ha dado de baja correctamente.";            
            echo "Error en el registro de usuario. " . $ex->getMessage();
            header('Location: ../UserAdmin/AdminArtist.php');  
        }
    }

    //Para productos del admin
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

    public function getIDProduct(){       
        try {
            $sql = "SELECT `idProducto` FROM `producto`";
            $idArt = $this->db->prepare($sql);  
            $idArt->execute();
            $table = $idArt;
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
            $_SESSION['insertProd'] = "El producto no se ha dado de alta correctamente.";            
            echo "Error en el registro de usuario. " . $ex->getMessage();
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
            $_SESSION['deleteProd'] = "El producto no se ha dado de baja correctamente.";            
            echo "Error en el registro de usuario. " . $ex->getMessage();
            header('Location: ../UserAdmin/AdminProducts.php');  
        }
    }

    //Para inventarios del admin

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
            $_SESSION['insertInvent'] = "El producto no se ha añadido a tu inventario correctamente." .$ex;            
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

    public function getIDProductR(){       
        try {
            $sql = "SELECT `idProducto` FROM `inventario`";
            $idArt = $this->db->prepare($sql);  
            $idArt->execute();
            $table = $idArt;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de productos." . $ex->getMessage();
        } 
    }

    //Para comentarios públicos
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
            $_SESSION['comentsPub'] = "No se ha enviado correctamente tu comentario.";   
            header('Location: ../Contact/Contact.php');  
        }
    }







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

    public function getIDEvent(){       
        try {
            $sql = "SELECT `idEvento` FROM `evento`";
            $idEve = $this->db->prepare($sql);  
            $idEve->execute();
            $table = $idEve;
            return $table;
        }
        catch (PDOException $ex) {
            echo "Error al obtener la tabla de evento." . $ex->getMessage();
        } 
    }

    public function insertEvent($nombreEve, $fecha, $locacion, $nEntr, $pEntr, $idArt){
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
                $sql1 = "INSERT INTO `evento`(`nombre`, `fecha`, `locacion`, `numeroEntradas`, `precioEntrada`, `idArtista`) VALUES (?,?,?,?,?,?)";

                $instruccion = $this->db->prepare($sql1);
                $instruccion->execute(array($nombreEve, $fecha, $locacion, $nEntr, $pEntr, $idArt));

                $_SESSION['insertEve'] = "El evento se ha dado de alta correctamente.".$ex;
                header('Location: ../UserAdmin/AdminEvents.php');  
            }
        }
        catch (PDOException $ex) {
            $_SESSION['insertEve'] = "El evento no se ha dado de alta correctamente.";            
            header('Location: ../UserAdmin/AdminEvents.php');  
        }
    }

    public function deleteEvent($idEve){
        try {  
            $sql = "DELETE FROM `evento` WHERE `idEvento` = ?";

            $instruccion = $this->db->prepare($sql);
            $instruccion->execute(array($idEve));

            $_SESSION['deleteEve'] = "El evento se ha dado de baja correctamente.";
            header('Location: ../UserAdmin/AdminEvents.php');  
        }
        catch (PDOException $ex) {
            $_SESSION['deleteEve'] = "El evento no se ha dado de baja correctamente.";            
            echo "Error en el registro de usuario. " . $ex->getMessage();
            header('Location: ../UserAdmin/AdminEvents.php');  
        }
    }

  




    //Para cliente

    //Para solicitudes del cliente
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
            echo "Error al obtener la tabla de solicitud." . $ex->getMessage();
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
            $_SESSION['insertSolic'] = "La solicitud no se ha dado de alta correctamente.".$ex;            
            echo "Error en el registro de usuario. " . $ex->getMessage();
            header('Location: ../UserClient/ClientSolic.php');  
        }
    }
}


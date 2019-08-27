<?php

declare(strict_types=1);
include 'config.inc.php';
session_start();

function validarUsuario(){
    $CORREO=strtoupper($_POST ['email']);
    $CLAVE =strtoupper($_POST ['pwd']);
    $db=new Conect_MySql();

    //$conexion = mysqli_connect("localhost","root","","bdpaginasweb")
	//or die("Hay un Error de Conexion " . mysqli_error($db));

    $query = "SELECT * FROM tb_usuarios where correoe='".$CORREO."' and clave =MD5('".$CLAVE."')" ;
	//or die("Error in the consult.." . mysqli_error($db));

   // $resultado = $db->query($query);
   $sql = $db->execute($query); 
   $numerofilas = mysqli_num_rows($sql);

    if($numerofilas ==0){
        session_unset();
       echo'<script type="text/javascript">  alert("Usuario Incorrecto"); 
		window.location.href="index.html";   </script>';

    } else {

        while($row = mysqli_fetch_array($sql)) {
            echo " <br>". $row["CORREOE"] . " es valido </br>";
            $_SESSION['USUARIO_LOGUEADO']  = true;
            $_SESSION['LOGIN']  = $row["CORREOE"];
            $_SESSION['NOMBRE']  = $row["NOMBRECOMPLETO"];

            echo'<script type="text/javascript">  window.location.href="solicitud.php";   </script>';
        }

    }
    mysqli_close($db);

}

validarUsuario();

?>
<?php
/**
 * Created by PhpStorm.
 * User: ruldin
 * Date: 16/08/2019
 * Time: 4:50 PM
 */

session_start();

if (!isset($_SESSION['USUARIO_LOGUEADO'])){

    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.html";   </script>';
}


$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];


$conexion = mysqli_connect("localhost","root","","dbpaginasweb") or die("Hay un Error de Conexion " . mysqli_error($conexion));

$query = "Insert into tb_solicitud (nombreingresa,correoingresa,motivo) values ('".$NOMBRECOMPLETO."','".$CORREO."','".$MOTIVO."')" or die("Error in the consult.." . mysqli_error($conexion));

$resultado = $conexion->query($query);

echo "Información grabada con exito!!";




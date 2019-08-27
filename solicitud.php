<!DOCTYPE html>
<html lang="es">

<?php
session_start();
include_once 'config.inc.php';//llamamos a la clase conexion
if (isset($_POST['subir'])) {
    //variables
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];//ruta destino
    $destino = "archivos/" . $nombre;//carpeta donde se guardara el archivo
    
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $correo= $_POST['correo'];
            $nom= $_POST['nom'];
            $descri= $_POST['descripcion'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO TbSolicitud(nombre,correo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$nom','$correo', '$descri','$tamanio','$tipo','$nombre')";
            $query = $db->execute($sql);
            if($query){
                echo "Se guardo correctamente";
            }
        } else {
            echo "Error";
        }
    }
}



if (!isset($_SESSION['USUARIO_LOGUEADO'])){

    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.html";   </script>';
}

$USUARIO = $_SESSION['LOGIN'];
$NOMBRE = $_SESSION['NOMBRE'];

?>

<head>
    <title>Ingreso de Información</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
<body>


<form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label>Correo</label></td>
                        <td><input type="email" name="correo"></td>
                    </tr>

                    <tr>
                        <td><label>Nombre Completo</label></td>
                        <td><input type="text" name="nom"></td>
                    </tr>

                    <tr>
                        <td><label>Descripcion</label></td>
                        <td><textarea name="descripcion"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="file" name="archivo"></td>
                    <tr>
                        <td><input type="submit" value="subir" name="subir"></td>
                        <td><a href="lista.php">lista</a></td>
                    </tr>
                </table>
            </form>            



</body>
</html>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <td>nom</td>
                <td>correo</td>
                <td>descripcion</td>
                <td>tamaño</td>
                <td>tipo</td>
                <td>nombre</td>
            </tr>
        <?php
        //llamamos a la clase que tiene nuestros metodos de conexion
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from     TbSolicitud";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>
                <td><?php echo $datos['nom']; ?></td>
                <td><?php echo $datos['correo']; ?></td>
                <td><?php echo $datos['descripcion']; ?></td>
                <td><?php echo $datos['tamanio']; ?></td>
                <td><?php echo $datos['tipo']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
            </tr>
                
          <?php  } ?>
            
        </table>
    </body>
</html>

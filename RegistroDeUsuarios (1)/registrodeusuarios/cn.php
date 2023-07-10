<?php

    $conexion = mysqli_connect("localhost", "root", "", "registro");
    if(!$conexion){
        echo 'Error en conexion a la base de datos';
    
    }
    else{
        echo'Conexion exitosa a la base de datos';
    }
?>
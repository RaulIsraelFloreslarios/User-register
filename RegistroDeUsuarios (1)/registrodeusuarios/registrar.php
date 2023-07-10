window.location="index.html";
<?php

use function PHPSTORM_META\elementType;

include 'cn.php';

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave  = $_POST["clave"];
$telefono = $_POST["telefono"];

$expresion = "/\w+@\w+\.[a-zA-Z]{2,6}/";




$insetar = "INSERT INTO usuario(nombre, apellidos, correo, usuario, clave, telefono)
VALUES ('$nombre','$apellidos', '$correo', '$usuario', '$clave', '$telefono')";

if(isset($_POST['boton'])){
    if(empty($nombre)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
    }
   else if(empty($apellidos)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
   }
    else if(empty($correo)){
        echo '<script language="javascript">
        window.location="index.html;
        </script>';
        exit();
    }
    
     else if(empty($usuario)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
     }
     else if(empty($clave)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
     } 
     else if(empty($telefono)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();   
    }
}//cierra isset

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){
  unset($_POST['correo']);
    unset($_POST['usuario']);
    echo '<script language="javascript">alert("Error: El usuario ya existe"); window.location="index.html";</script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo)>0){
    echo '<script language="javascript">alert("Error: El correo ya existe"); window.location="index.html";</script>';
    exit;
}

if(strlen($nombre)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
} 
if(strlen($apellidos)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
} 
if(strlen($correo)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
}  

if (!preg_match($expresion, $correo)) {
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit();
}

if(strlen($usuario)>20){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
} 
if(strlen($clave)>10){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
} 
if(strlen($telefono)>10 || strlen($telefono)<10){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
} 



//ejecutar consulta
$resultado = mysqli_query($conexion,$insetar);
if(!$resultado){
    echo 'Error al registrar al usuario';
} else {
 
    echo '<script language="javascript">alert("Usuario registrado exitosamente"); window.location="index.html";</script>';
}

mysqli_close($conexion);
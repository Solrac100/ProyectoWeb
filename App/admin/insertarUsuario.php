<?php 
error_reporting(0);//sale el error de que mysql ya se hará obsoleto
include("../Conexion/conexion.php");

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$rol =$_POST['rol'];

$qry = "INSERT INTO usuario(usuario,contrasena,rol) VALUES ('$usuario','$contraseña','$rol')";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR EL REGISTRO: " .mysql_error());
//redirigir el programa al script html de captura de datos
echo "<script type='text/javascript'> alert('Registro insertado con éxito');window.location='usuario.php' </script>";
break;


?>
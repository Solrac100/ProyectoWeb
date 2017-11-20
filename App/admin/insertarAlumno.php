<?php 
error_reporting(0);//sale el error de que mysql ya se hará obsoleto
include("../Conexion/conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$grupo =$_POST['grupo'];
$usuario = $_POST['usuario'];

if ($usuario == "") {
	$usuario = '14';
}

$qry = "INSERT INTO alumno(nombre,apellidos,idgrupo,usuario_idusuario) VALUES ('$nombres','$apellidos','$grupo','$usuario')";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR EL REGISTRO: " .mysql_error());
//redirigir el programa al script html de captura de datos
echo "<script type='text/javascript'> alert('Registro insertado con éxito');window.location='alumno.php' </script>";
break;


?>
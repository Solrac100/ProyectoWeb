<?php 
error_reporting(0);//sale el error de que mysql ya se hará obsoleto
include("../Conexion/conexion.php");

$nombre = $_POST['nombre'];
$salon = $_POST['salon'];
$piso =$_POST['piso'];

$qry = "INSERT INTO grupo(nombre,salon,piso) VALUES ('$nombre','$salon','$piso')";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR EL REGISTRO: " .mysql_error());
//redirigir el programa al script html de captura de datos
echo "<script type='text/javascript'> alert('Grupo insertado con éxito');window.location='grupo.php' </script>";
break;


?>
<?php 
error_reporting(0);//sale el error de que mysql ya se hará obsoleto
include("../Conexion/conexion.php");

$tipo = $_POST['tipoperiodo'];
$año =$_POST['añoperiodo'];

$qry = "INSERT INTO periodo(tipo,ano) VALUES ('$tipo','$año')";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR EL REGISTRO: " .mysql_error());
//redirigir el programa al script html de captura de datos
echo "<script type='text/javascript'> alert('Grupo insertado con éxito');window.location='periodo.php' </script>";
break;


?>
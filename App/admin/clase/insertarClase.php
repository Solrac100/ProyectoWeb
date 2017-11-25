<?php 
error_reporting(0);//sale el error de que mysql ya se hará obsoleto
include("../../Conexion/conexion.php");

$alumno = $_POST['alumno'];
$grupo = $_POST['grupo'];
$trabajador = $_POST['trabajador'];
$periodo =$_POST['periodo'];
$dia =$_POST['dia'];
$hora =$_POST['hora'];
$materia =$_POST['materia'];


$qry = "INSERT INTO clase(idalumno,idgrupo,idtrabajador,periodo_idperiodo,dia,hora,materia_idmateria) VALUES ('$alumno','$grupo','$trabajador','$periodo', '$dia' , '$hora' ,'$materia')";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR CLASE: " .mysql_error());
//redirigir el programa al script html de captura de datos
echo "<script type='text/javascript'> alert('Registro insertado con éxito');window.location='index.php' </script>";
break;


?>
<?php
error_reporting(0);
if(!empty($_POST)){
	include "../Conexion/conexion.php";

	$idalumno = $_POST["id"];
	$nombres=$_POST["nombres"];
	$apellidos=$_POST['apellidos'];
	$grupo=$_POST['grupo'];
	$usuario=$_POST['usuario'];

	echo $grupo;

	$qry = "UPDATE alumno SET nombre='$nombres', apellidos='$apellidos', idgrupo='$grupo', usuario_idusuario='$usuario' WHERE idalumno='$idalumno'";
	$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR apellidos REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Modificado exitosamente.\");window.location='./alumno.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo modificar.\");window.location='./alumno.php';</script>";
	}

}

?>
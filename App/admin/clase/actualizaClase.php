<?php
error_reporting(0);
if(!empty($_POST)){
	include "../../Conexion/conexion.php";

	$idclase = $_POST['id'];
	$alumno = $_POST['alumno'];
	$grupo = $_POST['grupo'];
	$trabajador = $_POST['trabajador'];
	$periodo =$_POST['periodo'];
	$dia =$_POST['dia'];
	$hora =$_POST['hora'];
	$materia =$_POST['materia'];
	
	$qry = "UPDATE clase SET idalumno='$alumno', idgrupo='$grupo',idtrabajador='$trabajador',periodo_idperiodo='$periodo', dia='$dia' , hora='$hora' ,materia_idmateria='$materia' WHERE idclase='$idclase'";
	$resultado = mysql_query($qry) or die ("*****ERROR AL ACTUALIZAR EL REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Modificado exitosamente.\");window.location='./index.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo modificar.\");window.location='./index.php';</script>";
	}

}

?>
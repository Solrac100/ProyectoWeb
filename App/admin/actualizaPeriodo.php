<?php
error_reporting(0);
if(!empty($_POST)){
	include "../Conexion/conexion.php";

	$idperiodo = $_POST["idperiodo"];
	$tipo=$_POST["tipoperiodo"];
	$año=$_POST["añoperiodo"];

	$qry = "UPDATE periodo SET tipo='$tipo', ano='$año' WHERE idperiodo='$idperiodo'";
	$resultado = mysql_query($qry) or die ("*****ERROR AL ACTUALIZAR EL REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Modificado exitosamente.\");window.location='./periodo.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo modificar.\");window.location='../../../Admin/periodo.php';</script>";
	}

}

?>
<?php

if(!empty($_POST)){
	include "./Conexion/conexion.php";

	$idusuario = $_POST["id"];
	$usuario=$_POST["usuario"];
	$contraseña=$_POST['contraseña'];
	$rol=$_POST['rol'];

	$qry = "UPDATE usuario SET usuario='$usuario', contrasena='$contraseña', rol='$rol' WHERE idusuario='$idusuario'";
	$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Eliminado exitosamente.\");window.location='../../../Admin/usuario.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo eliminar.\");window.location='../../../Admin/usuario.php';</script>";
	}

}

?>
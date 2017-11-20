<?php
error_reporting(0);
if(!empty($_POST)){
	include "../Conexion/conexion.php";

	$idusuario = $_POST["id"];
	$usuario=$_POST["usuario"];
	$contrasena=$_POST['contraseña'];
	$rol=$_POST['rol'];

	$qry = "UPDATE usuario SET usuario='$usuario', contrasena='$contrasena', rol='$rol' WHERE idusuario='$idusuario'";
	$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Modificado exitosamente.\");window.location='./usuario.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo modificar.\");window.location='../../../Admin/usuario.php';</script>";
	}

}

?>
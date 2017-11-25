<?php
error_reporting(0);
if(!empty($_POST)){
	include "../../Conexion/conexion.php";

	$idtrabajador = $_POST['id'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$celular =$_POST['telefono'];
	$correo =$_POST['correo'];
	$usuario =$_POST['usuario'];
	-//$usuario =$_POST['foto'];
     //falta hacer update de fotocomo?

	$qry = "UPDATE trabajador SET nombre='$nombre', apellidos='$apellidos', celular='$celular', correo='$correo', usuario_idusuario='$usuario' WHERE idtrabajador='$idtrabajador'";
	$resultado = mysql_query($qry) or die ("*****ERROR AL ACTUALIZAR EL REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Modificado exitosamente.\");window.location='./index.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo modificar.\");window.location='./index.php';</script>";
	}

}

?>
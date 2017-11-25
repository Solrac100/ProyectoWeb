<?php
error_reporting(0);
if(!empty($_POST)){
	include "../Conexion/conexion.php";

	$idgrupo = $_POST["idgrupo"];
	$nombre=$_POST["nombre"];
	$salon=$_POST['salon'];
	$piso=$_POST['piso'];

	$qry = "UPDATE grupo SET nombre='$nombre', salon='$salon', piso='$piso' WHERE idgrupo='$idgrupo'";
	echo $qry;
	$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
	if($resultado!=null){
		echo "<script>alert(\"Modificado exitosamente.\");window.location='./grupo.php';</script>";
	}else{
		echo "<script>alert(\"No se pudo modificar.\");window.location='../../../Admin/grupo.php';</script>";
	}

}

?>
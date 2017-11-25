<?php
	include("./Conexion/conexion.php");

	$user = $_POST['user'];
	$pass = $_POST['pass'];	

	$consulta = "SELECT * FROM usuario WHERE usuario='".$user."' and contrasena='".$pass."';";
  
	$resultado = mysql_query($consulta) or die ("Error: ".mysql_error());
	
	$tablauser = mysql_fetch_array($resultado);
	
	$_SESSION['ID']= $tablauser['idusuario']; 
	$_SESSION['USER']= $tablauser['usuario']; 
	$rol = $tablauser['rol']; 
	
	if($rol == $admin){
		header("Location: ./admin");
 	}else if($rol == $jefe){
 		header("Location: ./jefe");
 	}else if($rol == $maestro){
 		header("Location: ./maestro");
 	}else if($rol == $prefecto){
 		header("Location: ./prefecto");
 	}else {
 		echo "No tiene permisos para acceder a la aplicacion. Consulte a un Administrador";
 	}
?>

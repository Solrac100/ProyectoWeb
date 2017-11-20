<?php

if(!empty($_GET)){
			include "../../../Conexion/conexion.php";
			
			$idusuario = $_GET["id"];
			$qry = "DELETE FROM usuario WHERE idusuario='$idusuario'";
			$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
			if($resultado!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='../../../Admin/usuario.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='../../../Admin/usuario.php';</script>";

			}
}

?>
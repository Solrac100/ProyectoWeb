<?php
error_reporting(0); //para que no nos muestre la alerta de mysql de que ya estará obsoleta

if(!empty($_GET)){
			include "../Conexion/conexion.php";
			
			$idgrupo = $_GET["id"];
			$qry = "DELETE FROM grupo WHERE idgrupo='$idgrupo'";
			$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
			if($resultado!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='./grupo.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='./grupo.php';</script>";

			}
}

?>
<?php
error_reporting(0); //para que no nos muestre la alerta de mysql de que ya estará obsoleta

if(!empty($_GET)){
			include "../Conexion/conexion.php";
			
			$periodo = $_GET["id"];
			$qry = "DELETE FROM periodo WHERE idperiodo='$periodo'";
			$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
			if($resultado!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='./periodo.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='./periodo.php';</script>";

			}
}

?>
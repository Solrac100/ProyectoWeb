<?php
error_reporting(0); //para que no nos muestre la alerta de mysql de que ya estará obsoleta

if(!empty($_GET)){
			include "../../Conexion/conexion.php";
			
			$idtrabajador = $_GET["id"];
			$timestamp =  date("Y-m-d H:i:s",time());
			$qry = "UPDATE trabajador SET fechaelim='$timestamp' WHERE idtrabajador='$idtrabajador'";
			echo $qry; exit();			
			$resultado = mysql_query($qry) or die ("*****ERROR AL ELIMINAR EL REGISTRO: " .mysql_error());
			if($resultado!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='./index.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='./index.php';</script>";

			}
}

?>
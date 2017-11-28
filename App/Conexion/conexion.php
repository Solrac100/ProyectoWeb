<?php
	$hostBD='localhost';
	$userBD='root';
	$passBD='asd';
	$BD='horarios';

	$conexionBD = mysql_connect($hostBD,$userBD,$passBD)
		or die('No se pudo conectar al servidor ERROR:'.mysql_error());
	mysql_select_db($BD) or die ('No se pudo abrir la BD ERROR:'.mysql_error());

	$admin='A';
	$jefe='J';
	$maestro='M';
	$prefecto='P';

	//session_start();
?>

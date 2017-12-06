<?php
  error_reporting(0);//sale el error de que mysql ya se hará obsoleto
  include("../Conexion/conexion.php");

  $idtrabajador = $_POST['idtrabajador'];
  $idclase = $_POST['idclase'];
  $idgrupo = $_POST['idgrupo'];
  $hora = $_POST['hora'];
  $dia = $_POST['dia'];
  $idperiodo = $_POST['idperiodo'];

  $qry = "INSERT INTO asistrabajador(idclase, idtrabajador, idperiodo, hora, dia) VALUES ('$idclase','$idtrabajador','$idperiodo','$hora','$dia')";
  $resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR EL REGISTRO: " .mysql_error());

  echo "<script type='text/javascript'> alert('Registro insertado con éxito');window.location='index.php' </script>";
break;




?>
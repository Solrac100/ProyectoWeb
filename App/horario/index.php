<?php 
    header ('Content-type: text/html; charset=utf-8');
	include("../Conexion/conexion.php");
	//recibes idgrupo y idalumno
  $qry = "SELECT * FROM `clase` WHERE idalumno='3' and idgrupo='1' ORDER by dia , hora";
  //echo $qry;
  $res = mysql_query($qry) or die ("*****ERROR AL TRAER Horario: " .mysql_error());
  //$var = mysql_fetch_row();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Jefe de Grupo</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/cssacordion/cssacordion.css">

</head>
<body>
<div class="container">
	<img src="../assets/imagenes/logo.png" alt="Benemérita Escuela Normal de Coahuila" class="img img-responsive imagen">
	<h2 align="center">Horario</h2><h3 align="center">Semanal</h3>
	<div class="table-responsive">
      				  <table class="table table-hover" id="tablaalumnos<?php echo $cont;?>" border="1">
      				    <thead>
      				      <tr>
      				        <th style="width: 60px;">Lunes</th>
      				        <th style="width: 60px;">Martes</th>
      				        <th style="width: 60px;">Miercoles</th>
      				        <th style="width: 60px;">Jueves</th>
      				        <th style="width: 60px;">Viernes</th>
      				        <th style="width: 60px;">Sabado</th>
      				      </tr>
      				    </thead>
      				    <tbody>
      				    	<?php while ($fila = mysql_fetch_row($res);) { ?>
      				      	<tr>
      				        	<td>
	      				        	
      				        	</td>
      				      	</tr>
      				      	<?php } ?>
      				    </tbody>
      				  </table>
					     </div>
</div>
</body>
</html>
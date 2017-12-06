<?php
	include("../../Conexion/conexion.php");

	$reportede = $_POST['reportede'];
	$fechadesde = $_POST['fechadesde'];	
	$fechahasta = $_POST['fechahasta'];

	if($reportede == "alumnos") {
		$consulta = "SELECT * FROM asisalumno WHERE registro BETWEEN '".$fechadesde." 00:00:00' and '".$fechahasta." 23:59:59'";
		$resultado = mysql_query($consulta) or die ("Error: ".mysql_error());
	}elseif($reportede == "maestros"){
		$consulta = "SELECT * FROM asistrabajador WHERE registro BETWEEN '".$fechadesde." 00:00:00' and '".$fechahasta." 23:59:59'";
		$resultado = mysql_query($consulta) or die ("Error: ".mysql_error());
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Admin</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/cssacordion/cssacordion.css">

</head>
<body>
<div class="container">
  <img src="../../assets/imagenes/logo.png" alt="Benemérita Escuela Normal de Coahuila" class="img img-responsive imagen">
  <h2 align="center">Reporte</h2><h3 align="center"><?php $reportede; ?></h3>
  <div class="table-responsive">
                  <?php
						      if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                              <th style='width: 60px;'>Clase</th>
						                      <th style='width: 60px;'>Nombre</th>
						                      <th style='width: 60px;'>Hora</th>
						                      <th style='width: 60px;'>Dia</th>
						                      <th style='width: 60px;'>Periodo</th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idclase']."</td>
                                                <td>".$registro['idtrabajador']."</td>
                                                <td>".$registro['hora']."</td>
                                                <td>".$registro['dia']."</td>
                                                <td>".$registro['idperiodo']."</td>
                                                <td style='width:150px;'>
                                                </td>
                                            </tr> ";//fin echo
                                        }    
                                        echo "</table>";
                                    }else{
                                        echo "<p class='alert alert-warning'>No hay resultados</p>";
                                    }

                  ?>
               </div>
		</div>
	</body>
</html>
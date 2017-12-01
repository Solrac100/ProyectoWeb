<?php 
    header ('Content-type: text/html; charset=utf-8');
  include("../Conexion/conexion.php");
  //recibes idgrupo y idalumno
  $qry = "SELECT * FROM `clase` WHERE idalumno='4' and idgrupo='1' ORDER by hora ,dia";
  //echo $qry;
  $res = mysql_query($qry) or die ("*****ERROR AL TRAER Horario: " .mysql_error());
  //$var = mysql_fetch_row();
  
  $dia=array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
  $hora=array('07:45 a.m','09:15 a.m','11:05 a.m','12:30 p.m');

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
                <table class="table table-hover" id="tablaalumnos" border="1">
                  <thead>
                    <tr>
                      <th style="width: 60px;"></th>
                      <th style="width: 60px;">Lunes</th>
                      <th style="width: 60px;">Martes</th>
                      <th style="width: 60px;">Miercoles</th>
                      <th style="width: 60px;">Jueves</th>
                      <th style="width: 60px;">Viernes</th>
                      <th style="width: 60px;">Sabado</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                     for($i=0;$i<count($hora);$i++){
                        echo "<tr><td>";
                        echo   $hora[$i];
                        echo "</td>";
                          for($j=0;$j<count($dia);$j++)
                              {
                                  $clase=mysql_query("SELECT * from clase WHERE dia='".$dia[$j]."' and hora='".$hora[$i]."' ");
                                  $claserow = mysql_fetch_row($clase);
                                  
                                  $trab=mysql_query("SELECT concat(nombre,' ',apellidos) as nombre from trabajador WHERE idtrabajador='".$claserow[3]."' ");
                                  $trabrow = mysql_fetch_row($trab);
                                  
                                  $mat=mysql_query("SELECT nombre from materia WHERE idmateria='".$claserow[7]."' ");
                                  $matrow = mysql_fetch_row($mat);

                                  echo "<td> ";
                                  echo "<input type='text' readonly name='trabajador' value='".$trabrow[0]."'>";
                                  echo "<input type='text' readonly name='materia' value='".$matrow[0]."'>";
                                  echo"</td>";
                               }
                        echo "</tr>";
                      }?>
                  </tbody>
                </table>
               </div>
</div>
</body>
</html>
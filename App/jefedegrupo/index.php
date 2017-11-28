<?php
  error_reporting(0);//sale el error de que mysql ya se hará obsoleto
  include("../Conexion/conexion.php");

  $id = "2";
  $diahoy = date("D",time());
  switch ($diahoy) {
    case 'Mon':
      $hoy = "Lunes";
      break;
    case 'Tue':
      $hoy = "Martes";
      break;
    case 'Wed':
      $hoy = "Martes";
      break;
    case 'Thu':
      $hoy = "Martes";
      break;
    case 'Fri':
      $hoy = "Martes";
      break;
    case 'Sat':
      $hoy = "Martes";
      break;
  }



  $qry = "SELECT c.* FROM alumno a,usuario u,clase c where a.idalumno=c.idalumno and u.idusuario=a.usuario_idusuario and u.idusuario = ".$id." and c.dia='".$hoy."' ORDER by hora ";
  //echo $qry;
  $res = mysql_query($qry) or die ("*****ERROR AL TRAER CLASE: " .mysql_error());

  
  while($jefe = mysql_fetch_array($res)){
    $alumno=$jefe['idalumno'];
    $grupo=$jefe['idgrupo'];
    $periodo=$jefe['periodo_idperiodo'];
    $trabajador[]=$jefe['idtrabajador'];
    $materia[]=$jefe['materia_idmateria'];
    $hora[]=$jefe['hora'];
    $clase[]=$jefe['idclase'];
  }

   //print_r($hora);
  
  $alum = mysql_query("SELECT concat(nombre,' ',apellidos) as nombre FROM alumno WHERE idalumno = '".$alumno."'") or die ("*****ERROR AL TRAER alumno: " .mysql_error());
  $grupqry = mysql_query("SELECT nombre,salon,piso FROM grupo WHERE idgrupo = '".$grupo."'") or die ("*****ERROR AL TRAER grupo: " .mysql_error());
  $perioqry = mysql_query("SELECT tipo,ano FROM periodo WHERE idperiodo = '".$periodo."'") or die ("*****ERROR AL TRAER grupo: " .mysql_error());

  $grup = mysql_fetch_row($grupqry);
  $perio = mysql_fetch_row($perioqry);

  if ($hora[0] == "07:45 a.m") {
    $mat1 = mysql_query("SELECT nombre FROM materia WHERE idmateria = '".$materia[0]."'") or die ("*****ERROR AL TRAER Mat1: " .mysql_error());
    $maes1 = mysql_query("SELECT concat(nombre,' ',apellidos) FROM trabajador WHERE idtrabajador = '".$trabajador[0]."'") or die ("*****ERROR AL TRAER maes1: " .mysql_error()); 
  }
  if ($hora[1] == "09:15 a.m") {
    $mat2 = mysql_query("SELECT nombre FROM materia WHERE idmateria = '".$materia[1]."'") or die ("*****ERROR AL TRAER Mat2: " .mysql_error());
    $maes2 = mysql_query("SELECT concat(nombre,' ',apellidos) FROM trabajador WHERE idtrabajador = '".$trabajador[1]."'") or die ("*****ERROR AL TRAER maes2: " .mysql_error()); 
  }
  if ($hora[2] == "11:05 a.m") {
    $mat3 = mysql_query("SELECT nombre FROM materia WHERE idmateria = '".$materia[2]."'") or die ("*****ERROR AL TRAER Mat3: " .mysql_error());
    $maes3 = mysql_query("SELECT concat(nombre,' ',apellidos) FROM trabajador WHERE idtrabajador = '".$trabajador[2]."'") or die ("*****ERROR AL TRAER maes3: " .mysql_error()); 
  }
  if ($hora[3] == "12:30 p.m") {
    $mat4 = mysql_query("SELECT nombre FROM materia WHERE idmateria = '".$materia[3]."'") or die ("*****ERROR AL TRAER Mat4: " .mysql_error());
    $maes4 = mysql_query("SELECT concat(nombre,' ',apellidos) FROM trabajador WHERE idtrabajador = '".$trabajador[3]."'") or die ("*****ERROR AL TRAER maes4: " .mysql_error()); 
  }

  

  $cont=0;
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
	<script type="text/javascript">
    function deleteRow(r) 
    {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("tablaalumnos").deleteRow(i);
    }
  </script>
  <script type="text/javascript">
    function asmaestrosi() 
    {
      document.getElementById("asistenciamaestro").value = 'SI';
    }

    function asmaestrono()
    {
      document.getElementById('asistenciamaestro').value = 'NO';
    }
  </script>
  <script type="text/javascript">
    function obtendia()
    {
      var day;
      switch (new Date().getDay()) {  
          case 0:
              day = "Domingo";
              break;
          case 1:
              day = "Lunes";
              break;
          case 2:
              day = "Martes";
              break;
          case 3:
              day = "Miércoles";
              break;
          case 4:
              day = "Jueves";
              break;
          case 5:
              day = "Viernes";
              break;
          case 6:
              day = "Sábado";
      } 
      document.getElementById('dia').value = day;
    }
  </script>

  <script type="text/javascript">
  function obtenhora()
  {
    var d = new Date();
    var hora = d.getHours();
    var minutos = d.getMinutes(); 
    /*bloquear acordion de acuerdo a la hora*/
    var elemento1 = document.getElementById("collapse1");
    var elemento2 = document.getElementById("collapse2");
    var elemento3 = document.getElementById("collapse3");
    var elemento4 = document.getElementById("collapse4");
    if (hora==7 && minutos >= 45) 
    {
      elemento2.classList.add("hide");
      elemento3.classList.add("hide");
      elemento4.classList.add("hide");
    }else if(hora==9 && minutos>=15){
      elemento1.classList.add("hide");
      elemento3.classList.add("hide");
      elemento4.classList.add("hide");
    }else if(hora==11 && minutos>=5){
      elemento1.classList.add("hide");
      elemento2.classList.add("hide");
      elemento4.classList.add("hide");
    }else if (hora==12 && minutos>=30) {
      elemento1.classList.add("hide");
      elemento2.classList.add("hide");
      elemento3.classList.add("hide");
    }

    /*generar hora completa*/
    if (minutos < 10) {
      minutos = '0' + minutos;
    }
    if (hora > 12) {
      hora = (hora - 12) + ':' + minutos + ' ' + 'P.M.';
    }else if(hora == 0){
      hora = '12' + ':' + minutos + ' ' + 'A.M.';
    }else{
      hora = hora + ':' + minutos + ' ' + 'A.M.';
    }
    document.getElementById('hora').value = hora;
  }
  </script>

	<!-- <script type="text/javascript">
		$(document).ready(function() {
		  refresh_field();
		})
	
		function refresh_field() {
		  $.get("ajax_file.php", function(data) {
		    $("#last").val(data);
		    window.setTimeout(refresh_field, 1000);
		  });
		}
	</script> -->
</head>
<body onload="obtendia(); obtenhora()">

<div class="container">
	<img src="../assets/imagenes/logo.png" alt="Benemérita Escuela Normal de Coahuila" class="img img-responsive imagen">
	<h2 align="center">Jefe De grupo</h2><h3 align="center">Pase de asistencia</h3>
  	<p><strong>Instrucciones:</strong> El pase de lista se le hará al <strong>maestro</strong> y a los <strong>alumnos</strong>.</p>
  	<input type="submit" name="mostrarhorario" id="mostrarhorario" class="btn btn-primary pull-right mostrarhorario" value="MOSTRAR MI HORARIO" style="float: right;">
    
  	<div class="panel-group" id="accordion" style="margin-top: 50px;">
	    <div class="panel panel-default">
          <?php while ($cont < 4) {
           switch ($cont) {
             case '0': $maestros = mysql_result($maes1,0);$materias = mysql_result($mat1,0);break;
             case '1': $maestros = mysql_result($maes2,0);$materias = mysql_result($mat2,0);break;
             case '2': $maestros = mysql_result($maes3,0);$materias = mysql_result($mat3,0);break;
             case '3': $maestros = mysql_result($maes4,0);$materias = mysql_result($mat4,0);break;
           }
    //if ($hora[0] == "07:45 a.m") {?>
      		<div class="panel-heading">
        		<h4 class="panel-title">
          			<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $cont+1; ?>"><?php echo $hora[0+$cont]; ?></a>
        		</h4>
      		</div>
      		<div id="collapse<?php echo $cont+1; ?>" class="panel-collapse collapse"><!-- se le agrega "in" para que se la que se abre por default-->
      			<div class="panel-body">
      				<h3>Maestro:</h3>
      				<center>
      					<img src="../assets/imagenes/fotosmaestros/maestro1.jpg" alt="Maestro1" class="fotosmaestros">
      				</center>
      				<form action="">
      					<div class="informacion" id="informacion">
      						<p >
      							<strong>ID:</strong>
      								<input type="text" readonly value="<?php echo $clase[0+$cont]; ?>" style="border:none; width:50px;">
      						</p>
      						<p style="visibility:hidden">
      							<strong>Hora: </strong>
      								<input type="text" readonly value="00:00" style="border:none; width:70px;" id="hora">
      						</p>
      						<p style="visibility:hidden">
      							<strong>Día: </strong>
      								<input type="text" readonly style="border:none; width:100px;" id="dia">
      						</p>
	      					<p>
	      						<strong>Maestro: </strong>
	      							<input type="text" readonly value="<?php echo $maestros; ?>" style="border:none; width:250px;">
	      					</p>
    	  					<p>
    	  						<strong>Materia: </strong>
    	  							<input type="text" readonly value="<?php echo $materias; ?>" style="border:none; width:250px;">
    	  					</p>
      						<p>
      							<strong>Salón: </strong>
      								<input type="text" readonly value="<?php echo $grup[1]; ?>" style="border:none; width:250px;">
      						</p>
      						<p>
      							<strong>Grupo: </strong>
      								<input type="text" readonly value="<?php echo $grup[0]; ?>" style="border:none; width:250px;">
      						</p>
      						<p>
      							<strong>Ubicación: </strong>
      								<input type="text" readonly value="<?php echo $grup[2]; ?>" style="border:none; width:250px;">
      						</p>
      						<p style="visibility:hidden">
      							<strong>Clase: </strong><input type="text" readonly value="Lorem ipsum dolor sit amet." style="border:none; width:250px;">
      						</p>
      						<p>
      							<strong>Periodo: </strong><input type="text" readonly value="<?php echo $perio[0].' '.$perio[1]; ?>" style="border:none; width:250px;">
      						</p>
      						<i class="fa fa-check-circle angulo" aria-hidden="true" onclick="asmaestrosi()"></i>
      						<i class="fa fa-times-circle tacha" aria-hidden="true" onclick="asmaestrono()"></i>
      						<input type="text" readonly value="" name="asistenciamaestro" id="asistenciamaestro" style="width: 30px;">
      					</div><br>
      					<input type="submit" name="enviar" id="enviar" class="btn btn-primary pull-right enviar" value="ENVIAR ASISTENCIA MAESTRO">
      				</form>
      				<br><br><hr>
      				<h3>Alumnos: </h3>    
      				<form action="#">
      				<div class="table-responsive">
      				  <table class="table table-hover" id="tablaalumnos<?php echo $cont;?>" border="1">
      				    <thead>
      				      <tr>
      				        <th style="width: 50px;">Matrícula</th>
      				        <th style="width: 400px;">Nombre</th>
      				        <th style="width: 20px;">Asistencia</th>
      				      </tr>
      				    </thead>
      				    <tbody>
                  <?php 
                  $arrayalumnos = mysql_query("SELECT matricula,concat(nombre,' ',apellidos) as nombre FROM alumno WHERE idgrupo = '".$grupo."'") or die ("*****ERROR AL TRAER alumnos: " .mysql_error()); 
                  while ($fila=mysql_fetch_row($arrayalumnos)) { ?>
      				      	<tr>
      				        	<td>
	      				        	<input type="text" readonly value="<?php echo $fila[0];?>" style="border:none; width: 70px;">
      				        	</td>
      				        	<td>
	      				        	<input type="text" readonly value="
                          <?php echo $fila[1].' '.$fila[2];?>" style="border:none; width:350px;">
      				        	</td>
      				        	<td>
	      				       		<input type="text" name="asistencia" id="asistencia" value="SI" readonly style="border: none; width: 20px; ">
	      				       		<i class="fa fa-times-circle tachatabla" aria-hidden="true" onclick="deleteRow(this)"></i>
      				        	</td>
      				      	</tr>
                    <?php } ?>
      				    </tbody>
      				  </table>
					     </div>
					     <input type="submit" name="enviar" id="enviar" class="btn btn-primary pull-right enviar" value="ENVIAR ASISTENCIA ALUMNOS">
					     </form>
      			</div>
      		</div>
          <?php $cont++; } //} ?>
    	</div>
     
   <!--
    	<div class="panel panel-default">
    	  	<div class="panel-heading">
	        	<h4 class="panel-title">
          			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">9:15 A.M.</a>
        		</h4>
      		</div>
      		<div id="collapse2" class="panel-collapse collapse">
	        	<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        		sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      		</div>
    	</div>
    
    	<div class="panel panel-default">
      		<div class="panel-heading">
        			<h4 class="panel-title">
          				<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">11:05 A.M.</a>
        			</h4>
      		</div>
      		<div id="collapse3" class="panel-collapse collapse">
        		<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        		sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      		</div>
    	</div>
    
    	<div class="panel panel-default">
      		<div class="panel-heading">
        			<h4 class="panel-title">
          				<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">12:30 P.M.</a>
        			</h4>
      		</div>
      		<div id="collapse4" class="panel-collapse collapse">
		        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        		sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      		</div>
    	</div> -->
  	</div>
</div>
</body>
</html>

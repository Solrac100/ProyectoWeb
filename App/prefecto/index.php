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
      $hoy = "Miercoles";
      break;
    case 'Thu':
      $hoy = "Jueves";
      break;
    case 'Fri':
      $hoy = "Viernes";
      break;
    case 'Sat':
      $hoy = "Sabado";
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
	<title>Prefecto</title>

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

	<script>
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

</head>
<body onload="obtendia(); obtenhora()">

<div class="container">
	<img src="../assets/imagenes/logo.png" alt="Benemérita Escuela Normal de Coahuila" class="img img-responsive imagen">
	<h2 align="center">Prefecto</h2><h3 align="center">Pase de asistencia</h3>
  	<p><strong>Instrucciones:</strong> El pase de lista se le hará al <strong>maestro.</p>
  	<div class="panel-group" id="accordion">
	    <div class="panel panel-default">
        <?php while ($cont < 4) {
           switch ($cont) {
             case '0': $maestros = mysql_result($maes1,0);$materias = mysql_result($mat1,0);break;
             case '1': $maestros = mysql_result($maes2,0);$materias = mysql_result($mat2,0);break;
             case '2': $maestros = mysql_result($maes3,0);$materias = mysql_result($mat3,0);break;
             case '3': $maestros = mysql_result($maes4,0);$materias = mysql_result($mat4,0);break;
           }
           ?>
      		<div class="panel-heading">
        		<h4 class="panel-title">
          			<a data-toggle="collapse" data-parent="#accordion<?php echo $cont+1; ?>"><?php echo $hora[$cont]; ?></a>
        		</h4>
      		</div>
      		<div id="collapse<?php echo $cont+1; ?>" class="panel-collapse collapse"><!-- se le agrega "in" para que se la que se abre por default-->
      			<div class="panel-body">
              <form> <!--form buscar-->
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
      				<form action=""> <!--form asistencia maestros-->
              <h3>Maestro:</h3>
              <center>
                <img src="../assets/imagenes/fotosmaestros/maestro1.jpg" alt="Maestro1" class="fotosmaestros">
              </center>
      					<div class="informacion" id="informacion">
      						<p>
      							<strong>ID: </strong>
      								<input type="text" readonly value="<?php echo $clase[$cont]; ?>" style="border:none; width:50px;">
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
      			</div>
      		</div>
    	</div>
  	</div> 
</div>
	
</body>
</html>	

<?php 
    session_start();  
    
    if($_SESSION['ROLLogueado'] != 'A'){
        echo "Acceso Denegado.";
        unset($_SESSION['IDLogueado']);
        unset($_SESSION['USERLogueado']);
        unset($_SESSION['ROLLogueado']);
        session_destroy();
        header('Location: http://www.tarea.com/');
    }

    $id = $_SESSION['IDLogueado'];

?>
<html>
<head>
	
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin | Actualizar Trabajador</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="../../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../../assets/js/perfect-scrollbar.jquery.min.js"></script>
</head>
<body>

<?php
error_reporting(0);
	include "../../Conexion/conexion.php";
	$qry= "SELECT * FROM alumno";
    $alum = mysql_query($qry) or die ("*****ERROR: " .mysql_error()); 
    $qry= "SELECT * FROM grupo";
    $grup = mysql_query($qry) or die ("*****ERROR: " .mysql_error());
    $qry= "SELECT * FROM trabajador";
    $trab = mysql_query($qry) or die ("*****ERROR: " .mysql_error());
    $qry= "SELECT * FROM periodo";
    $period = mysql_query($qry) or die ("*****ERROR: " .mysql_error()); 
    $qry= "SELECT * FROM materia";
    $mat = mysql_query($qry) or die ("*****ERROR: " .mysql_error()); 

    $arraydia= array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
    $arrayhora= array('07:45 a.m','09:15 a.m','11:05 a.m','12:30 a.m');

	$idclase = $_GET["id"];
	$qry = "SELECT * FROM clase WHERE idclase='$idclase'";
	$resultado = mysql_query($qry);
	if (mysql_num_rows($resultado)>0) {
		while ($registro = mysql_fetch_array($resultado)) {
		
			$id=$registro['idclase'];
            $alumno=$registro['idalumno'];
            $grupo=$registro['idgrupo'];
            $trabajador=$registro['idtrabajador'];
            $periodo=$registro['periodo_idperiodo'];
            $dia=$registro['dia'];
            $hora=$registro['hora'];
            $materia=$registro['materia_idmateria'];
     ?>
			<div class='main-panel'>
				<div class='content'>
				    <div class='container-fluid'>
				        <div class='row'>
				            <div class='col-md-8'>
				                <div class='card'>
				                    <div class='card-header' data-background-color='red'>
				                        <h4 class='title'>Modificando Clase</h4>
				                        <p class='category'>Datos del Clase</p>
				                    </div>
				                	<div class='card-content'>
				     		       		 <form action='actualizaClase.php' method='post'>
				            	        	<div class="row">
				            	        	<div class='col-md-2'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>ID</label>
				                                    	<input type='text' class='form-control' id='id' name='id' value=<?php echo $id?> readonly>
				                                	</div>
				                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Alumno</label>
                                                    <select class="form-control" id="alumno" name="alumno">
                                                        <?php while($row=mysql_fetch_array($alum)){ ?>
                                                        <option value="<?php echo $row['idalumno'];?>" <?php if ($row['idalumno'] == $alumno){echo "selected='selected'" ;}?> 
                                                        >
                                                        	<?php echo $row['nombre'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Grupo</label>
                                                    <select class="form-control" id="grupo" name="grupo">
                                                        <?php while($row=mysql_fetch_array($grup)){ ?>
                                                        <option value="<?php echo $row['idgrupo'];?>" <?php if ($row['idgrupo'] == $grupo){echo "selected='selected'" ;}?> 
                                                        >
                                                        	<?php echo $row['nombre'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Trabajador</label>
                                                    <select class="form-control" id="trabajador" name="trabajador">
                                                        <?php while($row=mysql_fetch_array($trab)){ ?>
                                                        <option value="<?php echo $row['idtrabajador'];?>" <?php if ($row['idtrabajador'] == $trabajador){echo "selected='selected'" ;}?> 
                                                        >
                                                        	<?php echo $row['nombre'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Periodo</label>
                                                    <select class="form-control" id="periodo" name="periodo">
                                                        <?php while($row=mysql_fetch_array($period)){ ?>
                                                        <option value="<?php echo $row['idperiodo'];?>" <?php if ($row['idperiodo'] == $periodo){echo "selected='selected'" ;}?> 
                                                        >
                                                        	<?php echo $row['tipo'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Día</label>
                                                    <select class="form-control" id="dia" name="dia">
                                                        <?php
                                                        foreach($arraydia as $rdia){
                                                        	$id++;
                                                        	if ($rdia == $dia) {
                                                        		echo "<option value='$rdia' selected>$rdia</option>";
                                                        	}else{
                                                        		echo "<option value='$rdia' >$rdia</option>";
                                                        	}
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Hora</label>
                                                    <select class="form-control" id="hora" name="hora">
                                                        <?php
                                                        foreach($arrayhora as $rhora){
                                                        	$id++;
                                                        	if ($rhora == $hora) {
                                                        		echo "<option value='$rhora' selected>$rhora</option>";
                                                        	}else{
                                                        		echo "<option value='$rhora' >$rhora</option>";
                                                        	}
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Materia</label>
                                                    <select class="form-control" id="materia" name="materia">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <?php while($row=mysql_fetch_array($mat)){ ?>
                                                        <option value="<?php echo $row['idmateria'];?>" <?php if ($row['idmateria'] == $materia){echo "selected='selected'" ;}?> 
                                                        >
                                                        	<?php echo $row['nombre'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Inserta Clase</button>
                                        <div class="clearfix"></div>
		                            	</form>			                                
		                        	</div>	
			                    </div>
				            </div>
		                </div>
		            </div>	        
		    	</div>
		<?php } ?>
	<?php } ?>
	
	</div>
	</body>
</html>


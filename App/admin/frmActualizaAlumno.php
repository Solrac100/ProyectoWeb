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
	
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin | Actualizar Usuario</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
</head>
<body>

<?php
error_reporting(0);
	include "../Conexion/conexion.php";

	$idalumno = $_GET["id"];
	$qry = "SELECT * FROM alumno WHERE idalumno='$idalumno'";
	$resultado = mysql_query($qry);
	if (mysql_num_rows($resultado)>0) {
		while ($r = mysql_fetch_array($resultado)) {
			$id = $r['idalumno'];
			$nombres = $r['nombre'];
			$apellidos = $r['apellidos'];
			$grupo =$r['idgrupo'];
			$usuario = $r['usuario_idusuario'];

			echo "
			<div class='main-panel'>
				<div class='content'>
				    <div class='container-fluid'>
				        <div class='row'>
				            <div class='col-md-8'>
				                <div class='card'>
				                    <div class='card-header' data-background-color='red'>
				                        <h4 class='title'>Modificando Alumno</h4>
				                        <p class='category'>Datos del Alumno</p>
				                    </div>
				                	<div class='card-content'>
				     		       		 <form action='actualizaAlumno.php' method='post'>
				            	        	<div class='row'>
				            	        	<div class='col-md-4'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>ID</label>
				                                    	<input type='text' class='form-control' id='id' name='id' value='".$id."' readonly>
				                                	</div>
				                            	</div>
					                		    <div class='col-md-4'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>Nombres</label>
				                                    	<input type='text' class='form-control' id='nombres' name='nombres' value='".$nombres."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-4'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Apellidos</label>
				                                    	<input type='text' class='form-control' id='apellidos' name='apellidos' value='".$apellidos."'>
				                                	</div>
				                            	</div>
				                            </div>
				                            <div class='row'>
                                            <div class='col-md-6'>
                                                <div class='form-group label-floating'>
                                                    <label class='control-label'>Grupo</label>";?>
                                                    <?php
                                                    //poblar combo con los grupos
                                                    error_reporting(0);
                                                    include '../Conexion/conexion.php';

                                                    $qry = 'SELECT * FROM grupo';
                                                    $resultado = mysql_query($qry);
                                                    if(mysql_num_rows($resultado)>0)
                                                    {
                                                    	$qry2 = "SELECT * FROM grupo WHERE idgrupo='$grupo'";
                                                    	$res = mysql_query($qry2);
                                                    	$r = mysql_fetch_array($res);
                                                    	$nomgrupo = $r['nombre'];

                                                        echo "<select class='form-control' name='grupo' id='grupo'>";
                                                        echo "<option selected='true'  value='$grupo'>$nomgrupo</option>";
                                                    
                                                        while($registro = mysql_fetch_array($resultado))
                                                        {
                                                            $grupoid = $registro['idgrupo'];
                                                            $gruponombre = $registro['nombre'];

                                                            echo "<option id='optCosas' name='optCosas' value='$grupoid'>$gruponombre</option>";
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    echo "
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='form-group label-floating'>
                                                    <label class='control-label'>Usuario</label>";?>
                                                    <?php
                                                    //poblar combo con los grupos
                                                    error_reporting(0);
                                                    include '../Conexion/conexion.php';

                                                    $qry3 = "SELECT * FROM usuario WHERE idusuario='$usuario'";
                                                    $res2 = mysql_query($qry3);
                                                    $r2 = mysql_fetch_array($res2);
                                                    $nomusuario = $r2['usuario'];


                                                    $qry = "SELECT * FROM usuario WHERE rol='J' OR rol='X'";
                                                    $resultado = mysql_query($qry);
                                                    if(mysql_num_rows($resultado)>0)
                                                    {
                                                        echo "<select class='form-control' name='usuario' id='usuario'>";
                                                        echo "<option selected='true' value='$usuario'>$nomusuario</option>";
                                                    
                                                        while($registro = mysql_fetch_array($resultado))
                                                        {
                                                            $usuarioid = $registro['idusuario'];
                                                            $usuario = $registro['usuario'];

                                                            echo "<option id='optCosas' name='optCosas' value='$usuarioid'>$usuario</option>";
                                                        }
                                                    }
                                                    ?>
                                                    <?php echo"
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
				                        	<button type='submit' class='btn btn-primary pull-right'>Modificar usuario</button>
				                        	<div class='clearfix'></div>
		                            	</form>			                                
		                        	</div>	
			                    </div>
				            </div>
		                </div>
		            </div>	        
		    	</div>
			";
		}
	}
echo " </div>

	</body>
	  </html>";
?>
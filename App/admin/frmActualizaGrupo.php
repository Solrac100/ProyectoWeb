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
    <title>Admin | Actualizar Grupo</title>
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

	$idgrupo = $_GET["id"];
	$qry = "SELECT * FROM grupo WHERE idgrupo='$idgrupo'";
	$resultado = mysql_query($qry);
	if (mysql_num_rows($resultado)>0) {
		while ($r = mysql_fetch_array($resultado)) {
			$id = $r['idgrupo'];
			$nombre = $r['nombre'];
			$salon = $r['salon'];
			$piso = $r['piso'];

			echo "
			<div class='main-panel'>
				<div class='content'>
				    <div class='container-fluid'>
				        <div class='row'>
				            <div class='col-md-8'>
				                <div class='card'>
				                    <div class='card-header' data-background-color='red'>
				                        <h4 class='title'>Modificando Grupo</h4>
				                        <p class='category'>Datos del Grupo</p>
				                    </div>
				                	<div class='card-content'>
				     		       		 <form action='actualizaGrupo.php' method='post'>
				            	        	<div class='row'>
				            	        	<div class='col-md-2'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>ID</label>
				                                    	<input type='text' class='form-control' id='id' name='idgrupo' value='".$id."' readonly>
				                                	</div>
				                            	</div>
					                		    <div class='col-md-4'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>Grupo</label>
				                                    	<input type='text' class='form-control' id='nombre' name='nombre' value='".$nombre."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-4'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Salon</label>
				                                    	<input type='text' class='form-control' id='salon' name='salon' value='".$salon."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-2'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Piso</label>
				                                    	<input type='text' class='form-control' id='piso' name='piso' value='".$piso."'>
				                                		
				                                	</div>
				                            	</div>
				                        	</div>
				                        	<button type='submit' class='btn btn-primary pull-right'>Modificar Grupo</button>
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

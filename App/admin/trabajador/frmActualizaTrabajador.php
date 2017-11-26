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

	$idtrabajador = $_GET["id"];
	$qry = "SELECT * FROM trabajador WHERE idtrabajador='$idtrabajador'";
	$resultado = mysql_query($qry);
	if (mysql_num_rows($resultado)>0) {
		while ($registro = mysql_fetch_array($resultado)) {
			$id=$registro['idtrabajador'];
            $nombre=$registro['nombre'];
            $apellidos=$registro['apellidos'];
            $celular=$registro['celular'];
            $correo=$registro['correo'];
            $fechaelim=$registro['fechaelim'];
            $idusuario=$registro['usuario_idusuario'];

			echo "
			<div class='main-panel'>
				<div class='content'>
				    <div class='container-fluid'>
				        <div class='row'>
				            <div class='col-md-8'>
				                <div class='card'>
				                    <div class='card-header' data-background-color='red'>
				                        <h4 class='title'>Modificando Trabajador</h4>
				                        <p class='category'>Datos del Trabajador</p>
				                    </div>
				                	<div class='card-content'>
				     		       		 <form action='actualizaTrabajador.php' method='post'>
				            	        	<div class='row'>
				            	        	<div class='col-md-2'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>ID</label>
				                                    	<input type='text' class='form-control' id='id' name='id' value='".$id."' readonly>
				                                	</div>
				                            	</div>
					                		    <div class='col-md-4'>
				                    				<div class='form-group label-floating'>
					                                    <label class='control-label'>Nombre</label>
				                                    	<input type='text' class='form-control' id='nombre' name='nombre' value='".$nombre."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-4'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Apellidos</label>
				                                    	<input type='text' class='form-control' id='apellidos' name='apellidos' value='".$apellidos."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-4'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Celular</label>
				                                    	<input type='text' class='form-control' id='telefono' name='telefono' value='".$celular."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-4'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Correo</label>
				                                    	<input type='text' class='form-control' id='correo' name='correo' value='".$correo."'>
				                                	</div>
				                            	</div>
				                            	<div class='col-md-4'>
					                                <div class='form-group label-floating'>
				                                    	<label class='control-label'>Numero de Usuario</label>
				                                    	<input type='text' class='form-control' id='usuario' name='usuario' value='".$idusuario."'>
				                                	</div>
				                            	</div>
				                        	</div>
				                        	<button type='submit' class='btn btn-primary pull-right'>Modificar trabajador</button>
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



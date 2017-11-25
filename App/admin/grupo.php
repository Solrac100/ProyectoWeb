<<<<<<< HEAD:App/admin/grupo.php

<!doctype html>
<html lang="en">
<!-- hola jajaja 08:07pm -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin | Grupo</title>
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
 <div class="wrapper">
        <div class="sidebar" data-color="red">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="index.html" class="simple-text">
                    Benemérita Escuela <br>  Normal de Coahuila
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="index.html">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li>
                        <a href="./usuario.php">
                            <i class="material-icons">account_circle</i>
                            <p>Usuario</p>
                        </a>
                    </li>
                    <li>
                        <a href="trabajador.php" id="trabajador">
                            <i class="material-icons">person</i>
                            <p>Trabajador</p>
                        </a>
                    </li>
                    <li>
                        <a href="./alumno.php">
                            <i class="material-icons">school</i>
                            <p>Alumno</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./grupo.php">
                            <i class="material-icons">people</i>
                            <p>Grupo</p>
                        </a>
                    </li>                    
                    <li>
                        <a href="./clase.php">
                            <i class="material-icons">description</i>
                            <p>Clase</p>
                        </a>
                    </li>                    
                    <li>
                        <a href="./periodo.php">
                            <i class="material-icons">date_range</i>
                            <p>Periodo</p>
                        </a>
                    </li>
                    <li>
                        <a href="./reportes.php">
                            <i class="material-icons text-gray">assignment</i>
                            <p>Reportes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#"> Buscar </a> -->
                        <!-- <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form> -->
                    </div>
                </div>
            </nav>
=======
<!-- <?php
session_start();
    if(empty($_SESSION['usr'])){
        echo "Debe autentificarse";
    }
    if (!empty($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        $var = str_replace('+', '\\n', "$mensaje");
        $_SESSION['mensaje'] = '';
        echo "<SCRIPT> alert (\"$var\") </SCRIPT>";
    } else {
        $mensaje = '';
    }

if (isset($_GET['logout'])) {
        $cerrar = $_GET['logout'];
        if ($cerrar == 'out') {
            session_destroy();
        }
    }
?> -->
<?php include("./header.php"); ?>
>>>>>>> 3720f94a45e889dfe5ad61fc72db479673baadce:App/admin/grupo.php
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Grupos</h4>
                                    <p class="category">Datos del grupo</p>
                                </div>
                                <div class="card-content">
                                    <form action="insertarGrupo.php" method="post"> 

                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombre Grupo</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Salón</label>
                                                    <input type="text" class="form-control" id="salon" name="salon">
                                                </div>
                                            </div>
                                           <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Piso</label>
                                                    <input type="text" class="form-control" id="piso" name="piso">
                                                </div>
                                            </div>    
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Inserta grupo</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Grupos Registrados</h4>
                                    <p class="category">Modificación / eliminación de grupos</p>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse"><!--Div buscar-->
                                    <form class="navbar-form navbar-left" role="search" action="../assets/crud/buscar.php">
                                        <div class="form-group">
                                            <input type="text" name="s" class="form-control" placeholder="Buscar">
                                        </div>
                                    <button type="submit" class="btn btn-default">&nbsp;<i class="material-icons">search</i>&nbsp;</button>
                                    </form>
                                </div><!-- /.navbar-collapse FIN DIV BUSCAR -->
                                <div class="card-content table-responsive">

                                    <?php
                                        error_reporting(0);

                                    include "../Conexion/conexion.php";

                                    $qry= "SELECT * FROM grupo";
                                    $resultado = mysql_query($qry) or die ("*****ERROR: " .mysql_error());

                                    if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                            <th>ID</th>
                                            <th>Grupo</th>
                                            <th>Salon</th>
                                            <th>Piso</th>
                                            <th> </th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idgrupo']."</td>
                                                <td>".$registro['nombre']."</td>
                                                <td>".$registro['salon']."</td>
                                                <td>".$registro['piso']."</td>
                                                <td style='width:150px;'>
                                                <a id='ed-".$registro['idgrupo']."' class='btn btn-sm btn-warning'>Editar</a>
                                                <script>
                                                $('#ed-".$registro['idgrupo']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./frmActualizaGrupo.php?id=".$registro['idgrupo']."';
                                                    }
                                                });
                                                </script>
                                                
                                                <a href='#'' id='del-".$registro['idgrupo']."' class='btn btn-sm btn-danger'>Eliminar</a>
                                                <script>
                                                $('#del-".$registro['idgrupo']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./eliminarGrupo.php?id=".$registro['idgrupo']."';
                                                    }
                                                });
                                                </script>
                                                </td>
                                            </tr> ";//fin echo
                                        }    
                                        echo "</table>";
                                    }else{
                                        echo "<p class='alert alert-warning'>No hay resultados</p>";
                                    }

                                    ?>


                                   <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
              <h4 class='modal-title'>Agregar</h4>
            </div>
            <div class='modal-body'>
    <form role='form' method='post' action='php/agregar.php'>
      <div class='form-group'>
        <label for='idact'>id</label>
        <input type='text' class='form-control' name='idact' required readonly value="<?php echo $registro['idgrupo'] ?>">
      </div>
      <div class='form-group'>
        <label for='usuarioact'>Nombre</label>
        <input type='text' class='form-control' name='usuarioact' required>
      </div>
      <div class='form-group'>
        <label for='contrasenaact'>Salon</label>
        <input type='text' class='form-control' name='contrasenaact' required>
      </div>
      <div class='form-group'>
        <label for='rolact'>Piso</label>
        <input type='text' class='form-control' name='rolact' >
      </div>

      <button type='submit' class='btn btn-default'>Agregar</button>
    </form>
            </div>
<<<<<<< HEAD:App/admin/grupo.php

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.benc.sepc.edu.mx/">Benemérita Escuela Normal de Coahuila</a>, Hecha por alumnos del Instituto Tecnológico de Saltillo   
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->

<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->

<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</body>
</html> 
=======
<?php include("./footer.php"); ?>
>>>>>>> 3720f94a45e889dfe5ad61fc72db479673baadce:App/admin/grupo.php

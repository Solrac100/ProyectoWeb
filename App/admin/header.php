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
<!doctype html>
<html lang="en">
<!-- hola jajaja 08:07pm -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin | Trabajador</title>
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
                        <a href="/admin/index.php">
                            <i class="material-icons">home</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/admin/usuario.php">
                            <i class="material-icons">account_circle</i>
                            <p>Usuario</p>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/trabajador/" id="trabajador">
                            <i class="material-icons">person</i>
                            <p>Trabajador</p>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/alumno.php">
                            <i class="material-icons">school</i>
                            <p>Alumno</p>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/grupo.php">
                            <i class="material-icons">people</i>
                            <p>Grupo</p>
                        </a>
                    </li>                    
                    <li>
                        <a href="/admin/clase/">
                            <i class="material-icons">description</i>
                            <p>Clase</p>
                        </a>
                    </li>                    
                    <li>
                        <a href="/admin/periodo.php">
                            <i class="material-icons">date_range</i>
                            <p>Periodo</p>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/reportes.php">
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
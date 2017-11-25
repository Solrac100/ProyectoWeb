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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Reportes</h4>
                                    <p class="category">Datos del reporte</p>
                                </div>
                                <div class="card-content">
                                    <form>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Reporte de</label>
                                                    <select class="form-control" id="reportede" name="reportede">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="usuarios">Usuarios</option>
                                                        <option value="trabajadores">Trabajadores</option>
                                                        <option value="horario">Horario</option>
                                                        <option value="asistenciaalumnos">Asistencia alumnos</option>
                                                        <option value="asistenciaprofesores">Asistencia profesores</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Desde</label>
                                                    <input type="date" class="form-control" id="fechadesde" name="fechadesde">
                                                </div>
                                            </div>   
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Hasta</label>
                                                    <input type="date" class="form-control" id="fechahasta" name="fechahasta">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Generar reporte</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include("./footer.php"); ?>
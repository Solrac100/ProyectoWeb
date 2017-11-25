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
                                    <h4 class="title">Clase</h4>
                                    <p class="category">Datos de la Clase</p>
                                </div>
                                <div class="card-content">
                                    <form>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">ID Alumno</label>
                                                    <input type="text" class="form-control" id="idalumno" name="idalumno">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">ID Grupo</label>
                                                    <input type="text" class="form-control" id="idgrupo" name="idgrupo">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">ID Trabajador</label>
                                                    <input type="text" class="form-control" id="idtrabajador" name="idtrabajador">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">ID Periodo</label>
                                                    <input type="text" class="form-control" id="idperiodo" name="idperiodo">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Día</label>
                                                    <select class="form-control" id="dia" name="dia">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="Lunes">Lunes</option>
                                                        <option value="Martes">Martes</option>
                                                        <option value="Miercoles">Miércoles</option>
                                                        <option value="Jueves">Jueves</option>
                                                        <option value="Viernes">Viernes</option>
                                                        <option value="Sabado">Sábado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Hora</label>
                                                    <select class="form-control" id="dia" name="dia">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="07:45 a.m">07:45 a.m</option>
                                                        <option value="09:15 a.m">09:15 a.m</option>
                                                        <option value="11:05 a.m">11:05 a.m</option>
                                                        <option value="12:30 a.m">12:30 a.m</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Inserta alumno</button>
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
                                    <h4 class="title">Clases registradas</h4>
                                    <p class="category">Modificación / eliminación de clases</p>
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
                                    <table class="table table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>ID Alumno</th>
                                            <th>ID Grupo</th>
                                            <th>ID Trabajador</th>
                                            <th>ID Periodo</th>
                                            <th>Hora</th>
                                            <th>Día</th>
                                            <th> </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>7:45 a.m</td>
                                                <td>Lunes</td>
                                                <td style="width:150px;">
                                                    <a href="#" class="btn btn-sm btn-warning">Editar</a>  <!--EDITAR RUTA: ../assets/crud/editar.php-->
                                                    <a href="#" id="eliminar" class="btn btn-sm btn-danger">Eliminar</a> <!-- id="del-<?php echo $r["id"];?>" -->
                                                    <script>
                                                    $("#del-"+<?php echo $r["id"];?>).click(function(e){
                                                        e.preventDefault();
                                                        p = confirm("Estas seguro?");
                                                        if(p){
                                                            window.location="#"+<?php echo $r["id"];?>;

                                                        }

                                                    });
                                                    </script>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>2</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td>11.15 a.m</td>
                                                <td>Martes</td>
                                                <td style="width:150px;">
                                                    <a href="#" class="btn btn-sm btn-warning">Editar</a>  <!--EDITAR RUTA: ../assets/crud/editar.php-->
                                                    <a href="#" id="eliminar" class="btn btn-sm btn-danger">Eliminar</a> <!-- id="del-<?php echo $r["id"];?>" -->
                                                    <script>
                                                    $("#del-"+<?php echo $r["id"];?>).click(function(e){
                                                        e.preventDefault();
                                                        p = confirm("Estas seguro?");
                                                        if(p){
                                                            window.location="#"+<?php echo $r["id"];?>;

                                                        }

                                                    });
                                                    </script>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include("./footer.php"); ?>

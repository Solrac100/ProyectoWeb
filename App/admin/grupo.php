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
                                    <h4 class="title">Grupos</h4>
                                    <p class="category">Datos del grupo</p>
                                </div>
                                <div class="card-content">
                                    <form>
                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombre Grupo</label>
                                                    <input type="text" class="form-control" id="grupo" name="grupo">
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
                                    <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Salón</th>
                                        <th>Piso</th>
                                        <th> </th>
                                    </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1A</td>
                                                <td>R4</td>
                                                <td>1</td>
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
                                                <td>1</td>
                                                <td>2A</td>
                                                <td>R5</td>
                                                <td>1</td>
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
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
                                    <h4 class="title">Periodos</h4>
                                    <p class="category">Datos del periodo</p>
                                </div>
                                <div class="card-content">
                                    <form action="insertarPeriodo.php" method="post">
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tipo</label>
                                                    <input type="text" class="form-control" id="tipoperiodo" name="tipoperiodo">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Año</label>
                                                    <input type="text" class="form-control" id="añoperiodo" name="añoperiodo">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Inserta periodo</button>
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
                                    <h4 class="title">Periodos Registrados</h4>
                                    <p class="category">Modificación / eliminación de periodos</p>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse"><!--Div buscar-->
                                    <!-- <form class="navbar-form navbar-left" role="search" action="../assets/crud/buscar.php">
                                        <div class="form-group">
                                            <input type="text" name="s" class="form-control" placeholder="Buscar">
                                        </div>
                                    <button type="submit" class="btn btn-default">&nbsp;<i class="material-icons">search</i>&nbsp;</button>
                                    </form> -->
                                </div><!-- /.navbar-collapse FIN DIV BUSCAR -->
                                <div class="card-content table-responsive">
                                    <?php
                                        error_reporting(0);

                                    include "../Conexion/conexion.php";

                                    $qry= "SELECT * FROM periodo";
                                    $resultado = mysql_query($qry) or die ("*****ERROR: " .mysql_error());

                                    if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                            <th>ID</th>
                                            <th>Tipo</th>
                                            <th>Año</th>
                                            <th> </th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idperiodo']."</td>
                                                <td>".$registro['tipo']."</td>
                                                <td>".$registro['ano']."</td>
                                                <td style='width:150px;'>
                                                <a href='#' id='ed-".$registro['idperiodo']."' class='btn btn-sm btn-warning'>Editar</a>
                                                <script>
                                                $('#ed-".$registro['idperiodo']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./frmActualizaPeriodo.php?id=".$registro['idperiodo']."';
                                                    }
                                                });
                                                </script>
                                                
                                                <a href='#'' id='del-".$registro['idperiodo']."' class='btn btn-sm btn-danger'>Eliminar</a>
                                                <script>
                                                $('#del-".$registro['idperiodo']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./eliminarPeriodo.php?id=".$registro['idperiodo']."';
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
<?php include("./footer.php"); ?>
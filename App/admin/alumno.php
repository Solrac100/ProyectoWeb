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
                                    <h4 class="title">Alumnos</h4>
                                    <p class="category">Datos del Alumno</p>
                                </div>
                                <div class="card-content">
                                    <form action="insertarAlumno.php" method="post">
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Apellidos(s)</label>
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombre(s)</label>
                                                    <input type="text" class="form-control" id="nombres" name="nombres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Grupo</label>
                                                    <?php
                                                    //poblar combo con los grupos
                                                    error_reporting(0);
                                                    include "../Conexion/conexion.php";

                                                    $qry = "SELECT * FROM grupo";
                                                    $resultado = mysql_query($qry);
                                                    if(mysql_num_rows($resultado)>0)
                                                    {
                                                        echo "<select class='form-control' name='grupo' id='selgrupo'>";
                                                        echo "<option selected='true' disabled='disabled'></option>";
                                                    
                                                        while($registro = mysql_fetch_array($resultado))
                                                        {
                                                            $grupoid = $registro['idgrupo'];
                                                            $gruponombre = $registro['nombre'];

                                                            echo "<option id='optCosas' name='optCosas' value='$grupoid'>$gruponombre</option>";
                                                        }
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Usuario</label>
                                                    <?php
                                                    //poblar combo con los grupos
                                                    error_reporting(0);
                                                    include "../Conexion/conexion.php";

                                                    $qry = "SELECT * FROM usuario WHERE rol='J'";
                                                    $resultado = mysql_query($qry);
                                                    if(mysql_num_rows($resultado)>0)
                                                    {
                                                        echo "<select class='form-control' name='usuario' id='selgrupo'>";
                                                        echo "<option selected='true' disabled='disabled'></option>";
                                                    
                                                        while($registro = mysql_fetch_array($resultado))
                                                        {
                                                            $usuarioid = $registro['idusuario'];
                                                            $usuario = $registro['usuario'];

                                                            echo "<option id='optCosas' name='optCosas' value='$usuarioid'>$usuario</option>";
                                                        }
                                                    }
                                                    ?>
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
                                    <h4 class="title">Alumnos registrados</h4>
                                    <p class="category">Modificación / eliminación de alumnos</p>
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

                                    $qry= "SELECT * FROM alumno";
                                    $resultado = mysql_query($qry) or die ("*****ERROR: " .mysql_error());

                                    if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>idgrupo</th>
                                            <th>idusuario</th>
                                            <th> </th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idalumno']."</td>
                                                <td>".$registro['nombre']."</td>
                                                <td>".$registro['apellidos']."</td>
                                                <td>".$registro['idgrupo']."</td>
                                                <td>".$registro['usuario_idusuario']."</td>
                                                <td style='width:150px;'>
                                                <a href='#' id='ed-".$registro['idalumno']."' class='btn btn-sm btn-warning'>Editar</a>
                                                <script>
                                                $('#ed-".$registro['idalumno']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./frmActualizaAlumno.php?id=".$registro['idalumno']."';
                                                    }
                                                });
                                                </script>
                                                
                                                <a href='#'' id='del-".$registro['idalumno']."' class='btn btn-sm btn-danger'>Eliminar</a>
                                                <script>
                                                $('#del-".$registro['idalumno']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./eliminarAlumno.php?id=".$registro['idalumno']."';
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
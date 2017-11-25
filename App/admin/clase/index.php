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
<?php 

    include "../../Conexion/conexion.php";
    $qry= "SELECT * FROM alumno";
    $alum = mysql_query($qry) or die ("*****ERROR: " .mysql_error()); 
    $qry= "SELECT * FROM grupo";
    $grup = mysql_query($qry) or die ("*****ERROR: " .mysql_error());
    $qry= "SELECT * FROM trabajador";
    $trab = mysql_query($qry) or die ("*****ERROR: " .mysql_error());
    $qry= "SELECT * FROM periodo";
    $period = mysql_query($qry) or die ("*****ERROR: " .mysql_error()); 
    $qry= "SELECT * FROM materia";
    $mat = mysql_query($qry) or die ("*****ERROR: " .mysql_error()); 

?>

<?php include("../header.php"); ?>
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
                                    <form action="insertarClase.php" method="post">
                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Alumno</label>
                                                    <select class="form-control" id="alumno" name="alumno">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <?php while($row=mysql_fetch_array($alum)){
                                                         ?>
                                                        <option value="<?php echo $row['idalumno'] ?>"><?php echo $row['nombre'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Grupo</label>
                                                    <select class="form-control" id="grupo" name="grupo">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <?php while($row=mysql_fetch_array($grup)){
                                                         ?>
                                                        <option value="<?php echo $row['idgrupo'] ?>"><?php echo $row['nombre'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Trabajador</label>
                                                    <select class="form-control" id="trabajador" name="trabajador">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <?php while($row=mysql_fetch_array($trab)){
                                                         ?>
                                                        <option value="<?php echo $row['idtrabajador'] ?>"><?php echo $row['nombre'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Periodo</label>
                                                    <select class="form-control" id="periodo" name="periodo">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <?php while($row=mysql_fetch_array($period)){
                                                         ?>
                                                        <option value="<?php echo $row['idperiodo'] ?>"><?php echo $row['tipo'] ?></option>
                                                        <?php } ?>
                                                    </select>
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
                                                    <select class="form-control" id="hora" name="hora">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="07:45 a.m">07:45 a.m</option>
                                                        <option value="09:15 a.m">09:15 a.m</option>
                                                        <option value="11:05 a.m">11:05 a.m</option>
                                                        <option value="12:30 a.m">12:30 a.m</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Materia</label>
                                                    <select class="form-control" id="materia" name="materia">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <?php while($row=mysql_fetch_array($mat)){
                                                         ?>
                                                        <option value="<?php echo $row['idmateria'] ?>"><?php echo $row['nombre'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Inserta Clase</button>
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
                                    <?php
                                        error_reporting(0);

                                    include "../../Conexion/conexion.php";

                                    $qry= "SELECT * FROM clase";
                                    $resultado = mysql_query($qry) or die ("*****ERROR: " .mysql_error());

                                    if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                            <th>ID</th>
                                            <th>Alumno</th>
                                            <th>Grupo</th>
                                            <th>Profesor</th>
                                            <th>Periodo</th>
                                            <th>Hora</th>
                                            <th>Dia</th>
                                            <th>Materia</th>
                                            <th> </th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idclase']."</td>
                                                <td>".$registro['idalumno']."</td>
                                                <td>".$registro['idgrupo']."</td>
                                                <td>".$registro['idtrabajador']."</td>
                                                <td>".$registro['periodo_idperiodo']."</td>
                                                <td>".$registro['hora']."</td>
                                                <td>".$registro['dia']."</td>
                                                <td>".$registro['materia_idmateria']."</td>
                                                <td style='width:150px;'>
                                                <a href='#' id='ed-".$registro['idclase']."' class='btn btn-sm btn-warning'>Editar</a>
                                                <script>
                                                $('#ed-".$registro['idclase']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./frmActualizaClase.php?id=".$registro['idclase']."';
                                                    }
                                                });
                                                </script>
                                                
                                                <a href='#'' id='del-".$registro['idclase']."' class='btn btn-sm btn-danger'>Eliminar</a>
                                                <script>
                                                $('#del-".$registro['idclase']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./eliminarClase.php?id=".$registro['idclase']."';
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
<?php include("../footer.php"); ?>

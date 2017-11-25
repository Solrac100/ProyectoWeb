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
<?php include("../header.php"); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Trabajador</h4>
                                    <p class="category">Datos del trabajador</p>
                                </div>
                                <div class="card-content">
                                    <form action="insertarTrabajador.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombre(s)</label>
                                                    <input type="text" class="form-control" id="nombres" name="nombres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Apellidos(s)</label>
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Celular</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                                </div>
                                            </div>                                          
                                           <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Correo</label>
                                                    <input type="email" class="form-control" id="correo" name="correo">
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div >
                                                    <label >Seleccionar imagen...</label>
                                                    <input accept="image/*"  type="file" capture id="seleccionaimagen" name="seleccionaimagen"> <!-- abre la camara en caso de ser un disposituvo móvil -->
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Insertar trabajador</button>
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
                                    <h4 class="title">Trabajadores registrados</h4>
                                    <p class="category">Modificación / eliminación de trabajadores</p>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse"><!--Div buscar-->
                                    <form class="navbar-form navbar-left" role="search" action="../../assets/crud/buscar.php">
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

                                    $qry= "SELECT * FROM trabajador";
                                    $resultado = mysql_query($qry) or die ("*****ERROR: " .mysql_error());

                                    if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Celular</th>
                                            <th>Correo</th>
                                            <th>Eliminado</th>
                                            <th>ID Usuario</th>
                                            <th> </th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idtrabajador']."</td>
                                                <td>".$registro['nombre']."</td>
                                                <td>".$registro['apellidos']."</td>
                                                <td>".$registro['celular']."</td>
                                                <td>".$registro['correo']."</td>
                                                <td>".$registro['fechaelim']."</td>
                                                <td>".$registro['usuario_idusuario']."</td>
                                                <td style='width:150px;'>
                                                <a href='#' id='ed-".$registro['idtrabajador']."' class='btn btn-sm btn-warning'>Editar</a>
                                                <script>
                                                $('#ed-".$registro['idtrabajador']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./frmActualizaTrabajador.php?id=".$registro['idtrabajador']."';
                                                    }
                                                });
                                                </script>
                                                
                                                <a href='#'' id='del-".$registro['idtrabajador']."' class='btn btn-sm btn-danger'>Eliminar</a>
                                                <script>
                                                $('#del-".$registro['idtrabajador']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./eliminarTrabajador.php?id=".$registro['idtrabajador']."';
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


            <!-- Modal -->
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
        <input type='text' class='form-control' name='idact' required readonly value="<?php echo $registro['idusuario'] ?>">
      </div>
      <div class='form-group'>
        <label for='usuarioact'>Usuario</label>
        <input type='text' class='form-control' name='usuarioact' required>
      </div>
      <div class='form-group'>
        <label for='contrasenaact'>Contraseña</label>
        <input type='text' class='form-control' name='contrasenaact' required>
      </div>
      <div class='form-group'>
        <label for='rolact'>Rol</label>
        <input type='email' class='form-control' name='rolact' >
      </div>

      <button type='submit' class='btn btn-default'>Agregar</button>
    </form>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
<?php include("../footer.php"); ?>
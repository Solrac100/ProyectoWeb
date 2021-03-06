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
                                    <h4 class="title">Usuarios</h4>
                                    <p class="category">Datos del Usuario</p>
                                </div>
                                <div class="card-content">
                                    <form action="insertarUsuario.php" method="post">
                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Usuario</label>
                                                    <input type="text" class="form-control" id="usuario" name="usuario">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Contraseña</label>
                                                    <input type="text" class="form-control" id="contraseña" name="contraseña">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rol</label>
                                                    <select class="form-control" id="rol" name="rol">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="A">Administrador</option>
                                                        <option value="J">Jefe de Grupo</option>
                                                        <option value="M">Maestro</option>
                                                        <option value="P">Prefecto</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Inserta usuario</button>
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
                                    <h4 class="title">Usuarios registrados</h4>
                                    <p class="category">Modificación / eliminación de usuarios</p>
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

                                    $qry= "SELECT * FROM usuario";
                                    $resultado = mysql_query($qry) or die ("*****ERROR: " .mysql_error());

                                    if(mysql_num_rows($resultado)>0)
                                    {
                                        echo "
                                        <table class='table table-hover'>
                                        <thead>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Contraseña</th>
                                            <th>Rol</th>
                                            <th> </th>
                                        </thead>";

                                        while($registro = mysql_fetch_array($resultado))
                                        {
                                            echo "
                                            <tr>
                                                <td>".$registro['idusuario']."</td>
                                                <td>".$registro['usuario']."</td>
                                                <td>".$registro['contrasena']."</td>
                                                <td>".$registro['rol']."</td>
                                                <td style='width:150px;'>
                                                <a href='#' id='ed-".$registro['idusuario']."' class='btn btn-sm btn-warning'>Editar</a>
                                                <script>
                                                $('#ed-".$registro['idusuario']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./frmActualizaUsuario.php?id=".$registro['idusuario']."';
                                                    }
                                                });
                                                </script>
                                                
                                                <a href='#'' id='del-".$registro['idusuario']."' class='btn btn-sm btn-danger'>Eliminar</a>
                                                <script>
                                                $('#del-".$registro['idusuario']."').click(function(e){
                                                    e.preventDefault();
                                                    p = confirm('Estas seguro?');
                                                    if(p){
                                                        window.location='./eliminarUsuario.php?id=".$registro['idusuario']."';
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
<?php include("./footer.php"); ?>
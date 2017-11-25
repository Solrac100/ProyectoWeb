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
<?php include("./footer.php"); ?>


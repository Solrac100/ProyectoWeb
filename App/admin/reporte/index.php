
<?php include("../header.php"); 
$hoy = date("Y-m-d",time());
?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Reportes de asistencias</h4>
                                    <p class="category">Datos del reporte</p>
                                </div>
                                <div class="card-content">
                                    <form action="./asistencias.php" method="POST">
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Reporte de</label>
                                                    <select class="form-control" id="reportede" name="reportede">
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="alumnos">Alumnos</option>
                                                        <option value="maestros">Maestros</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Desde</label>
                                                    <input type="date" class="form-control" id="fechadesde" name="fechadesde" max="<?php echo $hoy; ?>" onchange="validafecha()">
                                                </div>
                                            </div>   
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Hasta</label>
                                                    <input type="date" class="form-control" id="fechahasta" name="fechahasta" max="<?php echo $hoy; ?>" onchange="validafecha()">
                                                    <script>
                                                        function validafecha()
                                                        {
                                                            var min  = document.getElementById("fechadesde").value;
                                                            document.getElementById("fechahasta").setAttribute("min", min);
                                            
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right" id="btnenviar">Generar reporte</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php include("../footer.php"); ?>
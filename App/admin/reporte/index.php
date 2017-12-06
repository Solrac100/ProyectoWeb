
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
                                                    <input type="date" class="form-control" id="fechadesde" name="fechadesde" >
                                                </div>
                                            </div>   
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Hasta</label>
                                                    <input type="date" class="form-control" id="fechahasta" name="fechahasta" >
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right" >Generar reporte</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $('#fechadesde').datepicker({
                    dateFormat: "dd-M-yy" 
                });

                $("#fechahasta").datepicker({
                    dateFormat: "dd-M-yy", 
                    minDate:  0,
                    onSelect: function(date){            
                        var date1 = $('#fechahasta').datepicker('getDate');           
                        var date = new Date( Date.parse( date1 ) ); 
                        date.setDate( date.getDate() + 1 );        
                        var newDate = date.toDateString(); 
                        newDate = new Date( Date.parse( newDate ) );                      
                        $('#fechadesde').datepicker("option","minDate",newDate);            
                    }
                });

            </script>
<?php include("../footer.php"); ?>
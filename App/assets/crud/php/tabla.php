<?php

include "../../../Conexion/conexion.php";

$qry= "SELECT * FROM usuario";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR EL REGISTRO: " .mysql_error());

if(mysql_num_rows($resultado)>0)
{
	echo "
	<table class='table table-hover'>
	<thead>
	    <th>ID</th>
	    <th>Usuario</th>
	    <th>Contraseña</th>
	    <th>Rol</th>
	    <th>ID Trabajador</th>
	    <th> </th>
	</thead>";

	while($registro = mysql_fetch_array($resultado))
	{
		echo "
		<tr>
    		<td>1</td>
            <td>Jorge</td>
            <td>López</td>
            <td>10/05/2017</td>
            <td>2</td>
            <td>4</td>
            <td style='width:150px;'>
            <a href='#' class='btn btn-sm btn-warning'>Editar</a>  <!--EDITAR RUTA: ../assets/crud/editar.php-->
            <a href='#'' id='eliminar' class='btn btn-sm btn-danger'>Eliminar</a> <!-- id='del-<?php echo $r['id'];?>' -->
            <script>
            $('#del-'".$registro['id'];.").click(function(e){
            	e.preventDefault();
            	p = confirm('Estas seguro?');
            	if(p){
	            	window.location='./php/eliminar.php?id=".$registro['id'];.";
				}
			});
			</script>
            </td>
        </tr> ";//fin echo
    }    
	echo "</table>";
else{
	echo "<p class='alert alert-warning'>No hay resultados</p>";
}

?>

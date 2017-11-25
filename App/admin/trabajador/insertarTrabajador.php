<?php 
error_reporting(0);//sale el error de que mysql ya se hará obsoleto
include("../../Conexion/conexion.php");

$nombre = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$celular =$_POST['telefono'];
$correo =$_POST['correo'];

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
copy($_FILES['foto']['tmp_name'], '/var/www/ProyectoWeb/App/uploads'.$_FILES['foto']['name'].'');
$subido = true;
}
if($subido) {
echo "exito"; exit();
} else {
echo "Error"; exit();
}

$qry = "INSERT INTO trabajador(nombre,apellidos,celular,correo,usuario_idusuario) VALUES ('$nombre','$apellidos','$celular','$correo', '14')";
$resultado = mysql_query($qry) or die ("*****ERROR AL INSERTAR TRABAJADOR: " .mysql_error());
//redirigir el programa al script html de captura de datos
echo "<script type='text/javascript'> alert('Registro insertado con éxito');window.location='index.php' </script>";
break;


?>
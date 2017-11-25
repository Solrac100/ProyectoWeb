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
            <div class="content" id="content">
                <div class="container-fluid">
                    <div class="row">
                        <center><img src="../assets/imagenes/logo.png" width="30%" height="30%"></center>
                    </div>
                </div>
            </div>
<?php include("./footer.php"); ?>

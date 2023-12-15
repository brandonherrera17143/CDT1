<h1>Pagina de INICIO</h1>

<?php
if (!empty($_SESSION['nombre'])) {
    echo "Bienvenido " . $_SESSION['nombre'] . " " . $_SESSION['apellido'];
} else {
    echo "No has iniciado sesion";
}

?>
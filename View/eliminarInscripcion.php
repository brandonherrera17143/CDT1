<?php

use Controller\InscripcionController;

$inscripcion = new InscripcionController();

$registro = $inscripcion->borrar();
$inscripcion->confirmarEliminacion();

?>

<form method="post">
    <h2><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?> </h2>
    <p>Seguro que te quieres salir del curso de: <strong><?php echo $registro['nombre_curso']; ?></strong></p>

    <input type="hidden" name="idInscripcion" value="<?php echo $registro['id_inscripcion']; ?>">

    <button class="btn btn-primary" type="submit">Borrar</button>
</form>
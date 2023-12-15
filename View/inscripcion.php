<?php

use Controller\inscripcionController;
use Controller\CursoController;

$cursos = new CursoController();
$insUser = new InscripcionController();

if (!empty($_SESSION['id_usuario'])) {

?>

<h1>Formulario de inscripcion</h1>

<div class="container">

    <form method="POST">
        <h1>
            <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'];  ?>
        </h1>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Curso</label></div>
                <div class="col-6">
                    <select class="form-select rounded" name="fkcurso">
                        <?php
                            $listaCursos = $cursos->mostrarCursos();
                            foreach ($listaCursos as $row => $item) {
                                echo "<option value='{$item['id_curso']}'>{$item['nombre_curso']}</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>

    <?php

    $insUser->inscripcionUsuario();
}
    ?>
</div>
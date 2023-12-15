<?php

use Controller\InscripcionController;
use Controller\CursoController;


$inscripcion = new InscripcionController();

$lista = $inscripcion->editar(); //llama a la funcion editar del controlador y trae los datos de la inscripcion a editar
$inscripcion->actualizar(); //llama a la funcion actualizar del controlador y actualiza los datos
$cursos = new CursoController();


?>

<form method="POST">

    <h2>
        <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?>
    </h2>

    <div class="form-group">
        <div class="row mb-3">
            <div class="col-2"><label>Curso Anterior</label></div>
            <div class="col-6"><input class="form-control" type="text" name="cursoAnterior" placeholder="Ingresa curso" value="<?php echo $lista['nombre_curso']; ?> " readonly></input></div>
            <input type="hidden" values="<?php echo $lista['id_curso'] ?>" name="idCursoAnterior">
        </div>
    </div>

    <div class="form-group">
        <div class="row mb-3">
            <div class="col-2"><label>Nuevo Curso</label></div>
            <div class="col-6">
                <select class="form-select rounded" name="fkcurso">
                    <?php
                    $listaCursos = $cursos->mostrarCursos();
                    foreach ($listaCursos as $curso) {
                        $selected = ($curso['id_curso'] == $idInscripcion) ? "selected" : "";
                        echo "<option value='{$curso['id_curso']}' $selected>{$curso['nombre_curso']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <input type="hidden" name="idInscripcion" value="<?php echo $lista['id_inscripcion']; ?>">

    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </div>
        </div>
    </div>

</form>
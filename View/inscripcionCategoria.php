<?php

use Controller\CategoriaController;
use Controller\InscripcionController;

$categorias = new CategoriaController();
$inscripcion = new InscripcionController();

if (!empty($_SESSION['id_usuario'])) {

?>

<h1>Incripcion por categoria</h1>

<div class="container">

    <form method="POST">
        <h1>
            <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'];  ?>
        </h1>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Categoria</label></div>
                <div class="col-2">
                    <select class="form-select rounded" name="idCategoria">
                        <?php
                            $listaCategoria = $categorias->mostrarCategorias();
                            foreach ($listaCategoria as $row => $item) {
                                echo "<option value='{$item['id_categoria']}'>{$item['categoria']}</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </div>
    </form>

    <form method='POST'>
        <div class='form-group'>
            <div class='row mb-3'>
                <div class='col-2'><label>Cursos</label></div>
                <div class='col-6'>
                    <select class='form-select rounded' name='fkcurso'>
                        <?php
                            $listaCursos = $categorias->mostrarCursos();
                            foreach ($listaCursos as $row => $item) {
                                echo "<option value='{$item['id_curso']}'>{$item['nombre_curso']}</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <div class='row'>
                <div class='col-6'>
                    <button class='btn btn-primary' type='submit'>Inscribirme</button>
                </div>
            </div>
        </div>
    </form>

    <?php
    $inscripcion->inscripcionUsuario();
}
    ?>
</div>
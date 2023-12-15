<?php

use Controller\InscripcionController;

if (!empty($_SESSION['id_usuario'])) {

    $inscripcion = new InscripcionController();
    $lista = $inscripcion->mostrarInscripcion();

    echo "<h1>Inscripciones a los Cursos</h1>";

    if (!empty($lista)) {
        echo "<table class='table'>
        <thead>
            <tr>
                <th scope='col'>No. de Inscripción</th>
                <th scope='col'>Usuario</th>
                <th scope='col'>Curso</th>
                <th scope='col'>Acciones</th>
            </tr>
        </thead>
        <tbody>";
        $contador = 0;
        foreach ($lista as $row => $item) {
            $contador++;
            echo "<tr>
                <td>$contador</td>
                <td>{$item['usuario']}</td>
                <td>{$item['nombre_curso']}</td>
                <td>
                    <a href='index.php?action=editarInscripcion&idInscripcion={$item['id_inscripcion']}' class='btn btn-primary'>Editar</a>
                    <a href='index.php?action=eliminarInscripcion&idInscripcion={$item['id_inscripcion']}' class='btn btn-danger'>Eliminar</a>
                </td>
            </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No tienes inscripciones a cursos.";
    }
} else {
    echo "No has iniciado sesión";
}

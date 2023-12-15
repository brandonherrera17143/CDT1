<?php

namespace Controller;

use Model\InscripcionModel;


class InscripcionController
{

    public function inscripcionUsuario()
    {

        if ($_POST) {
            date_default_timezone_set('America/Guatemala');

            if (!empty($_POST['fkcurso'])) {
                $datos = array(
                    "idcurso" => $_POST['fkcurso'],
                    "idusuario" => $_SESSION['id_usuario'], //$_SESSION['id_usuario'] = 1;
                    "fecha" => date("Y-m-d H:i:s")
                );

                $continuarActualizacion = InscripcionModel::verificarInscripcionDuplicada($datos);
                echo "El resultado de la verificación es: " . $continuarActualizacion;

                if ($continuarActualizacion) {
                    $respuesta = InscripcionModel::guardarIncripcion($datos);

                    if ($respuesta) {

                        echo "<div class='alert alert-dark' role='alert'>
            <strong>  DATO INSERTADO </strong>
            </div>";
                    } else {
                        echo "Error al inscribirse";
                    }
                } else {
                    echo "<div class='alert alert-dark' role='alert'>
            <strong>  Ya estas inscrito en el curso! </strong>
            </div>";
                }
            } else {
                echo "<alert>Completa los campos</alert>";
            }
        } else {
            echo "";
        }
    }

    public function mostrarInscripcion()
    {
        $inscripcion = InscripcionModel::mostrarInscripcion();
        return $inscripcion;
    }

    public function editar()
    {
        $idInscripcion = $_GET['idInscripcion'];
        $resultado = InscripcionModel::editarInscripcion($idInscripcion);
        return $resultado;
    }

    public static function actualizar()
    {
        if ($_POST) {
            if (!empty($_POST['idInscripcion']) && !empty($_POST['fkcurso'])) {
                $datos = array(
                    "idinscripcion" => $_POST['idInscripcion'],
                    "idcurso" => $_POST['fkcurso'],
                    "idusuario" => $_SESSION['id_usuario']
                );

                $continuarActualizacion = InscripcionModel::verificarInscripcionDuplicada($datos);
                echo "El resultado de la verificación es: " . $continuarActualizacion;

                if ($continuarActualizacion) {
                    $respuesta = InscripcionModel::actualizarInscripcion($datos);
                    echo "La respuesta de la actualización es: " . $respuesta;
                    if ($respuesta) {
                        header("location:index.php?action=mostrarInscripcion");
                    } else {
                        echo "<alert>algo salio mal</alert>";
                    }
                } else {
                    echo "<div class='alert alert-dark' role='alert'>
                    <strong>  Ya estas inscrito en este curso! </strong>
                    </div>";
                }
            } else {
                echo "<alert>Completa los campos</alert>";
            }
        }
    }

    public function borrar()
    {
        if (!empty($_GET['idInscripcion'])) {
            $inscripcion = InscripcionModel::borrarInscripcion($_GET['idInscripcion']);
            return $inscripcion;
        }
    }

    public function confirmarEliminacion()
    {
        if (!empty($_POST['idInscripcion'])) {
            $respuesta = InscripcionModel::confirmarInscripcion($_POST['idInscripcion']);
            if ($respuesta) {
                header("location:index.php?action=mostrarInscripcion");
            }
        }
    }
}

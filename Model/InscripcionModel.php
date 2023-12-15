<?php

namespace Model;

use Model\ConexionModel; //importamos la clase ConexionModel

class InscripcionModel
{ //creamos la clase InscripcionModel

    public static function guardarIncripcion($datos)
    {
        try {

            $stmt = ConexionModel::conectar()->prepare("Insert into inscripcion (fecha_inscripcion, fk_curso, fk_usuario) values(:fecha, :cur, :user)");
            $stmt->bindParam(":fecha", $datos['fecha'], \PDO::PARAM_STR); // \PDO::PARAM_STR es para indicar que es un string
            $stmt->bindParam(":cur", $datos['idcurso'], \PDO::PARAM_STR); //bindparam es para evitar inyeccion sql
            $stmt->bindParam(":user", $datos['idusuario'], \PDO::PARAM_STR);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $e) {
            echo "Error al insertar datos: " . $e->getMessage();
        }
    }

    public static function mostrarInscripcion()
    {

        if ($_SESSION['rolUsuario'] == "admin") {
            $stmt = ConexionModel::conectar()->prepare("Select * from inscripcion inner join cursos on inscripcion.fk_curso=cursos.id_curso inner join usuarios on fk_usuario=usuarios.id_usuario");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } else if ($_SESSION['rolUsuario'] == "alumno") {
            $stmt = ConexionModel::conectar()->prepare("Select * from inscripcion inner join cursos on inscripcion.fk_curso=cursos.id_curso inner join usuarios on fk_usuario=usuarios.id_usuario 
            where fk_usuario=:idUsuario");
            $stmt->bindParam(":idUsuario", $_SESSION['id_usuario'], \PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } else {
            $stmt = ConexionModel::conectar()->prepare("select usuarios.nombre, cursos.nombre_curso, inscripcion.fecha_inscripcion from inscripcion
            inner JOIN cursos on cursos.id_curso=inscripcion.fk_curso
            INNER JOIN usuarios on usuarios.id_usuario = inscripcion.fk_usuario;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        }

        return $resultado;
    }

    public static function editarInscripcion($idInscripcion)
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM inscripcion INNER join cursos on inscripcion.fk_curso=cursos.id_curso where id_inscripcion=:id");
        $stmt->bindParam(":id", $idInscripcion, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    //verificamos si el estudiante ya esta en ese curso o aun no:
    public static function verificarInscripcionDuplicada($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("SELECT * FROM inscripcion WHERE fk_usuario = :idUsuario AND fk_curso = :idCurso");
            $stmt->bindParam(":idUsuario", $datos['idusuario'], \PDO::PARAM_INT);
            $stmt->bindParam(":idCurso", $datos['idcurso'], \PDO::PARAM_INT);
            $stmt->execute();

            $resultado = $stmt->fetch();

            if ($resultado) {
                // El alumno ya está inscrito en este curso.
                return false;
            } else {
                // El alumno no está inscrito en este curso.
                return true;
            }
        } catch (\PDOException $e) {
            // Manejo de errores en la consulta.
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function actualizarInscripcion($datos)
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("UPDATE inscripcion SET fk_curso = :curso WHERE id_inscripcion = :id");
            $stmt->bindParam(':curso', $datos['idcurso'], \PDO::PARAM_INT);
            $stmt->bindParam(':id', $datos['idinscripcion'], \PDO::PARAM_INT);
            $result = $stmt->execute();

            if ($result) {
                return true;
            } else {
                // Manejo de errores en la actualización.
                echo "Error en la actualización.";
                return false;
            }
        } catch (\PDOException $e) {
            // Manejo de errores en la consulta.
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function borrarInscripcion($idInscripcion)
    {
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM inscripcion INNER join cursos on inscripcion.fk_curso=cursos.id_curso where id_inscripcion=:id");
        $stmt->bindParam(":id", $idInscripcion, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function confirmarInscripcion($id)
    {
        $stmt = ConexionModel::conectar()->prepare("delete from inscripcion where id_inscripcion=:id");
        $stmt->bindParam(":id", $id, \PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}

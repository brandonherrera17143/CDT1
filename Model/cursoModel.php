<?php

namespace Model;

use Model\ConexionModel; //importamos la clase ConexionModel

class CursoModel
{ //creamos la clase InscripcionModel


    public static function mostrarCursos()
    {
        try {
            $stmt = ConexionModel::conectar()->prepare("Select * from cursos");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            // Manejo de errores, por ejemplo:
            die("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }
}

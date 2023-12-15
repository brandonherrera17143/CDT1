<?php

namespace Model;

use Model\ConexionModel; //importamos la clase ConexionModel

class CategoriaModel
{ //creamos la clase InscripcionModel


    public static function mostrarCategorias()
    {

        $stmt = ConexionModel::conectar()->prepare("Select * from categorias");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function mostrarCursosCategoria($id_categoria)
    {
        $stmt = ConexionModel::conectar()->prepare("Select * from cursos where fk_categoria = :id");
        $stmt->bindParam(":id", $id_categoria, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
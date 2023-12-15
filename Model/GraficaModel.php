<?php

namespace Model;

use Model\ConexionModel;

class GraficaModel
{
    public static function mostrarGrafica()
    {

        $sql = "SELECT COUNT(*) AS cantidad, nombre FROM usuario INNER JOIN rol ON usuario.idRol = rol.idRol GROUP BY nombre";
        //  SELECT curso,count(curso) as cantidad from inscripcion INNER JOIN curso on fkcurso = curso.id group by curso
        $stmt = ConexionModel::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

<?php

namespace Controller;

use Model\CursoModel;


class CursoController
{


    public function mostrarCursos()
    {
        $cursos = CursoModel::mostrarCursos();
        return $cursos;
    }
}

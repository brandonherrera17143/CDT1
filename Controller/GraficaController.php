<?php
namespace Controller;
use Model\GraficaModel;

class GraficaController
{
    public function mostrarGrafica()
    {
        $grafica = GraficaModel::mostrarGrafica();
        return $grafica;
    }
}
?>
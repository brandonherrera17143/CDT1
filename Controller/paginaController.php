<?php

namespace Controller;

use Model\EnlacesModel;

class PaginaController
{

    public function mostrarInicio()
    {
        require_once("View/template.php");
    }

    public function enlacesPagina()
    {
        if (isset($_GET['action'])) { //iseet verifica si existe una variable o no
            $enlaces = $_GET['action']; //Get obtiene la variable por la url
        } else {
            $enlaces = "inicio"; //si no existe la variable en la url, se le asigna inicio
        }
        $respuesta = EnlacesModel::enlacesPagina($enlaces); //el modelo se encarga de hacer la consulta a la base de datos

        require_once($respuesta);
    }
}

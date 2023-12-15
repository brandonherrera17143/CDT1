<?php

session_start();

require_once("autoload.php");
require_once("helpers/helpers.php");

use Controller\paginaController;

$pagina = new paginaController();

$pagina->mostrarInicio();

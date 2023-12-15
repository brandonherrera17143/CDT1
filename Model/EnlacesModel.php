<?php

namespace Model;

class EnlacesModel
{

    public static function enlacesPagina($enlace)
    {

        $modulo = match ($enlace) {
            "inicio" => "View/inicio.php",
            "contacto" => "View/contacto.php",
            "nosotros" => "View/nosotros.php",
            "inscripcion" => "View/inscripcion.php",
            "mostrarInscripcion" => "View/mostrarInscripcion.php",
            "editarInscripcion" => "View/editarInscripcion.php",
            "eliminarInscripcion" => "View/eliminarInscripcion.php",
            "login" => "View/login.php",
            "logout" => "View/logout.php",
            "inscripcionCategoria" => "View/inscripcionCategoria.php",
            "crearUsuario" => "View/nuevoUsuario.php",
            "mostrarTabla" => "View/mostrarTabla.php",
            "PDFcategorias" => "View/PDFcategorias.php",
            "pdf" => "View/pdf.php",
            default => "View/error.php"
        };
        return $modulo;
    }
}
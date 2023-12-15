<?php

namespace Controller;

use Model\CategoriaModel;


class CategoriaController
{


    public function mostrarCategorias()
    {
        $inscripcion = CategoriaModel::mostrarCategorias();
        return $inscripcion;
    }

    public function mostrarCursos()
    {
        if ($_POST) {
            if (!empty($_POST['idCategoria'])) {
                $cursos = CategoriaModel::mostrarCursosCategoria($_POST['idCategoria']);
                return $cursos;
            }
        }
    }

    public function pdfControllerCategoria()
    {

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);

        $categorias = new CategoriaController();
        //$inscripciones = $categorias->mostrarInscripcion();
        $listaCategoria = $categorias->mostrarCategorias();
        foreach ($listaCategoria as $row => $item) {
            echo "<option value='{$item['id_categoria']}'>{$item['categoria']}</option>";
        }
        echo '<pre>';
        var_dump($listaCategoria);
        echo '</pre>';
        // Encabezado
        $pdf->Cell(40, 10, 'Categorias', 1);
        $pdf->Cell(60, 10, 'Nombre', 1);
        $pdf->Ln();

        foreach ($listaCategoria as $inscripcion) {
            $pdf->Cell(40, 10, $inscripcion['id_categoria'], 1);
            $pdf->Cell(60, 10, $inscripcion['categoria'], 1);
            //$pdf->Cell(40, 10, $inscripcion['fecha_inscripcion'], 1);
            $pdf->Ln();
        }

        ob_end_clean(); //sirve para limpiar el buffer y que no salga el error de que el archivo ya fue enviado

        //ob_start(); //sirve para limpiar el buffer y que no salga el error de que el archivo ya fue enviado
        $pdf->Output(); //salida del pdf, puede ser 'I' o 'D' o 'F' o 'S', I es para ver en el navegador, D es para descargar el archivo, F es para guardar en un archivo local, S es para retornar el documento como un string
        //ob_end_flush();//sirve para limpiar el buffer y que no salga el error de que el archivo ya fue enviado
    }
}
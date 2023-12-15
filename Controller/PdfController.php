<?php

namespace Controller;

require 'vendor/autoload.php';

use Dompdf\Dompdf;

class PdfController
{
    public function generate()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hola mundo</h1>
        <br>
        <a href="https://parzibyte.me/blog">By Parzibyte</a>');
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        echo $dompdf->output();
        ob_end_clean(); //Limpiar las etiquetas del header
        //$pdf->Output();
    }
}

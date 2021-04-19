<?php

    use Dompdf\Dompdf;

    require_once  ("./dompdf/autoload.inc.php") ;

    $dompdf = new Dompdf();

    ob_start();
    require __DIR__ ."/etiquetapdf.php";

    $dompdf ->load_Html(ob_get_clean());
    
    $dompdf->render();

    $dompdf->stream("Tabela_Nutricional.pdf",["Attachment" => false]);
?>
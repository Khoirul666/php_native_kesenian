<?php
include('../dbconnect.php');

$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdata where userid='$u'");

require_once("../plugin/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isHtml5ParserEnabled',true);
$options->set('isPhpEnabled',true);
$dompdf = new Dompdf($options);


ob_start();
require('print_pendaftar.php');
$html = ob_get_contents();
ob_get_clean();

// echo $html;

$dompdf->loadHtml($html);

$dompdf->set_option('isRemoteEnabled',true);

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper(array(0,0,300,900), 'landscape');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
$dompdf->stream('document.php', array('Attachment' => 0));
?>
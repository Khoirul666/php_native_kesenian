<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdata where userid='$u'");

require_once("../plugin/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

// $url = 'data_print.php';
// $url_params = $url.'?'.http_build_query(array('u'=>$u));
// $html = file_get_contents($url_params);
// $html = file_get_contents($url.'?'.http_build_query(array('u'=>$u)));

echo file_get_contents('data_print.php?'.http_build_query(array('u'=>$u)));

// $dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper(array(0,0,300,900), 'landscape');

// // Render the HTML as PDF
// $dompdf->render();

// // Output the generated PDF to Browser
// $dompdf->stream();
?>
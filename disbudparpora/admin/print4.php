<?php
include('../dbconnect.php');

$u = $_GET['u'];
$tgl = DATE('YmdHis');
$cekdulu = mysqli_query($conn,"select * from userdata where userid='$u'");

$data = mysqli_fetch_array($cekdulu);

// var_dump($data);

require_once("../plugin/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
require('print_pendaftar.php');
$html = ob_get_contents();
ob_get_clean();

// echo $html;

// $dompdf->loadHtml($html);
$dompdf->loadHtml('<img src="http://192.168.1.14:8080/PHP/NATIVE/New%20folder%20(2)/php_native_kesenian/php_native_kesenian/disbudparpora/assets/images/template_top.jpg">');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// $dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($tgl.rand().'-cetak.pdf',array('Attachment'=>0));

?>
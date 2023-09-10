<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/styles-cetak.css"> -->
	<style type="text/css">
		body{
			font-family: sans-serif;
		}


		.page:first-child{
			page-break-after: always;
			background-image: url('http://localhost:8080/PHP_NATIVE/20230822_Hikmafico/disbudparpora/assets/images/template_top.jpg');
/*			background-size: cover;*/
/*			height: 8cm;*/
/*			width: 2480px;*/
}

.page:last-child{

}

@page{
	size: 30cm 10cm;
	margin: 0;
	orientation: landscape;
}
</style>
</head>
<body>
	<div class="page">
		<?php
		$path = '../assets/images/template_top.jpg';
		$type = pathinfo($path,PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/'.$type.';base64,'.base64_encode($data);
		echo "aa".$path."aa";
		$a = "aaasssssssssssssssssa";
		?>

		<?= $a ?>
		<!-- <img src="http://localhost:8080/PHP_NATIVE/20230822_Hikmafico/disbudparpora/assets/images/template_top.jpg" height="100%"> -->
		asmalmsa
	</div>


	<div class="page">
		asas
	</div>
</body>
</html>
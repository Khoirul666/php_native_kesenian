<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdata where userid='$u'");

require_once("../dompdf/autoload.inc.php");

// var_dump($cekdulu);
$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
$hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	while ($ambil = mysqli_fetch_array($cekdulu)) {
		?>
		<table style="width:100%" border="1">
			<tr>
				<td style="text-align: center;width: 50% !important;" colspan="3">KARTU NOMOR INDUK KESENIAN</td>
				<td style="text-align: center;width: 50% !important;" colspan="3"></td>
			</tr>
			<tr>
				<td>Nomor Induk</td>
				<td>:</td>
				<td><?= $ambil['noinduk'] ?></td>
				<td>Nama Org. Kesenian</td>
				<td>:</td>
				<td><?= $ambil['namakesenian'] ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $ambil['nama'] ?></td>
				<td>Tanggal Berdiri</td>
				<td>:</td>
				<td><?= DATE('d',strtotime($ambil['tglberdiri'])) ?> <?= $bulan[DATE('m',strtotime($ambil['tglberdiri']))-1] ?> <?= DATE('Y',strtotime($ambil['tglberdiri'])) ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?= $ambil['jeniskelamin']=='L'?'Laki-Laki':'Perempuan' ?></td>
				<td>Jenis Org. Kesenian</td>
				<td>:</td>
				<td><?= $ambil['jeniskesenian'] ?></td>
			</tr>
			<tr>
				<td>Tempat, Tgl Lahir</td>
				<td>:</td>
				<td><?= $ambil['tempatlahir'] ?>, <?= $ambil['tgllahir'] ?></td>
				<td>Anggota</td>
				<td>:</td>
				<td><?= $ambil['jmlanggota'] ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?= $ambil['alamat'] ?></td>
				<td>Tanggal Berdiri</td>
				<td>:</td>
				<td></td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td>:</td>
				<td><?= $ambil['kelurahan'] ?></td>
				<td>Tanggal Berdiri</td>
				<td>:</td>
				<td></td>
			</tr>
			<tr>
				<td>Kecamatan</td>
				<td>:</td>
				<td><?= $ambil['kecamatan'] ?></td>
				<td>Tanggal Berdiri</td>
				<td>:</td>
				<td></td>
			</tr>
			<tr>
				<td>No Tlp/Hp</td>
				<td>:</td>
				<td><?= $ambil['nohp'] ?></td>
				<td>Tanggal Berdiri</td>
				<td>:</td>
				<td></td>
			</tr>
			<tr>
				<td>Sebagai</td>
				<td>:</td>
				<td><?= $ambil['jabatan'] ?></td>
				<td>Tanggal Berdiri</td>
				<td>:</td>
				<td></td>
			</tr>
		</table>
		<?php
	}
	?>
</body>
</html>
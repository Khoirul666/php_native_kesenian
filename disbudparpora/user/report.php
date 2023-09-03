<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdata where nisn='$u'");
    $ambil = mysqli_fetch_array($cekdulu);
    //get alamat
    $ambilprov = $ambil['provinsi'];
    $prov1 = mysqli_query($conn,"select name from provinces where id='$ambilprov'");
    $prov = mysqli_fetch_array($prov1)['name'];
    $ambilkota = $ambil['kabupaten'];
    $kab1 = mysqli_query($conn,"select name from regencies where id='$ambilkota'");
    $kab = mysqli_fetch_array($kab1)['name'];
    $ambilkec = $ambil['kecamatan'];
    $kec1 = mysqli_query($conn,"select name from districts where id='$ambilkec'");
    $kec = mysqli_fetch_array($kec1)['name'];
    $ambilkel = $ambil['kelurahan'];
    $kel1 = mysqli_query($conn,"select name from villages where id='$ambilkel'");
    $kel = mysqli_fetch_array($kel1)['name'];

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"select * from userdata where nisn='$u'");
$html = '
<center><h3>Pendaftaran Online Nomor Induk Kesenian</h3></center><hr/><br/>';
$html .= '<div class="row mt-5 mb-5">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-center">
                <h2>Data Ketua Kesenian</h2>
                <img src="../user/'. $ambil['ktpketua'].'" width="20%">
            </div>
            <div class="market-status-table mt-4">
                <div class="table-responsive" style="overflow-x:hidden;">
                    
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text" class="form-control" value="'.$u.'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" value="'. $ambil['jeniskelamin'].'">
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input name="tempatlahir" type="text" class="form-control" value="'. $ambil['tempatlahir'].'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input name="tgllahir" type="date" class="form-control" value="'. $ambil['tgllahir'].'">
                        </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control" value="'. $ambil['alamat'].'">
                        </div>
                        </div>

                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Kelurahan</label>
                        <input type="text" class="form-control" value="'. $ambil['kelurahan'].'">
                        </select>
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Kecamatan</label>
                        <input type="text" class="form-control" value="'. $ambil['kecamatan'].'">
                        </select>
                        </div>
                        </div>
                    </div>
                        <div class="form-group">
                        <label>No Hp</label>
                        <input name="nohp" type="text" class="form-control" maxlength="15" value="'.  $ambil['nohp'].'">
                        </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label>Jabatan</label>
                            <input name="jabatan" type="text" class="form-control" value="'. $ambil['jabatan'].'">
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                    <label>Nama Kesenian</label>
                    <input name="namakesenian" type="text" class="form-control" value="'. $ambil['namakesenian'].'">
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <div class="form-group">
                    <label>Tanggal Berdiri</label>
                    <input name="tglberdiri" type="date" class="form-control" value="'. $ambil['tglberdiri'].'">
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                    <label>Jenis Kesenian</label>
                    <input type="text" class="form-control" value="'. $ambil['jeniskesenian'].'">
                    </select>
                    </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                        <label>Jumlah Anggota</label>
                        <input name="jmlanggota" type="text" class="form-control" maxlength="15" value="'.  $ambil['jmlanggota'].'">
                        </div>
                        </div>
                    </div>
                        
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row mt-5 mb-5">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-center">
                <h2>Upload Data Berkas</h2>
            </div>
            <div class="market-status-table mt-4">
                <div class="table-responsive" style="overflow-x:hidden;">
                    
                <div class="row">
                <div class="col">
                    <div class="form-group">
                            <label for="ktpketua" class=" form-control-label">KTP Ketua</label>
                            <img src="../user/'. $ambil['ktpketua'].'" width="50%">
                        </div>
                    </div>
                <div class="col">
                    <div class="form-group">
                            <label for="ktpanggota" class=" form-control-label">KTP Anggota</label>
                            <img src="../user/'. $ambil['ktpanggota'].'" width="50%">
                    </div>
                </div>
            </div>

                   

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="alatmusik" class=" form-control-label">Foto Alat Musik</label>
                                    <img src="../user/'. $ambil['alatmusik'].'" width="50%">
                                </div>
                            </div>
                        <div class="col">
                            <div class="form-group">
                                    <label for="suratizin" class=" form-control-label">Surat Izin Mendirikan Kesenian</label>
                                    <img src="../user/'. $ambil['suratizin'].'" width="50%">
                            </div>
                        </div>
                    </div>

                
                </div>
            </div>
        </div>
    </div>
</div>
</div>';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream($u.'.pdf');
?>

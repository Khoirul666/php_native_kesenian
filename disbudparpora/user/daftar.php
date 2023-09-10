<!doctype html>
<html class="no-js" lang="en">

<?php 
include '../dbconnect.php';
include '../cek.php';
if($role!=='User'){
    header("location:../login.php");
};
$userid = $_SESSION['userid'];

include 'submit.php';

    //cek dulu sudah pernah submit belum
$cekdulu = mysqli_query($conn,"select * from userdata where userid='$userid'");

$lihathasil = mysqli_num_rows($cekdulu);

    //kalau udah pernah submit
if($lihathasil>0){
    header("location:mydata.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Disbudparpora Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../assets/select2-4.0.6-rc.1/dist/css/select2.min.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-144808195-1');
    </script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <a href="index.php"><img src="../logo.png" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="daftar.php"><i class="ti-layout"></i><span>Pendaftaran</span></a>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <b>
                                            <script type='text/javascript'>
                                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                var date = new Date();
                                                var day = date.getDate();
                                                var month = date.getMonth();
                                                var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                                var yy = date.getYear();
                                                var year = (yy < 1000) ? yy + 1900 : yy;
                                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);        
                                            </script>
                                        </b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->

            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- panduan -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2>Pendaftaran</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                        Selamat datang di Sistem Informasi Pendaftaran Nomor Induk Kesenian Online.
                                        <br><br>
                                        Panduan Pendaftaran:
                                        <br>1. Isi seluruh data dan berkas yang yang ditampilkan kemudian periksa kembali, pastikan data tidak ada yang salah
                                        <br>2. Klik simpan, kemudian confirm. Setelah data diconfirm, data tidak dapat diubah kembali
                                        <br>3. Jika sudah, bukti pendaftaran akan tampil dan dapat diunduh menjadi pdf
                                        <br>
                                        <br>*Note: Pihak admin baru akan menerima data dan mencetak setelah Anda klik 'Confirm'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!------------------ Pisahin ------------------->


                <form method="post" enctype="multipart/form-data">
                    <!-- formulir -->
                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <h2>Data Ketua Kesenian</h2>
                                        <p>* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>
                                    </div>
                                    <div class="market-status-table mt-4">
                                        <div class="table-responsive" style="overflow-x:hidden;">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jeniskelamin" required>
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input name="tempatlahir" type="text" class="form-control" placeholder="Tempat Lahir" maxlength="50" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input name="tgllahir" type="date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <select class="form-control" name="kelurahan">
                                                            <option value="Sukorejo">Sukorejo</option>
                                                            <option value="Mojoroto">Mojoroto</option>
                                                            <option value="Ngadiluwih">Ngadiluwih</option>
                                                            <option value="Banjaran">Banjaran</option>
                                                            <option value="Taman">Taman</option>
                                                            <option value="Pesantren">Pesantren</option>
                                                            <option value="Papar">Papar</option>
                                                            <option value="Burengan">Burengan</option>
                                                            <option value="Tegalsari">Tegalsari</option>
                                                            <option value="Pare">Pare</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <select class="form-control" name="kecamatan">
                                                            <option value="Mojoroto">Mojoroto - Kota Kediri</option>
                                                            <option value="Pesantren">Pesantren - Kota Kediri</option>
                                                            <option value="Kota">Kota - Kota Kediri</option>
                                                            <option value="Kepanjenkidul">Kepanjenkidul - Kota Kediri</option>
                                                            <option value="Badas">Badas - Kota Kediri</option>
                                                            <option value="Ngasem">Ngasem - Kota Kediri</option>
                                                            <option value="Gampengrejo">Gampengrejo - Kota Kediri</option>
                                                            <option value="Gurah">Gurah - Kota Kediri</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>No Hp</label>
                                                        <input name="nohp" type="text" class="form-control" maxlength="15" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input name="jabatan" type="text" class="form-control" placeholder="Jabatan" maxlength="12" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nama Kesenian</label>
                                                        <input name="namakesenian" type="text" class="form-control" placeholder="Nama Kesenian" maxlength="50" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal Berdiri</label>
                                                        <input name="tglberdiri" type="date" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jenis Kesenian</label>
                                                        <select class="form-control" name="jeniskesenian">
                                                            <option value="jaranan">Jaranan</option>
                                                            <option value="electone">Electone</option>
                                                            <option value="campursari">Campursari</option>
                                                            <option value="dance">Dance</option>
                                                            <option value="sanggar_lukis">Sanggar Lukis</option>
                                                            <option value="sanggar_tari">Sanggar Tari</option>
                                                            <option value="wayang">Wayang</option>
                                                            <option value="kethek_ogleng">Kethek Ogleng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jumlah Anggota</label>
                                                        <input name="jmlanggota" type="text" class="form-control" placeholder="Jumlah Anggota" maxlength="50" required>
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
                                        <p>Data yang telah diinput tidak dapat diubah kembali</p>
                                    </div>
                                    <div class="market-status-table mt-4">
                                        <div class="table-responsive" style="overflow-x:hidden;">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="ktpketua" class=" form-control-label">KTP Ketua (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="ktpketua" name="ktpketua" class="form-control-file" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="ktpanggota" class=" form-control-label">KTP Anggota (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="ktpanggota" name="ktpanggota" class="form-control-file" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="alatmusik" class=" form-control-label">Foto Alat Musik (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="alatmusik" name="alatmusik" class="form-control-file" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="suratizin" class=" form-control-label">Surat Izin Mendirikan Kesenian (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="suratizin" name="suratizin" class="form-control-file" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="pas_foto" class=" form-control-label">Pas Foto 3 x 4 (JPG/PNG), maks 500kb</label>
                                                        <input type="file" id="pas_foto" name="pas_foto" class="form-control-file" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>Pendaftaran Online Nomor Induk Kesenian pada Disbudparpora Kota Kediri</p>
        </div>
    </footer>
    <!-- footer area end-->
</div>
<!-- page container area end -->

<!-- jquery latest version -->
<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/jquery.slimscroll.min.js"></script>
<script src="../assets/js/jquery.slicknav.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="../assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="../assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
<script src="../assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
<script src="../assets/js/app.js"></script>
</body>

</html>
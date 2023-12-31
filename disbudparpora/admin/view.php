<!doctype html>
<html class="no-js" lang="en">

<?php 
include '../dbconnect.php';
include '../cek.php';
if($role!=='Admin'){
    header("location:../login.php");
};
$userid = $_GET['u'];

    //cek dulu sudah pernah submit belum
$cekdulu = mysqli_query($conn,"select * from userdata where userid='$userid'");
$ambil = mysqli_fetch_array($cekdulu);

if (isset($_POST['hapus'])) {
    $hapus = mysqli_query($conn,"DELETE FROM userdata WHERE userid='".$userid."'");
    if ($hapus){
        //berhasil hapus
        echo " <div class='alert alert-success'>
        Berhasil hapus data.
        </div>
        <meta http-equiv='refresh' content='1; url= form.php'/>  ";  
    } else {
        echo "<div class='alert alert-warning'>
        Gagal hapus data. Silakan coba lagi nanti.
        </div>
        <meta http-equiv='refresh' content='3; url= form.php'/> ";
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Disbudparpora Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    
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
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
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
                                <a href="form.php"><i class="ti-layout"></i><span>Data Pendaftar</span></a>
                            </li>
                            <li>
                                <a href="user.php"><i class="ti-layout"></i><span>User Terdaftar</span></a>
                            </li>
                            <li>
                                <a href="admin.php"><i class="ti-layout"></i><span>Kelola Admin</span></a>
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
                        <a href="form.php" class="btn btn-info" style="margin-bottom:2%;">Kembali</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2><?php echo $ambil['nama']?></h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                        <img src="../user/<?php echo $ambil['foto']?>" width="200px">
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
                                        <h2>Data Pribadi</h2>
                                    </div>
                                    <div class="market-status-table mt-4">
                                        <div class="table-responsive" style="overflow-x:hidden;">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input name="nama" type="text" class="form-control" maxlength="12" value="<?php echo $ambil['nama']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jeniskelamin">
                                                            <option selected value="<?php echo $ambil['jeniskelamin']?>">Terpilih: <?php echo $ambil['jeniskelamin']?></option>
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
                                                        <input name="tempatlahir" type="text" class="form-control" maxlength="20" value="<?php echo $ambil['tempatlahir']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input name="tgllahir" type="date" class="form-control" value="<?php echo $ambil['tgllahir']?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="<?php echo $ambil['alamat']?>"required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <select class="form-control" name="kelurahan">
                                                            <option selected value="<?php echo $ambil['kelurahan']?>">Terpilih: <?php echo $ambil['kelurahan']?></option>
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
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <select class="form-control" name="kecamatan">
                                                        <option selected value="<?php echo $ambil['kecamatan']?>">Terpilih: <?php echo $ambil['kecamatan']?></option>
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
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>No Hp</label>
                                                        <input name="nohp" type="text" class="form-control" maxlength="15" value="<?php echo $ambil['nohp']?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input name="jabatan" type="text" class="form-control" placeholder="Jabatan" value="<?php echo $ambil['jabatan']?>"required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nama Kesenian</label>
                                                        <input name="namakesenian" type="text" class="form-control" maxlength="12" value="<?php echo $ambil['namakesenian']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal Berdiri</label>
                                                        <input name="tglberdiri" type="date" class="form-control" value="<?php echo $ambil['tglberdiri']?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jenis Kesenian</label>
                                                        <select class="form-control" name="jeniskesenian">
                                                            <option selected value="<?php echo $ambil['jeniskesenian']?>">Terpilih: <?php echo $ambil['jeniskesenian']?></option>
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
                                                        <input name="jmlanggota" type="text" class="form-control" maxlength="12" value="<?php echo $ambil['jmlanggota']?>" disabled>
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
                                                    <img src="../user/<?php echo $ambil['ktpketua']?>" width="50%">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="ktpanggota" class=" form-control-label">KTP Anggota</label>
                                                    <img src="../user/<?php echo $ambil['ktpanggota']?>" width="50%">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="alatmusik" class=" form-control-label">Foto Alat Musik</label>
                                                    <img src="../user/<?php echo $ambil['alatmusik']?>" width="50%">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="suratizin" class=" form-control-label">Surat Izin Mendirikan Kesenian</label>
                                                    <img src="../user/<?php echo $ambil['suratizin']?>" width="50%">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="pas_foto" class=" form-control-label">Foto Ketua</label>
                                                    <br>
                                                    <img src="../user/<?php echo $ambil['foto']?>" width="200px">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">HAPUS</button>
                                        </div>

                                        <div class="modal fade" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post">

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Apakah Anda yakin untuk menghapus data ini? Setelah dihapus maka pendaftar akan diminta mengisikan ulang data.
                                                            <input type="hidden" value="<?=$userid;?>" name="id">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                            <input type="submit" class="btn btn-success" name="hapus" value="hapus">
                                                        </div>
                                                    </form>
                                                </div>
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
</body>

</html>

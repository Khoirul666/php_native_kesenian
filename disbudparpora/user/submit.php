<?php

if(isset($_POST['submit'])){

  $nama = $_POST['nama'];
  $jeniskelamin = $_POST['jeniskelamin'];
  $tempatlahir = $_POST['tempatlahir'];
  $tgllahir = $_POST['tgllahir'];
  $alamat = $_POST['alamat'];
  $userid = $_SESSION['userid'];

  $kelurahan = $_POST['kelurahan'];
  $kecamatan = $_POST['kecamatan'];
  $nohp = $_POST['nohp'];
  $jabatan = $_POST['jabatan'];
  $namakesenian = $_POST['namakesenian'];

  $tglberdiri = $_POST['tglberdiri'];
  $jeniskesenian = $_POST['jeniskesenian'];
  $jmlanggota = $_POST['jmlanggota'];

  $ktpketua = $_POST['ktpketua'];
  $ktpanggota = $_POST['ktpanggota'];
  $alatmusik = $_POST['alatmusik'];
  $suratizin = $_POST['suratizin'];

        // $ktpketua = 'ktpketua' . $userid;
        // $ktpanggota = 'ktpanggota' . $userid;
        // $alatmusik = 'alatmusik' . $userid;
        // $suratizin = 'suratizin' . $userid;

        //perihal gambar
  $nama_file_ktpketua = $_FILES['ktpketua']['name'];
  $nama_file_ktpanggota = $_FILES['ktpanggota']['name'];
  $nama_file_alatmusik = $_FILES['alatmusik']['name'];
  $nama_file_suratizin = $_FILES['suratizin']['name'];

  $ext1 = pathinfo($nama_file_ktpketua, PATHINFO_EXTENSION);
  $ext2 = pathinfo($nama_file_ktpanggota, PATHINFO_EXTENSION);
  $ext3 = pathinfo($nama_file_alatmusik, PATHINFO_EXTENSION);
  $ext4 = pathinfo($nama_file_suratizin, PATHINFO_EXTENSION);

  $ukuran_file_ktpketua = $_FILES['ktpketua']['size'];
  $ukuran_file_ktpanggota = $_FILES['ktpanggota']['size'];
  $ukuran_file_alatmusik = $_FILES['alatmusik']['size'];
  $ukuran_file_suratizin = $_FILES['suratizin']['size'];

  $ukurantotal = $ukuran_file_ktpketua + $ukuran_file_ktpanggota + $ukuran_file_alatmusik + $ukuran_file_suratizin;
  $tipe_file = $_FILES['ktpketua']['type'];
  $tmp_file = $_FILES['ktpketua']['tmp_name'];
  $tmp_file2 = $_FILES['ktpanggota']['tmp_name'];
  $tmp_file3 = $_FILES['alatmusik']['tmp_name'];
  $tmp_file4 = $_FILES['suratizin']['tmp_name'];

  $path_ktpketua = "images/ktpketua/".$ktpketua.'.'.$ext1;
  $path_ktpanggota = "images/ktpanggota/".$ktpanggota.'.'.$ext2;
  $path_alatmusik = "images/alatmusik/".$alatmusik.'.'.$ext3;
  $path_suratizin = "images/suratizin/".$suratizin.'.'.$ext4;


        // Lakukan pemeriksaan jenis berkas dan ukuran berkas di sini
  if ($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
    if ($ukurantotal <= 1600000){ 
          // Lakukan pengunggahan berkas ke direktori tujuan
      $upload = move_uploaded_file($tmp_file, $path_ktpketua);
      $upload2 = move_uploaded_file($tmp_file2, $path_ktpanggota);
      $upload3 = move_uploaded_file($tmp_file3, $path_alatmusik);
      $upload4 = move_uploaded_file($tmp_file4, $path_suratizin);
      
      if($upload && $upload2 && $upload3 && $upload4){ 

        $tglberlaku =DATE('Y-m-d');
        $submitdata = mysqli_query($conn,"insert into userdata (userid, noinduk, nama, jeniskelamin, tempatlahir, tgllahir, alamat, kelurahan, kecamatan, nohp, jabatan, namakesenian, tglberdiri, jeniskesenian, jmlanggota, ktpketua, ktpanggota, alatmusik, suratizin, tglberlaku) 
          values('$userid','$noinduk','$nama','$jeniskelamin','$tempatlahir','$tgllahir','$alamat','$kelurahan','$kecamatan','$nohp','$jabatan','$namakesenian','$tglberdiri','$jeniskesenian','$jmlanggota','$path_ktpketua','$path_ktpanggota','$path_alatmusik','$path_suratizin','$tglberlaku')");
        
        if($submitdata){ 

                //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
          </div>
          <meta http-equiv='refresh' content='2; url= daftar.php'/>  ";  

        }else{

          echo "<div class='alert alert-warning'>
          Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= daftar.php'/> ";
        }
      }else{
              // Jika gambar gagal diupload, Lakukan :
        echo "Sorry, there's a problem while uploading the file.";
        echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
      }
    }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
      echo "Sorry, the file size is not allowed to more than 1,5mb";
      echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
    }
  }else{
          // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
    echo "Sorry, the image format should be JPG/PNG.";
    echo "<br><meta http-equiv='refresh' content='5; URL=daftar.php'> You will be redirected to the form in 5 seconds";
  }

};




    //kalau update
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $kelamin = $_POST['jeniskelamin'];
  $tempatlahir = $_POST['tempatlahir'];
  $tgllahir = $_POST['tgllahir'];
  $alamat = $_POST['alamat'];

  $kelurahan = $_POST['kelurahan'];
  $kecamatan = $_POST['kecamatan'];
  $nohp = $_POST['nohp'];
  $jabatan = $_POST['jabatan'];
  $namakesenian = $_POST['namakesenian'];
  
  $tglberdiri = $_POST['tglberdiri'];
  $jeniskesenian = $_POST['jeniskesenian'];
  $jmlanggota = $_POST['jmlanggota'];

  $ktpketua = 'ktpketua' . $userid;
  $ktpanggota = 'ktpanggota' . $userid;
  $alatmusik = 'alatmusik' . $userid;
  $suratizin = 'suratizin' . $userid;

  $update = mysqli_query($conn,"update userdata
    set nama='$nama', jeniskelamin='$jeniskelamin', tempatlahir='$tempatlahir', tgllahir='$tgllahir', alamat='$alamat',
    kelurahan='$kelurahan', kecamatan='$kecamatan', nohp='$nohp', jabatan='$jabatan', namakesenian='$namakesenian',
    tglberdiri='$tglberdiri', jeniskesenian='$jeniskesenian', jmlanggota='$jmlanggota', ktpketua='$path_ktpketua', ktpanggota='$path_ktpanggota', alatmusik='$path_alatmusik', suratizin='$path_suratizin' where userid='$id'");

  if($update){ 

      //berhasil bikin
    echo " <div class='alert alert-success'>
    Berhasil submit data.
    </div>
    <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  

  }else{

    echo "<div class='alert alert-warning'>
    Gagal submit data. Silakan coba lagi nanti.
    </div>
    <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
  }

};




//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
if(isset($_POST['ok'])){
  $id = $_POST['id'];
  $updateaja = mysqli_query($conn,"update userdata set status='Verified', tglkonfirmasi='$today' where userid='$id'");

  if($updateaja){
        //berhasil bikin
    echo " <div class='alert alert-success'>
    Berhasil submit data.
    </div>
    <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  
  } else {
    echo "<div class='alert alert-warning'>
    Gagal submit data. Silakan coba lagi nanti.
    </div>
    <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
  }
};

?>
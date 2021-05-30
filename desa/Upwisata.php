
<?php
  session_start();
  include '../plt/config.php';
  if(!isset($_SESSION['nama_wisata'])){
    $_SESSION['nama_wisata']="";
  }
  if(!isset($_SESSION['telp'])){
    $_SESSION['telp']="";
  }
  if(!isset($_SESSION['video'])){
    $_SESSION['video']="";
  }
  if(!isset($_SESSION['maps'])){
    $_SESSION['maps']="";
  }
  if(!isset($_SESSION['alamat_wisata'])){
    $_SESSION['alamat_wisata']="";
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!--My CSS-->
    <style>
      section{
        min-height: 420px; 
      }
      .alert{
    background: #e44e4e;
    color: white;
    padding: 10px;
    text-align: center;
    border:1px solid #b32929;
  }
  .conf{
    background: #00C957 ;
    color: white;
    padding: 10px;
    text-align: center;
    border:1px solid #00C957  ;
  }
  .add{
    color: grey;
    padding: 10px;
    text-align: left;
    font-size: 10pt;
  }
  .warn{
    color: red;
    padding: 10px;
    text-align: left;
    font-size: 10pt;
    max-height: 5pt;
  }
  .form-check-label{
    font-size: 10pt;
  }
    </style>
    <title>Tambah Potensi Wisata</title>
  </head>
  <body class="mt-5">
    <!--Navbar-->
    <script type="text/javascript">
      function batastamu(){
        alert("Maaf, anda belum terdaftar");
      }
    </script>
    <script type="text/javascript">
      function hilang(idbox,idtext){
        var checkBox = document.getElementById(idbox);
        var text = document.getElementById(idtext);
        if (checkBox.checked == true){
          text.style.display = "none";
        } else {
           text.style.display = "block";
        }
      }
    </script>
    <script type="text/javascript">
  function validasi_form_input(){
    var konfirmasi = confirm("Apakah anda yakin dengan data diri anda?");
    if(konfirmasi === true) {
      var nama = document.getElementById("nama").value;
      var telp = document.getElementById("telp").value;
      var video = document.getElementById("video").value;
      var maps = document.getElementById("maps").value;
      var jenis = document.getElementById("jenis").value;
      var alamat = document.getElementById("alamat").value;
      var gambar = document.getElementById("gambar").value;
      var text = "";
      if (nama==""&&telp==""&&video==""&&jenis==""&&maps==""&&alamat==""&&gambar==""){
        alert('Anda belum mengisi apapun');
      }
      else{
        }if (nama == ""){
          text += "- Nama Potensi \n";
        }
        if (video == ""){
          text += "- Video Youtube \n";
        }
        if (maps == ""){
          text += "- Kootdinat Google-maps \n";
        }
        if (jenis == ""){
          text += "- Jenis \n";
        }
        if (telp == ""){
          text += "- Kontak\n";
        }
        if (alamat == ""){
          text += "- Alamat \n";
        }
        if (gambar == ""){
          text += "- Gambar \n";
        }
        if (nama==""&&telp==""&&video==""&&jenis==""&&maps==""&&alamat==""&&gambar==""){
          alert('Anda belum mengisi : \n'+ text);
        }
      }
    }
  }
</script>
<!--Sign up-->
                <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                        <?php 
                          if(isset($_GET['pesan'])){
                            if($_GET['pesan']=="gagal"){
                              echo "<div  class='alert'>Maaf, NIK atau username yang anda masukkan sudah terdaftar.<br> Mohon untuk menggunakan username lain!</div>";
                            }
                            else{
                              echo "<h4 class='display-4'>Tambah Potensi Wisata</h4>";
                            }
                          }else{
                              echo "<h4 class='display-4'>Tambah Potensi Wisata</h4>";
                          }
                        ?>
                          <div class="container">
                                  <form action="inputwisata.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" class="form-control" id = "nama" name="nama" value="<?php echo $_SESSION['nama_wisata'];?>" placeholder="Nama Potensi">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="jenis">Jenis</label>
                                          <select class="form-control" name="jenis" id="jenis" autofocus>
                                            <option value="wisata">Wisata</option>
                                            <option value="penyebrangan">Penyebrangan</option>
                                            <option value="penginapan">Penginapan</option>
                                            <option value="potensi">Potensi</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="telp">Kontak</label>
                                          <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $_SESSION['telp'];?>" placeholder="Kontak Terkait">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="video">Video Youtube</label>
                                          <input type="text" id="video" name="video" class="form-control" value="<?php echo $_SESSION['video'];?>"placeholder="Masukkan hanya bagian berwarna merah">
                                          <label class="add" for="pass">
                                            https://www.youtube.com/watch?v=<span style="color: red;">p4CLiPxuwTs</span> (beri tanda strip " - " jika video tidak tersedia)
                                          </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="maps">Koordinat Google-Maps</label>
                                          <input type="text" id="maps" name="maps" value="<?php echo $_SESSION['maps'];?>"class="form-control"placeholder="Masukkan hanya bagian berwarna merah">
                                          <label class="add" for="pass">
                                          https://maps.google.com/?q=<span style="color: red;">-8.770269, 116.525207</span>&output=svembed
                                          </label>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id = "alamat" name="alamat" value="<?php echo $_SESSION['alamat_wisata'];?>" placeholder="Alamat Potensi">
                                      </div>
                                      <label for="isi">Deskripsi</label>
                                      <div class="form-group">
                                        <textarea id="isi" name="isi" class="form-control">
                                        </textarea>
                                      </div>
                                      <!--Upload gambar-->
                                    
                                      <div class="form-group">
                                        <label for="upload">Gambar Terbaik</label>
                                        <input type="file" class="form-control-file" name="gambar" id="gambar">
                                      </div>
                                      <button type="submit" class="btn btn-primary" onclick="validasi_form_input()">Tambah</button>
                                    </form>
                                  </div>
                        </div>
                      </div>
<center><footer style="font-size: 10pt; color: grey;">
    <p>copyright. kknketapangraya2021</p>
    </footer></center>
              <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
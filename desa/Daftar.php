<?php
  session_start();
  include '../plt/config.php';
  if(!isset($_SESSION['nama'])){
    $_SESSION['nama']="";
  }
  if(!isset($_SESSION['nik'])){
    $_SESSION['nik']="";
  }
  if(!isset($_SESSION['username'])){
    $_SESSION['username']="";
  }
  if(!isset($_SESSION['phone'])){
    $_SESSION['phone']="";
  }if(!isset($_SESSION['ttl'])){
    $_SESSION['ttl']="";
  }if(!isset($_SESSION['job'])){
    $_SESSION['job']="";
  }
  if(!isset($_SESSION['prov'])){
    $_SESSION['prov']="";
  }
  if(!isset($_SESSION['kota'])){
    $_SESSION['kota']="";
  }
  if(!isset($_SESSION['alamat'])){
    $_SESSION['alamat']="";
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
    <title>Daftar</title>
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
      var nik = document.getElementById("nik").value;
      var nama = document.getElementById("nama").value;
      var email = document.getElementById("email").value;
      var prov = document.getElementById("prov").value;
      var ttl = document.getElementById("ttl").value;
      var job = document.getElementById("job").value;
      var kota = document.getElementById("kota").value;
      var alamat = document.getElementById("alamat").value;
      var phone = document.getElementById("nmr").value;
      var gambar = document.getElementById("gambar").value;
      var WhatsApp = document.getElementById("WhatsApp");
      var password = document.getElementById("pass").value;
      var password2 = document.getElementById("pass2").value;
      var text = "";
      if (nik==""nama==""&&email==""&&ttl==""&&job==""&&phone==""&&gambar==""&&prov==""&&kota==""&&alamat==""&&password==""&&password2==""){
        alert('Anda belum mengisi apapun');
      }
      else{
        if (nik == ""){
          text += "- Nomor Induk Kependudukan\n";
        } else {
          if ((phone.length < 16)||(phone.length>16)){
            alert('Pastikan bahwa Nomor Induk Kependudukan anda sudah benar!');
          }
        }if (nama == ""){
          text += "- Nama lengkap \n";
        }
        if (email == ""){
          text += "- Username \n";
        }
        if (ttl == ""){
          text += "- Tanggal Lahir \n";
        }
        if (job == ""){
          text += "- Pekerjaan \n";
        }
        if (phone == ""){
          text += "- Telepon Seluler\n";
        } else {
          if ((phone.length < 10)||(phone.length>15)){
            alert('Pastikan bahwa nomor telepon seluler anda sudah benar!');
          }
        }
        if (prov == ""){
          text += "- Desa \n";
        }
        if (kota == ""){
          text += "- Dusun \n";
        }
        if (alamat == ""){
          text += "- Alamat \n";
        }
        if (password == ""){
          text += "- Kata Sandi \n";
        }if (gambar == ""){
          text += "- Gambar \n";
        }
        if (nik==""||nama==""||email==""||phone==""||ttl==""||job==""||prov==""||kota==""||alamat==""||password==""){
          alert('Anda belum mengisi : \n'+ text);
        }
        if (password2 == ""){
          alert('Anda belum mengonfirmasi kata sandi anda');
        } else {
          if (password != password2){
            alert('Konfirmasi kata sandi anda salah');
          }
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
                              echo "<h4 class='display-4'>Buat akun anda</h4>";
                            }
                          }else{
                              echo "<h4 class='display-4'>Buat akun anda</h4>";
                          }
                        ?>
                          <div class="container">
                                  <form action="input.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="email">Nomor Induk Kependudukan</label>
                                          <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $_SESSION['nik'];?>" placeholder="NIK Anda">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="nama">Nama Lengkap</label>
                                          <input type="text" class="form-control" id="nama" name="fullname" value="<?php echo $_SESSION['nama'];?>" placeholder="Nama Lengkap Anda">
                                        </div>
                                      </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="email">Username</label>
                                          <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['username'];?>" placeholder="Username Anda">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="nmr">Telepon Seluler</label>
                                          <input class="form-control" id = "nmr" type="text" name="nmr" value="<?php echo $_SESSION['phone'];?>" placeholder="Nomor Telepon Seluler Anda">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="prov">Tanggal Lahir</label>
                                          <input type="date" id="ttl" name="ttl" class="form-control" value="<?php echo $_SESSION['ttl'];?>"placeholder="Tanggal Lahir Anda">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="kota">Pekerjaan</label>
                                          <input type="text" id="job" name="job" value="<?php echo $_SESSION['job'];?>"class="form-control"placeholder="Pekerjaan Anda"><label class="add" for="pass">
                                            Hindari penggunaan singkatan!
                                          </label>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="prov">Desa</label>
                                          <input type="text" id="prov" name="prov" class="form-control" value="<?php echo $_SESSION['prov'];?>"placeholder="Desa Anda"><label class="add" for="pass">
                                            Hindari penggunaan singkatan!
                                          </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="kota">Dusun</label>
                                          <input type="text" id="kota" name="kota" value="<?php echo $_SESSION['kota'];?>"class="form-control"placeholder="Dusun Anda">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id = "alamat" name="alamat" value="<?php echo $_SESSION['alamat'];?>" placeholder="Alamat Anda">
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="pass">Kata Sandi</label>
                                          <input type="password" class="form-control" id="pass" name="pass" placeholder="Kata Sandi Anda">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="pass2">Konfirmasi Kata Sandi</label>
                                          <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Konfirmasi Kata Sandi Anda">
                                        </div>
                                      </div>
                                      <!--Upload gambar-->
                                    
                                      <div class="form-group">
                                        <label for="upload">Pilihlah gambar ukuran kotak (1:1) untuk hasil terbaik</label>
                                        <input type="file" class="form-control-file" name="gambar" id="gambar">
                                      </div>
                                      <button type="submit" class="btn btn-primary" onclick="validasi_form_input()">Daftar</button>
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
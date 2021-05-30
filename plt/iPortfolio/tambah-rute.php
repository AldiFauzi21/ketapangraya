<?php
  session_start();
  date_default_timezone_set('Asia/Singapore');
  require '../functions.php';
  include '../config.php';
  if(isset ($_POST ['unggah'])) {
    if(
      empty($_POST['nama'])
    ) {
      echo "<script>alert('Anda belum melengkapi data');</script>";
    }else{
    $nama=$_POST['nama'];
    $nik=$_SESSION['NIK'];
    $id=$_SESSION['id_wisata'];
    $sql = "INSERT INTO rute (nama, id_wisata, NIK) VALUES ('$nama', $id, $nik);";
		if (($nama!="")
			&&($nik!="")
			&&($id!="")
		) {
			if ($conn->query($sql) === TRUE) {
        header("location:wisata.php?id=".$id."#resume");
			} else {
				echo "Error$ " . $sql . "<br>" . $conn->error;
			}
		}else{
			header("location:wisata.php?id=".$id."#resume");
		}
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
  <link href="assets/img/favicon-plt.png" rel="icon">
  <link href="assets/img/apple-touch-icon-plt.png" rel="apple-touch-icon">  

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    </style>
    <title>Tambah Rute</title>
  </head>
  <body class="mt-5">
 
<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){
                echo "<div  class='alert'>Maaf, judul ini pernah digunakan sebelumnya <br> Mohon untuk menggunakan judul lainnya!</div>";
                //echo "<div  class='alert'>Status WA : ",$_SESSION['WhatsApp']," <br> alamat : ",$_SESSION['test'],"</div>";
              }
              else{
                echo "<h4 class='display-4'>Tambah Rute</h4>";
              }
            }else{
                echo "<h4 class='display-4'>Tambah Rute</h4>";
            }
          ?>
          <!--Judul-->
          <div class="form-group">
            <form action="" method="POST" >
              <label for="nama">Nama Rute</label>
                <input type="text" name="nama" class="form-control"  placeholder="Nama Rute">
              </div>

                        <button type="submit" name="unggah" class="btn btn-primary">Unggah</button><a href="wisata.php?id=<?=$_SESSION['id_wisata'];?>#resume" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #DC143C ; border-color: #DC143C; font-size: 11pt; " autocomplete="on">Kembali</a>
                  </form></div></div></div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
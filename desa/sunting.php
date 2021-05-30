<?php
  require '../plt/functions.php';
  include '../plt/config.php';
  $judul = $_GET["file"];
  if(isset ($_POST ['unggah'])) {
    $isi=$_POST['isi'];
    $infokom=fopen("assets/text/desa/$judul.txt", 'w');

    fwrite($infokom, "${isi}");
    fclose($infokom);
    echo "<script>alert('Data berhasil disimpan');</script>";
    header("location:desa.php");
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




    <title>Sunting</title>

    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  </head>
  <body class="mt-5">

<!--Unggah Informasi-->
<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){
                echo "<div  class='alert'>Maaf, informasi gagal diperbahatui!</div>";
                //echo "<div  class='alert'>Status WA : ",$_SESSION['WhatsApp']," <br> alamat : ",$_SESSION['test'],"</div>";
              }
              else{
                echo "<h4 class='display-4'>Sunting";
                echo $judul;
                echo "</h4>";
              }
            }else{
              echo "<h4 class='display-4'>Sunting";
              echo $judul;
              echo "</h4>";
            }
          ?>
          <!--Judul-->
          <div class="form-group">
            <form action="" method="POST" enctype="">
              <!--Text Area-->
              <div class="form-group">
                    <textarea class="form-control" name="isi" rows="10" placeholder="Isi Informasi">
                      <?php 
                        $lines = file("assets/text/desa/$judul.txt"); 
                        foreach ($lines as $line_num => $line){
                         print $line; 
                        }
                      ?>
                    </textarea>
                  </div>

                        <button type="submit" name="unggah" class="btn btn-primary">Sunting</button>
                        <a href="desa.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #DC143C ; border-color: #DC143C; font-size: 11pt; " autocomplete="on">Kembali</a>
                  </form></div></div></div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
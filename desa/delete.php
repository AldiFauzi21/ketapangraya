<?php
  session_start();
  require '../plt/functions.php';
  include '../plt/config.php';
  $id=$_GET["id"];
  $table=$_GET["table"];
  $allow=$_GET["allow"];
  if(strcmp($allow, "true") == 0){
    if(isset ($id)) {
      if(
        empty($table)
      ) {
        echo "<script>alert('Kesalahan sistem!');</script>";
      }else{
        $sql = "DELETE FROM $table WHERE id =  $id;";
        if (($table!="")
          &&($id!="")
        ) {
          if ($conn->query($sql) === TRUE) {
            if (strcmp($table,"wisata") == 0){
              header("location:desa.php#portfolio");
            } else {
              header("location:wisata.php#portfolio");
            }
          } else {
            echo "Error$ " . $sql . "<br>" . $conn->error;
          }
        }else{
          if (strcmp($table,"wisata") == 0){
            header("location:desa.php#portfolio");
          } else {
            header("location:wisata.php#portfolio");
          }
        }
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
    <title>Hapus Data</title>
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
                echo "<h4 class='display-4'>Anda yakin ingin menghapus data potensi wisata ini?</h4>";
              }
            }else{
                echo "<h4 class='display-4'>Anda yakin ingin menghapus data potensi wisata ini?</h4>";
            }
          ?>
          <!--Judul-->
          <div class="form-group">
          <a href="delete.php?id=<?=$id;?>&table=<?=$table;?>&allow=true#portfolio" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: ##00FF00 ; border-color: ##00FF00; font-size: 11pt; " autocomplete="on">Hapus</a>
            <a href="desa.php#portfolio" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #DC143C ; border-color: #DC143C; font-size: 11pt; " autocomplete="on">Kembali</a>
          </div></div></div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
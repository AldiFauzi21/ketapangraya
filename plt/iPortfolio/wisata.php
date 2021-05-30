<?php
  session_start();
  date_default_timezone_set('Asia/Singapore');
  require '../functions.php';
  include '../config.php';
  $id=$_GET["id"];
  $_SESSION['id_wisata'] = $id;
  $info=query("SELECT * FROM wisata WHERE id=$id")[0];
  $isi=$info['nama'];
  $id_wisata_admin = $info['NIK'];
  $admin_wisata=query("SELECT * FROM admin WHERE NIK=$id_wisata_admin")[0];
  $_SESSION['jenis']="";
  if(isset($_GET["content"])){
    $content = $_GET["content"];
  }
  if(isset($_GET["pesan"])){
    if(strcmp($_GET["pesan"], "unlike") == 0){
      if(isset ($_GET["id_like"])) {
        $id_like = $_GET["id_like"];
        $sql = "DELETE FROM admin_menyukai_$content WHERE id = $id_like;";
        if (($id_like!="")
        ) {
          if ($conn->query($sql) === TRUE) {
            header("location:wisata.php?id=".$_SESSION['id_wisata']."#portfolio");
          } else {
            echo "Error$ " . $sql . "<br>" . $conn->error;
          }
        }
      }
    } else if (strcmp($_GET["pesan"], "like") == 0){
      if($_SESSION["NIK"]==""){
        header("location:Login.php");
      }else{
        $id_like = $_GET["id_like"];
        $like_NIK = $_SESSION["NIK"];
        $sql = "INSERT INTO admin_menyukai_$content (nik, id_$content) VALUES ('$like_NIK', $id_like);";
        if (($id_like!="")
        ) {
          if ($conn->query($sql) === TRUE) {
            header("location:wisata.php?id=".$_SESSION['id_wisata']."#portfolio");
          } else {
            echo "Error$ " . $sql . "<br>" . $conn->error;
          }
        }
      }
    }
  }
  if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $user=query("SELECT * FROM admin WHERE username='$username'")[0];
    $_SESSION['jenis']=$user['jenis'];
    $_SESSION['nama']=$user['nama'];
  }
  if(isset ($_POST['unggah'])) {
    if(
      empty($_POST['message'])
    ) {
      echo "<script>alert('Anda belum melengkapi data');</script>";
    }else{
      $message=$_POST['message'];
      $nik=$_SESSION['NIK'];
      $id=$_SESSION['id_wisata'];
      $sql = "INSERT INTO komentar (NIK, id_wisata) VALUES ($nik, $id);";
      if (($message!="")
        &&($nik!="")
        &&($id!="")
      ) {
        if ($conn->query($sql) === TRUE) {
          $data=query("SELECT * FROM komentar ORDER BY id DESC LIMIT 1")[0];
          $id_komentar = $data['id'];
          $infokom=fopen("assets/text/comments/$id_komentar.txt", 'w');

            //fwrite($infokom, "dibuat : ${tanggal}");

            fwrite($infokom, "${message}");
            fclose($infokom);
          header("location:wisata.php?id=".$id."#testimonials");
        } else {
          echo "Error$ " . $sql . "<br>" . $conn->error;
        }
      }else{
        header("location:wisata.php?id=".$id."#testimonials");
      }
    }
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $info['nama'];?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon-plt.png" rel="icon">
  <link href="assets/img/apple-touch-icon-plt.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.5.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img style="display: block; object-fit: cover; width:150px; height:150px;" src="<?php if(isset($_SESSION['username'])){echo "../../desa/"; echo $user['foto'];}else{echo "assets/img/backgrounds/"; echo $info['background'];}?>" alt="foto profil" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="desa.php"><?=$info['nama'];?></a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#hero"><i class="bx bx-home bx-tada-hover"></i> <span>Beranda</span></a></li>
          <li><a href="#about"><i class="bx bx-user bx-tada-hover"></i> <span>Tentang</span></a></li>
          <li><a href="#resume"><i class="bx bx-file-blank bx-tada-hover"></i> <span>Rute Pilihan</span></a></li>
          <li><a href="#portfolio"><i class="bx bx-book-content bx-tada-hover"></i> Layanan</a></li>
          <li><a href="#gallery"><i class="bx bx-server bx-tada-hover"></i> Galeri Wisata</a></li>
          <li><a href="#contact"><i class="bx bx-envelope bx-tada-hover"></i> Pojok Informasi</a></li>
          <li><a href="../../desa/desa.php#portfolio"><i class="bx bx-arrow-back bx-tada-hover"></i> Kembali</a></li>

        </ul>
      </nav>
      <!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style=" background-image: url(assets/img/backgrounds/<?=$info['background'];?>)">
    <div class="hero-container" data-aos="fade-in">
    <p style ='font-size: 100%;'>Diperbaharui pada <?= date('d-m-Y  h:i:s a', strtotime($info['tanggal']));?> oleh <?=$admin_wisata['username'];?></p>
      <h1><?=$info['nama'];?></h1>
      <p>Oleh <span class="typed" data-typed-items="Tiara, Aldi, Widia, Fahmi, Humaira, Yayan, Gemma, Hafiz, Dira, Rozani, Gustin"></span></p>
    </div>
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Tentang</h2>
            <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='btn btn-primary' href='suntingwisata.php?id=";
                echo $id;
                echo "'>Sunting</a>";
              }
            ?>
        </div>
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <?php 
              $youtube = $info['youtube'];
              if ($youtube != "-") :
            ?>
            <div class="video-box d-flex justify-content-center align-items-stretch position-relative" style=" background-image: url(assets/img/backgrounds/<?=$info['background'];?>)">
              <a href="https://www.youtube.com/watch?v=<?=$youtube;?>" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
            </div>
            <?php 
              endif;
            ?>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?=$info['nama'];?></h3>
            <p class="font-italic" style=" text-align: justify; text-justify: inter-word;" >
              <?php 
                $lines = file("assets/text/descriptions/$isi.txt"); 
                foreach ($lines as $line_num => $line){
                  print $line . "<br />\n"; 
                }
              ?>
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <?php
      $id_rute = $info['id'];
      $rute=query("SELECT * FROM rute WHERE id_wisata=$id_rute");
    ?>
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Rute Pilihan</h2>
            <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='btn btn-primary' href='tambah-rute.php'>Tambah Rute</a>";
              }
            ?>
        </div>
        <?php foreach( $rute as $row ) : 
          $id_rute_admin = $row['NIK'];
          $admin=query("SELECT * FROM admin WHERE NIK=$id_rute_admin")[0];
        ?>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title"><?=$row['nama'];?></h3>
            <p>Oleh <?=$admin['username'];?></p>
            <?php
              $id_titik = $row['id'];
              $titik=query("SELECT * FROM titik WHERE id_rute=$id_titik");
              foreach( $titik as $point ) :
              $id_titik_admin = $point['NIK'];
              $admin_titik=query("SELECT * FROM admin WHERE NIK=$id_titik_admin")[0];
            ?>
            <div class="resume-item">
              <h4><?=$point['nama'];?></h4>
              <h5><?=$point['jarak'];?></h5>
              <iframe src="https://maps.google.com/?q=<?=$point['koordinat'];?>&output=svembed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
              <p style=" text-align: justify; text-justify: inter-word;"><?=$point['deskripsi'];?></p>
              <h5>Oleh <?=$admin_titik['username'];?></h5>
            </div>
            <?php endforeach; ?>
            <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='btn btn-primary' href='tambah-titik.php?id_rute="; echo $id_titik; echo "'>Tambah Titik</a>";
              }
            ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    
    <!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <?php
      $id_wisata = $info['id'];
      $fasilitas=query("SELECT * FROM fasilitas WHERE id_wisata=$id_wisata");
    ?>
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Layanan</h2>
            <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='btn btn-primary' href='tambah-fasilitas.php'>Tambah Fasilitas</a>";
              }
            ?>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-fasilitas">Fasilitas</li>
              <li data-filter=".filter-makanan">Makanan</li>
              <li data-filter=".filter-minuman">Minuman</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php foreach( $fasilitas as $row ) : 
            $id_fasilitas_admin = $row['NIK'];
            $admin=query("SELECT * FROM admin WHERE NIK=$id_fasilitas_admin")[0];
            $like_NIK = $_SESSION['NIK'];
            $like_id = $row['id'];;
            $sqllike=mysqli_query($conn,"SELECT * FROM admin_menyukai_fasilitas WHERE NIK='$like_NIK' AND id_fasilitas=$like_id");
            $likes = mysqli_num_rows($sqllike);
            $sqllikesall=mysqli_query($conn,"SELECT * FROM admin_menyukai_fasilitas WHERE  id_fasilitas=$like_id");
            $likesall = mysqli_num_rows($sqllikesall);
            $_SESSION['id_fasilitas'] = $row['id'];
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$row['jenis'];?>">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/<?=$row['nama'];?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/<?=$row['nama'];?>" data-gall="portfolioGallery" class="venobox" title="<?=$row['deskripsi'];?> (<?=$admin['username'];?>)"><i class="bx bx-book-open bx-tada-hover"></i></a>
                <?php
                  if(strcmp($_SESSION['NIK'], $id_fasilitas_admin) == 0){
                    echo "<a href='delete.php?id=";
                    echo $row['id'];
                    echo "&table=fasilitas&allow=false'><i class='bx bx-trash'></i></a>";
                  } else {
                    if ($likes>0){
                      $like=query("SELECT * FROM admin_menyukai_fasilitas WHERE NIK='$like_NIK' AND id_fasilitas=$like_id")[0];
                      echo "<a  style = 'font-family: cursive;' href='wisata.php?id=";
                      echo $id_wisata;
                      echo "&pesan=unlike&content=fasilitas&id_like=";
                      echo $like['id'];
                      echo "#portfolio' ><i class='bx bxs-heart' style = 'color : red;'></i>";
                      echo $likesall;
                      echo "</a>";
                    } else {
                      echo "<a  style = 'font-family: cursive;' href='wisata.php?id=";
                      echo $id_wisata;
                      echo "&pesan=like&content=fasilitas&id_like=";
                      echo $row['id'];
                      echo "#portfolio' ><i class='bx bx-heart'></i>";
                      echo $likesall;
                      echo "</a>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Gallery Section ======= -->
    <?php
      $id_wisata = $info['id'];
      $galeri=query("SELECT * FROM galeri WHERE id_wisata=$id_wisata");
      
    ?>
    <section id="gallery" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Galeri</h2>
            <?php
              if((strcmp($_SESSION['jenis'],"admin") == 0)||(strcmp($_SESSION['jenis'],"user") == 0)){
                echo "<a class='btn btn-primary' href='tambah-galeri.php'>Tambah Gambar</a>";
              }
            ?>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php foreach( $galeri as $row ) : 
            $id_galeri_admin = $row['NIK'];
            $admin=query("SELECT * FROM admin WHERE NIK=$id_galeri_admin")[0];
            $like_NIK = $_SESSION['NIK'];
            $like_id = $row['id'];;
            $sqllike=mysqli_query($conn,"SELECT * FROM admin_menyukai_galeri WHERE NIK='$like_NIK' AND id_galeri=$like_id");
            $likes = mysqli_num_rows($sqllike);
            $sqllikesall=mysqli_query($conn,"SELECT * FROM admin_menyukai_galeri WHERE  id_galeri=$like_id");
            $likesall = mysqli_num_rows($sqllikesall);
            $_SESSION['id_galeri'] = $row['id'];
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/<?=$row['nama'];?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/<?=$row['nama'];?>" data-gall="portfolioGallery" class="venobox" title="<?=$row['deskripsi'];?> (<?=$admin['username'];?>)"><i class="bx bx-book-open bx-tada-hover"></i></a>
                <?php
                  if(strcmp($_SESSION['NIK'], $id_galeri_admin) == 0){
                    echo "<a href='delete.php?id=";
                    echo $row['id'];
                    echo "&table=galeri&allow=false'><i class='bx bx-trash'></i></a>";
                  } else {
                    if ($likes>0){
                      $like=query("SELECT * FROM admin_menyukai_galeri WHERE NIK='$like_NIK' AND id_galeri=$like_id")[0];
                      echo "<a  style = 'font-family: cursive;' href='wisata.php?id=";
                      echo $id_wisata;
                      echo "&pesan=unlike&content=galeri&id_like=";
                      echo $like['id'];
                      echo "#portfolio' ><i class='bx bxs-heart' style = 'color : red;'></i>";
                      echo $likesall;
                      echo "</a>";
                    } else {
                      echo "<a  style = 'font-family: cursive;' href='wisata.php?id=";
                      echo $id_wisata;
                      echo "&pesan=like&content=galeri&id_like=";
                      echo $row['id'];
                      echo "#portfolio' ><i class='bx bx-heart'></i>";
                      echo $likesall;
                      echo "</a>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    
    <!-- ======= Testimonials Section ======= -->
    <?php
      $id_wisata = $info['id'];
      $komentar=query("SELECT * FROM komentar WHERE id_wisata=$id_wisata");
    ?>
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Komentar</h2>
          <p>Bijaklah dalam memberi komentar.</p>
        </div>

        <div class="owl-carousel testimonials-carousel">
          <?php foreach( $komentar as $row ) : 
            $id_admin = $row['NIK'];
            $isi_komentar = $row['id'];
            $admin=query("SELECT * FROM admin WHERE NIK=$id_admin")[0];
            $like_NIK = $_SESSION['NIK'];
            $like_id = $row['id'];;
            $sqllike=mysqli_query($conn,"SELECT * FROM admin_menyukai_komentar WHERE NIK='$like_NIK' AND id_komentar=$like_id");
            $likes = mysqli_num_rows($sqllike);
            $sqllikesall=mysqli_query($conn,"SELECT * FROM admin_menyukai_komentar WHERE  id_komentar=$like_id");
            $likesall = mysqli_num_rows($sqllikesall);
            $_SESSION['id_komentar'] = $row['id'];
          ?>
          <div class="testimonial-item" data-aos="fade-up">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php 
                  $lines = file("assets/text/comments/$isi_komentar.txt"); 
                  foreach ($lines as $line_num => $line){
                    print $line . "<br />\n"; 
                  }
                ?>
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="../../desa/<?=$admin['foto'];?>" class="testimonial-img" alt="">
            <h3><?=$admin['nama'];?></h3>
            <?php
              if(strcmp($_SESSION['NIK'], $id_admin) == 0){
                echo "<a href='delete.php?id=";
                echo $row['id'];
                echo "&table=komentar&allow=false'><i class='bx bx-trash'></i></a>";
              } else {
                if ($likes>0){
                  $like=query("SELECT * FROM admin_menyukai_komentar WHERE NIK='$like_NIK' AND id_komentar=$like_id")[0];
                  echo "<a  style = 'font-family: cursive;' href='wisata.php?id=";
                  echo $id_wisata;
                  echo "&pesan=unlike&content=komentar&id_like=";
                  echo $like['id'];
                  echo "#portfolio' ><i class='bx bxs-heart' style = 'color : red;'></i>";
                  echo $likesall;
                  echo "</a>";
                } else {
                  echo "<a  style = 'font-family: cursive;' href='wisata.php?id=";
                  echo $id_wisata;
                  echo "&pesan=like&content=komentar&id_like=";
                  echo $row['id'];
                  echo "#portfolio' ><i class='bx bx-heart'></i>";
                  echo $likesall;
                  echo "</a>";
                }
              }
            ?>
          </div>
          <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Pojok Informasi</h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Kontak:</h4>
                <p><?=$info['kontak'];?></p>
              </div>
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokasi:</h4>
                <p><?=$info['lokasi'];?></p>
              </div>
              <iframe src="https://maps.google.com/?q=<?=$info['koordinat'];?>&output=svembed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div  class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <form action="" method="post">
                <div class="form-group">
                  <label for="name">Komentar</label>
                  <textarea class="form-control" name="message" rows="15" data-rule="required" data-msg="Please write something for us"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="text-center"><button name="unggah" type="submit">Beri Komentarmu</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div style="font-size: 0.8em;" class="copyright">
        &copy; Copyright <strong><span>KKN Desa Ketapang Raya 2021</span></strong>
      </div>
      <div class="credits">
        <a href="https://www.instagram.com/kkn_wisata_ketapangraya2021/">Official Instagram</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top">
    <i class="icofont-simple-up"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
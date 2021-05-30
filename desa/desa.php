<?php
  session_start();
  date_default_timezone_set('Asia/Singapore');
  require '../plt/functions.php';
  include '../plt/config.php';
  $_SESSION['jenis']="";
  if(isset($_GET["pesan"])){
    if(strcmp($_GET["pesan"], "unlike") == 0){
      if(isset ($_GET["id_like"])) {
        $id_like = $_GET["id_like"];
        $sql = "DELETE FROM admin_menyukai_wisata WHERE id = $id_like;";
        if (($id_like!="")
        ) {
          if ($conn->query($sql) === TRUE) {
            header("location:desa.php#portfolio");
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
        $sql = "INSERT INTO admin_menyukai_wisata (nik, id_wisata) VALUES ('$like_NIK', $id_like);";
        if (($id_like!="")
        ) {
          if ($conn->query($sql) === TRUE) {
            header("location:desa.php#portfolio");
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
    $_SESSION['NIK']=$user['NIK'];
  } else {
    $_SESSION['jenis']="";
    $_SESSION['nama']="";
    $_SESSION['NIK']="";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desa Ketapang Raya</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Hidayah - v3.0.0
  * Template URL: https://bootstrapmade.com/hidayah-free-simple-html-template-for-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10 d-flex align-items-center justify-content-between">
          <?php
            if(strcmp($_SESSION['jenis'],"admin") == 0 || strcmp($_SESSION['jenis'],"user") == 0){
              echo "<div class='profile'>";
              echo "<img style='display: block; object-fit: cover; width:50px; height:50px;' src='";
              echo $user['foto'];
              echo "' alt='foto profil' class='img-fluid rounded-circle'>";
              echo "</div>";
              echo "<h1 class='logo' style='font-size: 1.5em;'><a href='desa.php'>Desa Ketapang Raya</a></h1>";
            }
            else{
              echo "<h1 class='logo'><a href='desa.php'>Desa Ketapang Raya</a></h1>";
            }
          ?>
          <!-- Uncomment below if you prefer to use an image logo -->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="desa.php">Beranda</a></li>
              <li class="drop-down"><a href="#">Tentang</a>
                <ul>
                  <li><a href="#about">Kondisi</a></li>
                  <li><a href="#visi">Visi</a></li>
                  <li><a href="#misi">Misi</a></li>
                  <li><a href="#geografi">Geografi</a></li>
                  <li><a href="#demografi">Demografi</a></li>
                  <li><a href="#struktur">Struktur</a></li>
                  <li><a href="#team">Mahasiswa KKN Era New Normal</a></li>
                </ul>
              </li>
              <li><a href="#counts">Sejarah</a></li>
              <li><a href="#services">Pembangunan</a></li>
              <li><a href="#portfolio">Potensi Wisata</a></li>
              <li><a href="#contact">Pojok Informasi</a></li>
              <?php
                if(strcmp($_SESSION['jenis'],"admin") == 0 || strcmp($_SESSION['jenis'],"user") == 0){
                  echo "<li><a class='cta-btn' href='logout.php'>Keluar</a></li>";
                } else {
                  echo "<li><a class='cta-btn' href='Login.php'>Masuk</a></li>";
                }
              ?>
            </ul>
          </nav><!-- .nav-menu -->

        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        <div class="carousel-item active" <?php if(isset($_GET['masuk'])){ echo 'style="background-image: url(assets/img/slide/slide2.jpg)"';}else{echo 'style="background-image: url(assets/img/slide/slide1.jpg)"';}?>>
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown"><?php if(isset($_GET['masuk'])){ echo "Selamat Datang ";}else{echo "Desa ";}?>
                <span><?php if(isset($_GET['masuk'])){ echo $_SESSION['nama'];}else{echo "Ketapang Raya";}?></span>
              </h2>
              <p class="animated fadeInUp" style=" text-align: justify; text-justify: inter-word; " >
                <?php
                  if(isset($_GET['masuk'])){
                    echo "<center style='color: white;'>Terima kasih sudah bergabung dengan kami.</center>";
                  }else{
                    $lines = file("assets/text/desa/Sejarah.txt"); 
                    print $lines[0] . "<br />\n";
                  }
                ?>
              </p>
              <a class="btn-get-started animated fadeInUp scrollto" <?php if(isset($_GET['masuk'])){ echo 'href="logout.php"';}else{echo 'href="#counts"';}?>><?php if(isset($_GET['masuk'])){ echo 'Keluar';}else{echo 'Baca Selengkapnya';}?></a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Visi</h2>
              <p class="animated fadeInUp" style=" text-align: justify; text-justify: inter-word; " >
                <?php 
                  $lines = file("assets/text/desa/Visi.txt"); 
                  print $lines[0] . "<br />\n"; 
                ?>
              </p>              
              <a href="#visi" class="btn-get-started animated fadeInUp scrollto">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animated fadeInDown">Misi</h2>
              <p class="animated fadeInUp" style=" text-align: justify; text-justify: inter-word; " >
                <?php 
                  $lines = file("assets/text/desa/Misi.txt"); 
                  print $lines[0] . "<br />\n"; 
                ?>
              </p>              
              <a href="#misi" class="btn-get-started animated fadeInUp scrollto">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Tentang</h2>
          <h3>Desa <span>Ketapang Raya</span></h3>
        </div>

        <div class="row justify-content-center">
        
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=1GO-FW4vDG0" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Desa Ketapang Raya</h3>
            <p style=" text-align: justify; text-justify: inter-word; ">
              <?php 
                $lines = file("assets/text/desa/Kondisi.txt"); 
                foreach ($lines as $line_num => $line){
                  print $line . "<br />\n"; 
                }
              ?>
            </p>
            <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='cta-btn' href='sunting.php?file=Kondisi'>Sunting</a>";
              }
            ?>
            <div class="icon-box">
              <div id="visi" class="icon"><i class="bx bx-show"></i></div>
              <h4 class="title"><a href="">Visi</a></h4>
              <p class="description" style=" text-align: justify; text-justify: inter-word; ">
                <?php 
                  $lines = file("assets/text/desa/Visi.txt"); 
                  foreach ($lines as $line_num => $line){
                    print $line . "<br />\n"; 
                  }
                ?>
              </p>
              <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='cta-btn' href='sunting.php?file=Visi'>Sunting</a>";
              }
            ?>
            </div>

            <div class="icon-box">
              <div id="misi"  class="icon"><i class="bx bx-target-lock"></i></div>
              <h4 class="title"><a href="">Misi</a></h4>
              <p class="description" style=" text-align: justify; text-justify: inter-word; ">
                <?php 
                  $lines = file("assets/text/desa/Misi.txt"); 
                  foreach ($lines as $line_num => $line){
                    print $line . "<br />\n"; 
                  }
                ?>
              </p>
              <?php
                if(strcmp($_SESSION['jenis'],"admin") == 0){
                  echo "<a class='cta-btn' href='sunting.php?file=Misi'>Sunting</a>";
                }
              ?>
            </div>

          </div>
          <div class=" col-lg-10 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <iframe src="https://maps.google.com/?q=
              <?php 
                $lines = file("assets/text/desa/Peta.txt"); 
                foreach ($lines as $line_num => $line){
                  print $line; 
                }
              ?>&output=svembed" frameborder="0" style="border:0; width: 100%; height: 355px;" allowfullscreen>
            </iframe>
            <div class="icon-box">
              <div id="geografi" class="icon"><i class="bx bx-map-alt"></i></div>
              <h4 class="title"><a href="">Geografi</a></h4>
              <p class="description" style=" text-align: justify; text-justify: inter-word; ">
                <?php 
                  $lines = file("assets/text/desa/Geografi.txt"); 
                  foreach ($lines as $line_num => $line){
                    print $line . "<br />\n"; 
                  }
                ?>
              </p>
              <?php
                if(strcmp($_SESSION['jenis'],"admin") == 0){
                  echo "<a class='cta-btn' href='sunting.php?file=Geografi'>Sunting</a>";
                }
              ?>
            </div>

            <div class="icon-box">
              <div id="demografi" class="icon"><i class="bx bx-group"></i></div>
              <h4 class="title"><a href="">Demografi</a></h4>
              <p class="description" style=" text-align: justify; text-justify: inter-word; ">
                <?php 
                  $lines = file("assets/text/desa/Demografi.txt"); 
                  foreach ($lines as $line_num => $line){
                    print $line . "<br />\n"; 
                  }
                ?>
              </p>
              <?php
                if(strcmp($_SESSION['jenis'],"admin") == 0){
                  echo "<a class='cta-btn' href='sunting.php?file=Demografi'>Sunting</a>";
                }
              ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Sejarah</h2>
          <h3>Desa <span>Ketapang Raya</span></h3>
        </div>
        <div class="row justify-content-center">
          
          <div class="col-xl-5 col-lg-6 d-flex justify-content-center align-items-stretch position-relative">
          <img src="assets/img/peta.jpg" alt="Peta Desa ketapang Raya" width="100%">
          </div>

          <div class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Sejarah</h3>
            <?php 
              $lines = file("assets/text/desa/Sejarah.txt"); 
              for ($i = 0; $i< count($lines); $i++){
                if($i<1){
                  ?>
                    <p style=" text-align: justify; text-justify: inter-word; ">
                  <?php
                    print $lines[$i] . "<br />\n";
                  ?>
                    </p>
                  <?php
                } else {
                ?>
                    <p class="description" style="font-size:13px; text-align: justify; text-justify: inter-word; ">
                  <?php
                    print $lines[$i] . "<br />\n";
                  ?>
                    </p>
                  <?php
                }
              }
            ?>
            <?php
              if(strcmp($_SESSION['jenis'],"admin") == 0){
                echo "<a class='cta-btn' href='sunting.php?file=Sejarah'>Sunting</a>";
              }
            ?>
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container-fluid">
        <div class="section-title">
          <h2>Pembangunan</h2>
          <h3>Aparatur <span>Pemerintahan</span></h3>
          <?php
            if(strcmp($_SESSION['jenis'],"admin") == 0){
              echo "<a class='cta-btn' href='sunting.php?file=Pembangunan'>Sunting</a>";
            }
          ?>
          <p style=" text-align: justify; text-justify: inter-word;" >
            <?php 
              $lines = file("assets/text/desa/Pembangunan.txt"); 
              print $lines[0] . "<br />\n";
            ?>
          </p>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">
              <?php 
                $lines = file("assets/text/desa/Pembangunan.txt"); 
                for ($i = 1; $i< count($lines); $i++){
                  ?>
                    <div class="col-lg-4 col-md-6 icon-box">
                      <div class="section-title"><h2 style="font-size:30px" ><?=$i;?></h2></div>
                      <p class="description"><?php print $lines[$i] . "<br />\n"; ?></p>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>KKN Desa Ketapang Raya 2021</h3>
          <p>"Sebelas anak luarbiasa menerapkan ilmu yang telah ditimba di bangku kampus untuk mengabdi pada masyarakat demi kesejahteraan bangsa"</p>
          <a class="cta-btn" href="https://www.instagram.com/kkn_wisata_ketapangraya2021/">Tentang Kami</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Pesona</h2>
          <h3>Lombok <span>Tenggara</span></h3>
          <?php
            if(strcmp($_SESSION['jenis'],"admin") == 0){
              echo "<a class='cta-btn' href='Upwisata.php'>Tambah Potensi Wisata</a>";
            }
          ?>
          <p>Lombok bagian tenggara memiliki banyak sekali potensi-potensi wisata tersembunyi. Disamping itu, Desa Ketapang Raya dilimpahi kekayaan potensi sumber daya alam.</p>
          <img src="assets/img/plt.png" alt="Pesona Lombok Tenggara" width="20%">
        </div>
        
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-wisata">Wisata</li>
              <li data-filter=".filter-penyebrangan">Penyebrangan</li>
              <li data-filter=".filter-penginapan">Penginapan</li>
              <li data-filter=".filter-potensi">Potensi</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container justify-content-center">

          <div class="col-xl-10">
          
            <div class="row">
              <?php
                $wisata=query("SELECT * FROM wisata");
                foreach( $wisata as $row ) : 
                $like_NIK = $_SESSION['NIK'];
                $like_id = $row['id'];
                $sqllike=mysqli_query($conn,"SELECT * FROM admin_menyukai_wisata WHERE NIK='$like_NIK' AND id_wisata=$like_id");
                $likes = mysqli_num_rows($sqllike);
                $sqllikesall=mysqli_query($conn,"SELECT * FROM admin_menyukai_wisata WHERE  id_wisata=$like_id");
                $likesall = mysqli_num_rows($sqllikesall);
                $id_admin = $row['NIK'];
                $admin=query("SELECT * FROM admin WHERE NIK=$id_admin")[0];
                $_SESSION['id_wisata'] = $row['id'];
              ?>
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-<?=$row['jenis'];?>">
                <div class="portfolio-wrap">
                  <img src="../plt/iPortfolio/assets/img/backgrounds/<?=$row['background'];?>" class="img-fluid" alt="<?=$row['nama'];?>">
                  <div class="portfolio-info">
                    <img src="assets/img/plt-small.png" alt="Pesona Lombok Tenggara" width="10%">
                    <h4><?=$row['nama'];?></h4>
                    <h6 style="font-size:13px; color: white;">Diperbaharui pada <?= date('d-m-Y  h:i:s a', strtotime($row['tanggal']));?> oleh <?=$admin['username'];?></h6>
                    <div class="portfolio-links">
                      <a href="../plt/iPortfolio/wisata.php?id=<?=$row['id'];?>"><i class="bx bx-book-open"></i></a>
                      <?php
                        if(strcmp($_SESSION['NIK'], $id_admin) == 0){
                          echo "<a href='delete.php?id=";
                          echo $row['id'];
                          echo "&table=wisata&allow=false'><i class='bx bx-trash'></i></a>";
                        } else {
                          if ($likes>0){
                            $like=query("SELECT * FROM admin_menyukai_wisata WHERE NIK='$like_NIK' AND id_wisata=$like_id")[0];
                            echo "<a  style = 'font-family: cursive;' href='desa.php?pesan=unlike&id_like=";
                            echo $like['id'];
                            echo "#portfolio' ><i class='bx bxs-heart' style = 'color : red;'></i>";
                            echo $likesall;
                            echo "</a>";
                          } else {
                            echo "<a style = 'color : white; font-family: cursive;' href='desa.php?pesan=like&id_like=";
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
              </div>
              <?php endforeach; ?>
              <!-- End portfolio item -->

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container-fluid">

        <div class="section-title">
          <h2>KKN Desa Ketapang Raya</h2>
          <h3>Era <span>New Normal</span></h3>
          <p>Universitas Mataram</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">
              <?php
                $anggota=query("SELECT * FROM kkn");
                foreach( $anggota as $row ) : 
                $instagram = $row['instagram'];
                $facebook = $row['facebook'];
                $twitter = $row['twitter'];
                $linkedin = $row['linkedin'];
              ?>
              <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member">
                  <img src="assets/img/team/<?=$row['foto'];?>" class="img-fluid" alt="">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4><?=$row['nama'];?></h4>
                      <span><?=$row['nim'];?></span>
                      <span><?=$row['jurusan'];?></span>
                    </div>
                    <div class="social">
                    <?php
                        if(strcmp($instagram,'-') != 0){
                          echo "<a href='";
                          echo $instagram;
                          echo "'><i class='icofont-instagram'></i></a>";
                        }
                      ?><?php
                        if(strcmp($facebook,'-') != 0){
                          echo "<a href='";
                          echo $facebook;
                          echo "'><i class='icofont-facebook'></i></a>";
                        }
                      ?><?php
                        if(strcmp($twitter,'-') != 0){
                          echo "<a href='";
                          echo $twitter;
                          echo "'><i class='icofont-twitter'></i></a>";
                        }
                      ?><?php
                        if(strcmp($linkedin,'-') != 0){
                          echo "<a href='";
                          echo $linkedin;
                          echo "'><i class='icofont-linkedin'></i></a>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            <!-- End Member Item -->

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Pojok Informasi</h2>
          <h3>Desa <span>Ketapang Raya</span></h3>
          
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="row">

              <div class="col-lg-6">

                <div class="row justify-content-center">

                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-map"></i>
                    <h4>Alamat</h4>
                    <p >
                      <?php 
                        $lines = file("assets/text/desa/Alamat.txt"); 
                        foreach ($lines as $line_num => $line){
                          print $line . "<br />\n"; 
                        }
                      ?>
                    </p>
                    <?php
                      if(strcmp($_SESSION['jenis'],"admin") == 0){
                        echo "<a class='cta-btn' href='sunting.php?file=Alamat'>Sunting</a>";
                      }
                    ?>
                  </div>
                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-phone"></i>
                    <h4>Kontak</h4>
                    <p>
                      <?php 
                        $lines = file("assets/text/desa/Kontak.txt"); 
                        foreach ($lines as $line_num => $line){
                          print $line . "<br />\n"; 
                        }
                      ?>
                    </p>
                    <?php
                      if(strcmp($_SESSION['jenis'],"admin") == 0){
                        echo "<a class='cta-btn' href='sunting.php?file=Kontak'>Sunting</a>";
                      }
                    ?>
                  </div>
                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-envelope"></i>
                    <h4>Surat Elektronik</h4>
                    <p>
                      <?php 
                        $lines = file("assets/text/desa/Surat.txt"); 
                        foreach ($lines as $line_num => $line){
                          print $line . "<br />\n"; 
                        }
                      ?>
                    </p>
                    <?php
                      if(strcmp($_SESSION['jenis'],"admin") == 0){
                        echo "<a class='cta-btn' href='sunting.php?file=Surat'>Sunting</a>";
                      }
                    ?>
                  </div>
                  <div class="col-md-6 info d-flex flex-column align-items-stretch">
                    <i class="bx bx-time-five"></i>
                    <h4>Jam Kerja</h4>
                    <p>
                      <?php 
                        $lines = file("assets/text/desa/Jam.txt"); 
                        foreach ($lines as $line_num => $line){
                          print $line . "<br />\n"; 
                        }
                      ?>
                    </p>
                    <?php
                      if(strcmp($_SESSION['jenis'],"admin") == 0){
                        echo "<a class='cta-btn' href='sunting.php?file=Jam'>Sunting</a>";
                      }
                    ?>
                  </div>

                </div>

              </div>

              <div class="col-lg-6">
                <div class="info d-flex flex-column align-items-stretch">
                  <h4>Peta</h4>
                  <iframe src="https://maps.google.com/?q=
                    <?php 
                      $lines = file("assets/text/desa/Peta.txt"); 
                      foreach ($lines as $line_num => $line){
                        print $line; 
                      }
                    ?>&output=svembed" frameborder="0" style="border:0; width: 100%; height: 355px;" allowfullscreen>
                  </iframe>
                  <?php
                    if(strcmp($_SESSION['jenis'],"admin") == 0){
                      echo "<a class='cta-btn' href='sunting.php?file=Peta'>Sunting</a>";
                    }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>KKN Desa Ketapang Raya 2021</span></strong>
      </div>
      <div class="credits">
        <a href="https://www.instagram.com/kkn_wisata_ketapangraya2021/">Official Instagram</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
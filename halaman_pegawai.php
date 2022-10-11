<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pegawai</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css" /> 
    <link rel="stylesheet" href="css/slick.css" type="text/css" />   
    <link rel="stylesheet" href="css/tooplate-simply-amazed.css" type="text/css" />

</head>
<body>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
	

	<div id="outer">
        <header class="header order-last" id="tm-header">
            <nav class="navbar">
                <div class="collapse navbar-collapse single-page-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#section-1"><span class="icn"><i class="fas fa-2x fa-air-freshener"></i></span> Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-2"><span class="icn"><i class="fab fa-2x fa-battle-net"></i></span> Intruksi Kerja </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-3"><span class="icn"><i class="fas fa-2x fa-user-plus"></i></span> Buyer</a>
                        </li>
                        <!-- <li class="nav-item">  
                             <a class="nav-link" href="cetak.php"><span class="icn"><i class="far fa-2x"></i></span> Keluar</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        
        <button class="navbar-button collapsed" type="button">
            <span class="menu_icon">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>
        </button>
        
        <main id="content-box" class="order-first">
            <div class="banner-section section parallax-window" data-parallax="scroll" data-image-src="img/section-1-bg.jpg" id="section-1">
                <div class="container">
                    <div class="item">
					<!-- <i class="fas fa-2x fa-atom"></i> -->
                        <div class="bg-blue-transparent logo-fa"><span><img src="img/PT Royal.jpg" alt="Pt.Royal"></span>PT. ROYAL PUSPITA</div>
                        <div class="bg-blue-transparent simple"><p>Selamat Datang Di Aplikasi Quality Control</p></div>
                    </div>
                </div>
            </div>
        
            <section class="work-section section" id="section-2">
                <div class="container">
                    <div class="row">
                        <div class="item col-md-4">
                            <div class="tm-work-item-inner">
                                <!-- <div class="icn"><i class="fas fa-2x fa-icons"></i></div> -->
                                <h3>.01 Intruksi Kerja QC</h3>
                                <p>Instruksi kerja adalah sebuah perintah yang di berikan oleh perusahaan untuk karyawan yang bekerja dalam ruang lingkup tersebut. <a href="ik.php">Baca Selengkapnya</a> </p>
                            </div>                        
                        </div>
                        <div class="item col-md-4 one">
                            <div class="tm-work-item-inner">
                                <!-- <div class="icn"><i class="fas fa-2x fa-tools"></i></div> -->
                                <h3>.02 Point To Check</h3>
                                <p>Point to check merupakan tahapan-tahapan dalam suatu pengecekan barang. <a href="pc.php">Baca Selengkapnya</a> </p>
                            </div>
                        </div>
                        <div class="item col-md-4 two">
                            <div class="tm-work-item-inner">
                                <!-- <div class="icn"><i class="fab fa-2x fa-phoenix-framework"></i></div> -->
                                <h3>.03 Input Data Pengecekan</h3>
                                <p>Ialah merupakan suatu langkah untuk memasukkan data-data hasil pemeriksaan yang telah di lakukan oleh QC. <a href="input.php">Silahkan Input Data</a> </p>
                            </div>
                        </div>
                    </div>
                    <div class="title">
                       <h2>Our Work</h2>
                    </div>
                </div>
            </section>
<?php

include 'config/app.php'; 

$data_buyer = select("SELECT * FROM tb_buyer ORDER BY nama_buyer DESC");
?>
            <section class="work-section section" id="section-3">
                <div class="container">
                    <div class="row">
                        <div class="item col-md-4">
                            <div class="tm-work-item-inner">
                                <h3>Daftar Buyer</h3>
                          <table class="table table-striped table-responsive table-hover " style="width:100%">
                            <?php $no = 1; ?>
                            <?php foreach ($data_buyer as $buyer) : ?>
                                <td><?= $no++; ?></td>
                                <td><?= $buyer['nama_buyer']; ?></td>
                                
                                </tr>
                        <?php endforeach; ?>
                        <p>
                        <a href="buyer.php">Detail Buyer</a>
                        </p>
                        
                          </table>
                        
                                
                    
                                    
                                     
                            </div>                        
                        </div>
                    <div class="title">
                       <h2>Our Work</h2>
                    </div>
                </div>
            </section>

            <!-- <section class="gallery-section section parallax-window" data-parallax="scroll" data-image-src="img/section-3-bg.jpg" id="section-3">
                <div class="container">
                    <div class="title text-right">
                        <h2>Our Gallery</h2>
                    </div>
                    <div class="mx-auto gallery-slider">
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-01.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-02.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-03.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-04.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-05.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-06.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-07.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-08.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                        <figure class="effect-julia item">
                            <img src="img/gallery-img-09.jpg" alt="Image">
                            <figcaption>
                                <div>
                                    <p>Julia dances in the deep dark</p>
                                </div>
                                <a href="#">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section> -->

            <section class="contact-section section" id="section-4">
                <div class="container">
                    <!-- <div class="title">
                        <h3>Contact Us</h3>
                    </div> -->
                    <div class="row">
                        <!-- <div class="col-lg-5 col-md-6 mb-4 contact-form">
                            <div class="form tm-contact-item-inner">
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="textarea form-control" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <input type="submit" class="btn btn-primary" value="Send it">
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-6 mb-4 contact-details">
                            <div class="tm-contact-item-inner-2">
                                <p>Nam mollis felis elementum, placerat dolor id, vehicula libero. Etiam dui nisl, mattis ut rhoncus et, cursus ut diam.</p>
                                <ul class="font-weight-light">
                                    <li>
                                        <span class="icn"><i class="fas fa-mobile-alt"></i></span>
                                        <span class="lbl">Tel:</span> <a href="#">010-020-0340</a>
                                    </li>
                                    <li>
                                        <span class="icn"><i class="fas fa-at"></i></span>
                                        <span class="lbl">Email:</span> <a href="#">info@company.com</a>
                                    </li>
                                    <li>
                                        <span class="icn"><i class="fas fa-globe-asia"></i></span>
                                        <span class="lbl">URL:</span> <a href="#">www.company.com</a>
                                    </li>
                                </ul>
                            </div>                        
                        </div> -->
                        <!-- <div class="col-lg-3 col-md-12 map"> -->
                            <!-- Map -->
                            <!-- <div class="map-outer tm-mb-40">
                                <div class="gmap-canvas">
                                    <iframe width="100%" height="400" id="gmap-canvas"
                                        src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </div>                
                </div>
                <footer class="footer container container-2">
                    <div class="row"> 
                        <p class="col-sm-7">Copyright 2021 Mita Dewanti</p>
                        <p class="col-sm-5 text-right design"><a href="logout.php">Keluar</a></p>
                    </div>
                </footer>
            </section>
        </main>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/templatemo-script.js"></script>

	
 
	<!-- <p>Halo <b><?php //echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php //echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>
 
	<br/>
	<br/> -->


</body>
</html>
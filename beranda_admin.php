<?php require_once("auth.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="padding:50px;">
    <nav class="navbar navbar-light navbar-expand-md fixed-top visible" data-aos="flip-up" data-aos-delay="900" style="background-color:#72aeda;color:rgb(205,207,208);">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color:#ffffff;">Grebek<strong>Ilmu</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:#ffffff;"><button class="btn btn-primary" type="button">Keluar</button></a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="d-block justify-content-center features-boxed" style="margin:0px;padding:-61px;">
        <div class="container d-block" style="padding:-7px;">
            <div class="intro">
                <h2 class="text-center">Selamat Datang Admin!</h2>
            </div>
            <div class="row justify-content-center features">
                
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="user_admin.php">
                    <div class="box"><i class="fa fa-user icon"></i>
                        <h3 class="name">User</h3>
                        <p class="description"></p>
                    </div></a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="form_peminjaman.php" title="">
                    <div class="box"><i class="fa fa-legal icon"></i>
                        <h3 class="name">persetujuan</h3>
                        <p class="description"></p>
                    </div>
                </a>
                    <a href="upload.php">
                    <div class="box"><i class="fa fa-pencil-square icon"></i>
                        <h3 class="name">soal</h3>
                        <p class="description"></p>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="buku_admin.php">
                    <div class="box"><i class="fa fa-leanpub icon"></i>
                        <h3 class="name">Buku</h3>
                        <p class="description"></p>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark" style="background-color:rgb(236,241,247);color:rgb(17,21,24);">
        <footer>
            <div class="container">
                    <div class="col item social" style="color:rgb(19,20,21);"><a href="#" style="color:rgb(68,9,115);"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter" style="color:rgb(221,18,18);"></i></a><a href="#" style="color:rgb(38,102,198);"><i class="icon ion-social-snapchat"></i></a>
                        <a
                            href="#"><i class="icon ion-social-instagram" style="color:rgb(49,76,108);"></i></a>
                    </div>
                </div>
                <p class="copyright">Company Name © 2017</p>
            </div>
        </footer>
    </div>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
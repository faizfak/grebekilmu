<?php
require_once("koneksi.php");

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $namabelakang = filter_input(INPUT_POST, 'namabelakang', FILTER_SANITIZE_STRING);
    $namadepan = filter_input(INPUT_POST, 'namadepan', FILTER_SANITIZE_STRING);
    $peminatan = filter_input(INPUT_POST, 'peminatan', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nohp = filter_input(INPUT_POST, 'nohp', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO member (level, namabelakang, namadepan, peminatan, email, password, nohp) 
            VALUES (0, :namabelakang, :namadepan, :peminatan, :email, :password, :nohp)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":namabelakang" => $namabelakang,
        ":namadepan" => $namadepan,
        ":password" => $password,
        ":email" => $email,
        ":peminatan" => $peminatan,
        ":nohp" => $nohp
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman registersukses
    if($saved){
        header("Location: sukses1.php");
    } 
        
}

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'email1', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM member WHERE email=:email1";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":email1" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            if ($user["level"] == 0) {
                // buat Session
                session_start();
                $_SESSION["user"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: masuk.php");
            }
            elseif ($user["level"] == 1) {
                session_start();
                $_SESSION["user"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: beranda_admin.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grebek Ilmu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="icon" href="">
</head>

<body style="background-repeat:no-repeat;background-position:top;background-size:auto;background-color:rgb(239,239,239);background-image:url(&quot;assets/img/abc.png&quot;);">
    <div></div>
    <nav class="navbar navbar-light navbar-expand-md fixed-top visible" data-aos="flip-up" data-aos-delay="900" style="background-color:#72aeda;color:rgb(205,207,208);">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color:#ffffff;">Grebek<strong>Ilmu</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php" style="color:#ffffff;">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="tentang.html" style="color:#ffffff;">Tentang</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="kontak.html" style="color:#ffffff;">Hubungi Kami</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="col" style="background-color:rgba(255,255,255,0.11);">
        <div class="container" style="padding:74px;background-repeat:no-repeat;background-size:contain;background-color:rgba(255,255,255,0);">
            <div class="col">
                <div>
                    <div class="row" style="margin-left:-43px;">
                        <div class="col" style="padding:53px;">
                            <h1 class="text-left" style="color:rgb(133,134,135);">GrebekIlmu</h1>
                            <p style="color:rgb(106,106,106);">Lebih mudah masuk SBMPTN dengan GrebekIlmu. GrebekIlmu merupakan salah satu wadah bagi lulusan SMA/SMK yang berkeinginan untuk melanjutkan pendidikan ke jenjang perkuliahan. GrebekIlmu menyediakan beberapa layanan seperti peminjaman
                                buku latihan soal, mentoring, dan simulasi tes SBMPTN.</p>
                        </div>
                        <div class="col" style="background-color:#ffffff;">
                            <p></p>
                            <div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-1">Masuk</a></li>
                                    <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-2">Registrasi</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" role="tabpanel" id="tab-1">
                                        <p></p>
                                        <form method="post">
                                            <div></div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><input class="form-control" type="text" name="email1" placeholder="Alamat email"></div>
                                                        <div class="form-group"><input class="form-control" type="password" placeholder="Kata sandi" name="password1"></div>
                                                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(147,147,147);" name="login">Masuk</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane active" role="tabpanel" id="tab-2">
                                        <p></p>
                                        <form method="POST">
                                            <div></div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="form-row">
                                                                <div class="col"><input class="form-control" type="text" name="namabelakang" placeholder="Nama belakang"></div>
                                                                <div class="col"><input class="form-control" type="text" name="namadepan" placeholder="Nama depan"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <p>Peminatan</p><select class="form-control" name="peminatan"><option value="Saintek">Saintek</option><option value="Soshum">Soshum</option></select></div>
                                                        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Alamat email"></div>
                                                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Kata sandi"></div>
                                                        <div class="form-group"><input class="form-control" type="tel" name="nohp" placeholder="Nomor telepon"></div>
                                                        <div class="form-group"><button class="btn btn-primary active btn-block" type="submit" style="background-color:rgb(147,147,147);" name="submit">Daftar</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="tab-3">
                                        <p>Content for tab 3.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col" data-aos="zoom-in" data-aos-delay="50" style="background-color:#ffffff;background-image:url(&quot;assets/img/abc4.png&quot;);">
        <div class="container" style="padding:28px;">
            <article>
                <div class="row">
                    <div class="col"><img src="assets/img/62027261-isometric-book-icon-vector-illustration-in-flat-design-style-isolated-on-white-academic-book-learnin.jpg" style="width:357px;"></div>
                    <div class="col">
                        <h1 class="text-right" style="color:rgb(73,73,74);">Peminjaman Buku Soal<br>SBMPTN</h1>
                        <p class="text-right" style="font-size:18px;color:rgb(84,87,91);"><strong>Pembelajaran semakin mudah tanpa biaya penunjang</strong></p>
                        <p class="text-right">Grebek Ilmu menyediakan buku soal SBMPTN dari donasi pihak ketiga untuk kemudian dapat dipinjamkan selama proses pembelajaran berlangsung.</p>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="col" style="background-color:#ffffff;height:283px;padding:21px;background-image:url(&quot;assets/img/abc6.jpg&quot;);background-repeat:no-repeat;background-size:cover;">
        <div class="container">
            <div class="row" data-aos="fade" data-aos-delay="50">
                <div class="col" style="margin-left:58px;">
                    <h1 style="color:rgb(245,245,245);">Simulasi SBMPTN</h1>
                    <p style="font-size:18px;color:rgb(245,245,245);"><strong>Kuasai materi dengan sejumlah latihan</strong></p>
                    <p style="color:rgb(245,245,245);">Pelaksanaan simulasi SBMPTN online dengan soal yang mengacu pada analisa SBMPTN setiap tahun.&nbsp;</p>
                </div>
                <div class="col"><img src="assets/img/abc3.png" style="margin-left:113px;"></div>
            </div>
        </div>
    </div>
    <div class="col" data-aos="fade" data-aos-delay="50" style="background-color:#ffffff;padding:32px;">
        <div class="container">
            <div class="row">
                <div class="col"><img src="assets/img/abc7.jpg" width="300" height="300"></div>
                <div class="col">
                    <h1>Mentoring Online</h1>
                    <p style="font-size:18px;"><strong>Konsultasi dengan pihak yang berpengalaman</strong></p>
                    <p>Grebek Ilmu menyediakan beberapa mentor yang dapat dihubungi setiap saat. Peserta dapat membuat janji dengan mentor untuk membahas materi atau konsultasi pribadi.</p>
                </div>
            </div>
        </div>
    </div>
   
    <div class="social-icons"><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-youtube"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
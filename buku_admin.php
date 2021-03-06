<?php

include("koneksi.php");
require_once("auth.php");

    // Delete product in cart
if(isset($_GET['id'])) {
    $sql = "DELETE FROM buku WHERE id='".$_GET['id']."'";
    $query = mysqli_query($con, $sql);
    if( $query ) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: buku_admin.php');
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
}

?>


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

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top visible" data-aos="flip-up" data-aos-delay="900" style="background-color:#72aeda;color:rgb(205,207,208);">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color:#ffffff;">Grebek<strong>Ilmu</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="beranda_admin.php" style="color:#ffffff;padding:14px;">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:#ffffff;"><button class="btn btn-primary" type="button">Keluar</button></a></li>
                </ul>
        </div>
        </div>
    </nav>
    <?php 
        $sql = 'SELECT * FROM buku';
        $result = mysqli_query($con, $sql);
    ?>
    <div class="container" style="padding:83px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Jenis</th>
                        <th>Quantity</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <?php while($product = mysqli_fetch_object($result)) { ?> 
                <tbody>
                    <tr>
                        <td> <?php echo $product->id; ?> </td>
                        <td> <?php echo $product->nama_buku; ?> </td>
                        <td> <?php echo $product->penerbit; ?> </td>
                        <td> <?php echo $product->tahun_terbit; ?> </td>
                        <td> <?php echo $product->jenis; ?> </td>
                        <td> <?php echo $product->quantity; ?> </td>
                        <td><a href="buku_admin.php?id=<?php echo $product->id; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <form action="addbuku.php" method="POST">
            <p class="text-center" style="font-size:28px;">Tambah Buku</p>
            <input class="form-control" type="text" placeholder="Nama Buku" name="nama_buku">
            <input class="form-control" type="text" placeholder="Penerbit" name="penerbit">
            <input class="form-control" type="text" placeholder="Tahun Terbit" name="tahun_terbit">
            <input class="form-control" type="text" placeholder="Jenis" name="jenis">
            <input class="form-control" type="text" placeholder="Quantity" name="quantity">
            <button class="btn btn-primary" role="button" type="submit" name="submit">Simpan</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
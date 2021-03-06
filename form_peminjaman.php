<?php

include("koneksi.php");
require_once("auth.php");

if(isset($_GET['id'])) {
    $sql = "UPDATE pesanan SET status='1' WHERE id='".$_GET['id']."'";
    $query = mysqli_query($con, $sql);
    
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: form_peminjaman.php');
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
        $sql = 'SELECT pesanan.id, pesanan.order_nama, pesanan.tanggal, pesanan.status, buku.nama_buku FROM pesanan JOIN buku ON pesanan.id_buku = buku.id';
        $result = mysqli_query($con, $sql);
     ?>
    <div class="container" style="padding:83px;">
        <div class="table-responsive">
            <p>Catatan:</p>
            <p>Pesanan dikonfirmasi (status = 1)</p>
            <p>Pesanan belum dikonfirmasi (status = 0)</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal</th>
                        <th>Nama Buku</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <?php while($product = mysqli_fetch_object($result)) { ?> 
                <tbody>
                    <tr>
                        <td> <?php echo $product->id; ?> </td>
                        <td> <?php echo $product->order_nama; ?> </td>
                        <td> <?php echo $product->tanggal; ?> </td>
                        <td> <?php echo $product->nama_buku; ?> </td>
                        <td> <?php echo $product->status; ?> </td>
                        <td><a href="form_peminjaman.php?id=<?php echo $product->id; ?>" onclick="return confirm('Are you sure?')" >Terima Pinjaman</a> </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
<?php
include 'restrict.php';
include '../konektor.php';
?>
<html lang="en">

<?php
$username = $_SESSION['username'];
$data2 = mysqli_query($konektor, "SELECT * FROM petugas WHERE email like '$username'");
if (mysqli_num_rows($data2)) {
    while ($d2 = mysqli_fetch_array($data2)) {
        $idpelanggan = $d2['idpetugas'];
        $nama = $d2['nama'];
        $alamat = $d2['alamat'];
        $telepon = $d2['telepon'];
    }
} ?>

<?php
$pelanggan = mysqli_query($konektor, "SELECT * FROM pelanggan WHERE status = '0'");
$cek = mysqli_num_rows($pelanggan);
if ($cek > 1) {
    while ($d = mysqli_fetch_array($pelanggan)) {
        $status = $d['status'];
    }
}
?>

<head>
    <link rel="icon" href="../icons/hh.png">
    <title>BEM | Beranda</title>
    <?php include '../cdn.php';
    include '../theme/temapetugas.php';
    ?>
</head>

<body>
    <?php include '../pesan/pesanpetugas.php'; ?>
    <?php include '../navbar/navbarpetugas.php'; ?>

    <div id="home" class="jumbotron jumbotron-fluid banner" style="padding-top: 12rem;padding-bottom:9rem;" width="100%">
        <div class="container">
            <h1 align="center">Selamat Datang <?php echo $nama ?></h1>
            <p align="center">"BEM Laundry" Website Laundry Terbaik, Terdepan Dan Terpercaya</p>
            <?php
            if ($cek > '0') {
                echo "<div align='center'><a href='pelanggan.php' class='text-decoration-none'><div class='alert alert-info statuspelanggan'><i style='font-size:17px' class='fa'>&#xf05a;</i> Ada Data Pelanggan Yang Belum Diverifikasi </div></div></a>";
            }
            ?>
        </div>
    </div>
</body>

</html>
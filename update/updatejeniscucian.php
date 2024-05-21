<?php
include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$idjeniscucian = filter($_POST['idjeniscucian']);
$nama = filter($_POST['nama']);
$harga = filter($_POST['harga']);

$data = mysqli_query($konektor, "SELECT * FROM detailtransaksi WHERE idjeniscucian LIKE '$idjeniscucian'");
if (mysqli_num_rows($data) > 0) {
    mysqli_query($konektor, "UPDATE jeniscucian SET harga='$harga' WHERE idjeniscucian='$idjeniscucian'");
    header("location:../petugas/jeniscucian.php?pesan=berhasilubah");
} else {
    // cek data sudah ada atau belum
    $data2 = mysqli_query($konektor, "SELECT * FROM jeniscucian WHERE nama LIKE '$nama' AND idjeniscucian != '$idjeniscucian'");
    if (mysqli_num_rows($data2) > 0) {
        echo "<script>
                alert('Nama Jenis Cucian yang Anda masukan sudah terdaftar. Silahkan ulangi dengan memasukan data yang lainnya')
                document.location.href = '../petugas/jeniscucian.php'
              </script>";
    } else {
        mysqli_query($konektor, "UPDATE jeniscucian SET nama='$nama',harga='$harga' WHERE idjeniscucian='$idjeniscucian'");
        header("location:../petugas/jeniscucian.php?pesan=berhasilubah");
    }
}
<?php
include '../konektor.php';
include '../getdata.php';

$fariabel1 = input($_POST['nama']);
$fariabel2 = input($_POST['alamat']);
$fariabel3 = input($_POST['telepon']);
$fariabel4 = input($_POST['email']);
$fariabel5 = input($_POST['password']);
$fariabel6 = input($_POST['tanggal_lahir']);

$data = mysqli_query($konektor, "select * from pelanggan where email like '$fariabel4' or telepon like'$fariabel3'");
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        header("location:daftarpelanggan.php?pesan=gagal");
    }
} else {
    mysqli_query($konektor, "insert into pelanggan values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6', '0')");
    header("location:../index.php?pesan=berhasil");
}

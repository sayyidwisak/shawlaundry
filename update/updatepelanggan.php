<?php
include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$namavariabel = filter($_POST['idpelanggan']);
$namavariabel1 = filter($_POST['nama']);
$namavariabel2 = filter($_POST['alamat']);
$namavariabel5 = filter($_POST['password']);

mysqli_query($konektor, "update pelanggan set nama='$namavariabel1', alamat='$namavariabel2', password='$namavariabel5' where idpelanggan='$namavariabel'");

header("location:../petugas/pelanggan.php?pesan=berhasilubah");

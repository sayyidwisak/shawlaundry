<?php

include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$namavariabel = input($_GET['idpelanggan']);

mysqli_query($konektor, "delete from pelanggan where idpelanggan='$namavariabel'");

header("location:../petugas/pelanggan.php?pesan=berhasilhapus");

<?php
include '../petugasrestrict.php';
include '../konektor.php';
include '../getdata.php';

$namavariabel = filter($_POST['idpetugas']);
$namavariabel1 = filter($_POST['nama']);
$namavariabel2 = filter($_POST['alamat']);
$namavariabel5 = filter($_POST['password']);

mysqli_query($konektor, "update petugas set nama='$namavariabel1', alamat='$namavariabel2', password='$namavariabel5' where idpetugas='$namavariabel'");

header("location:../petugas/petugas.php?pesan=berhasilubah");

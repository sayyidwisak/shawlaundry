<?php
include "../petugas/restrict.php";
include "../konektor.php";
include "../getdata.php";

$fariabel1 = input($_POST['tanggalterima']);
$fariabel2 = input($_POST['idpetugasterima']);
$fariabel3 = input($_POST['tanggalserah']);
$fariabel4 = input($_POST['idpetugasserah']);
$fariabel5 = input($_POST['status']);
$fariabel6 = input($_POST['idpelanggan']);

mysqli_query($konektor, "insert into transaksi values('', '$fariabel1', '$fariabel2', '$fariabel3', '$fariabel4', 'Diterima' , '$fariabel6', '0')");

header("location:../petugas/transaksi.php?pesan=berhasilinput");

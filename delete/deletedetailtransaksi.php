<?php
//restrict
include '../petugas/restrict.php';

// koneksi database
include '../konektor.php';

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
include '../getdata.php';

// menangkap data id yang di kirim dari url
$namaVariabel = input($_GET['iddetailtransaksi']);
$id = input($_GET['id']);


mysqli_query($konektor, "delete from detailtransaksi where iddetailtransaksi='$namaVariabel'");

header("location:../petugas/detailtransaksi.php?q=$id&pesan=berhasilhapus");

<?php
//restrict
include '../petugas/restrict.php';

// koneksi database
include '../konektor.php';

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
include '../getdata.php';

// menangkap data id yang di kirim dari url
$idkomentar = input($_GET['idkomentar']);
$id = input($_GET['id']);


mysqli_query($konektor, "delete from komentar where idkomentar='$idkomentar'");

header("location:../petugas/komentar.php?q=$id&pesan=berhasilhapuskomentar");

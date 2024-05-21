<?php
session_start();
include "../konektor.php";
include "../getdata.php";
include "../cdn.php";

$username = input($_POST['email']);
$sandi = input($_POST['pass']);

$data = mysqli_query($konektor, "select * from petugas where email='$username' and password='$sandi'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:beranda.php?pesan=berhasil");
} else {
    header("location:../loginPetugas.php?pesan=gagal");
}

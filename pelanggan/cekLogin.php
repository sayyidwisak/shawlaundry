<?php
session_start();
include '../konektor.php';
include '../getdata.php';

$email = input($_POST['email']);
$sandi = input($_POST['pass']);

$nilai = cekverifikasistatus($email);
$data = mysqli_query($konektor, "SELECT * FROM pelanggan WHERE email='$email' AND password='$sandi'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    if ($nilai == 1) {
        $_SESSION['usernamepelanggan'] = $email;
        $_SESSION['statuspelanggan'] = "login";
        $data2 = mysqli_query($konektor, "SELECT * FROM pelanggan WHERE email like '$email'");
        if (mysqli_num_rows($data2)) {
            while ($d2 = mysqli_fetch_array($data2)) {
                $tanggal_lahir = $d2['tanggal_lahir'];
            }
        }
        $v1 = date('m-d', strtotime($tanggal_lahir));
        $v2 = date('m-d');
        if ($v1 == $v2) {
            header("location:beranda.php?pesan=berhasil&pesan=selamatulangtahun");
        }else{
            header("location:beranda.php?pesan=berhasil");
        }
    } else {
        header("location:../loginpelanggan.php?pesan=belum_verifikasi");
    }
} else {
    header("location:../loginPelanggan.php?pesan=gagal");
}

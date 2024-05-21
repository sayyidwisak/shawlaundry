<?php
include "petugas/restrict.php";
include "konektor.php";
include "getdata.php";

$nama = input($_POST['nama']);
$email = input($_POST['email']);
$pesan = input($_POST['pesan']);

mysqli_query($konektor, "INSERT into komentar values('','$nama','$email','$pesan')");

$data = mysqli_query($konektor, "select * from komentar where email='$email'");
while ($d = mysqli_fetch_array($data)) {
    $pengirim = $d['email'];
    $penerima = "sayyidwisak@gmail.com";
    $subjek = "Komentar Terhadap Website";
    $pesan = $d['pesan'];
    $headers = "Dari : " . $pengirim;
    mail($penerima, $subjek, $pesan, $headers);
}

header("location:index.php?pesan=berhasilkirim");

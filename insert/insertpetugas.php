<?php
include "../petugas/restrict.php";
include "../konektor.php";
include "../getdata.php";

$nama = input($_POST['nama']);
$alamat = input($_POST['alamat']);
$telepon = input($_POST['telepon']);
$email = input($_POST['email']);
$password = input($_POST['password']);

$data = mysqli_query($konektor, "SELECT * FROM  petugas where email like '$email' or telepon like '$telepon'");
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        echo "
        <script>
        alert('Email atau nomor telepon sudah terdaftar, silahkan mendaftar dengan email atau nomor telepon yang lain')
        history.go(-1)
        </script>
        ";
    }
} else {

    mysqli_query($konektor, "insert into petugas values('', '$nama','$alamat','$telepon','$email','$password')");

    header("location:../petugas/petugas.php?pesan=berhasilinput");
}

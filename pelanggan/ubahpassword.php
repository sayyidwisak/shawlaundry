<?php
include '../konektor.php';
include '../getdata.php';

$email = filter($_POST['email']);
$password1 = filter($_POST['password1']);
$password2 = filter($_POST['password2']);
$idpelanggan = filter($_POST['idpelanggan']);

$data = mysqli_query($konektor, "SELECT * FROM pelanggan WHERE email LIKE '$email' AND password LIKE '$password1'");
if (mysqli_num_rows($data) < 1) {
    echo "<script>
    alert('Email Atau Password Lama Salah');
    history.go(-1);
    </script>
    ";
} else {
    mysqli_query($konektor, "UPDATE pelanggan SET password = '$password2' WHERE idpelanggan LIKE '$idpelanggan'");
    echo "<script>
    alert('Password Lama Sudah Diubah');
    history.go(-1);
    </script>
    ";
}

<?php
include "../petugas/restrict.php";
include "../konektor.php";
include "../getdata.php";

$nama = input($_POST['nama']);
$email = input($_POST['email']);
$pesan = input($_POST['pesan']);

mysqli_query($konektor, "INSERT into komentar values('','$nama','$email','$pesan')");

header("location:../index.php?pesan=berhasilkirim");

<?php
$temp = $_FILES['berkas']['tmp_name'];
$name = $_FILES['berkas']['name'];
$id = $_POST['idpetugas'] . '.jpg';
$size = $_FILES['berkas']['size'];
$type = $_FILES['berkas']['type'];
$folder = "../petugas/foto/";

if ($size <= 5000000 and $type == 'image/jpeg') {
    move_uploaded_file($temp, $folder . $id);
    header("location:../petugas/petugas.php?pesan=fileterkirim&name=$name&size=$size&type=$type&pesan=uploadfotoberhasil");
} else {
    header("location:../petugas/petugas.php?pesan=filegagalterkirim&name=$name&size=$size&type=$type&pesan=uploadfotogagal");
}

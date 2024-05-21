<?php
$konektor = mysqli_connect("localhost", "root", "", "shawlaundry");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
date_default_timezone_set('Asia/Ujung_Pandang');
?>

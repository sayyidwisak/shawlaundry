<?php
include "../petugas/restrict.php";
include "../konektor.php";
include "../getdata.php";

$fariabel1 = input($_POST['nama']);
$fariabel2 = input($_POST['harga']);

$data = mysqli_query($konektor, "SELECT * FROM jeniscucian where nama like '$fariabel1'");
if (mysqli_num_rows($data) > 0) {
    while (mysqli_fetch_array($data)) {
        echo "
        <script>
        alert('Nama jenis cucian ini sudah ada, silahkan tambahkan nama jenis cucian yang lain')
        history.go(-1)
        </script>
        ";
    }
} else {
    mysqli_query($konektor, "INSERT INTO jeniscucian VALUES ('','$fariabel1','$fariabel2')");
    header("location:../petugas/jeniscucian.php?pesan=berhasilinput");
}

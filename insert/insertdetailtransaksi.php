<?php
include "../petugas/restrict.php";
include "../konektor.php";
include "../getdata.php";

$fariabel1 = input($_POST['idtransaksi']);
$fariabel2 = input($_POST['idjeniscucian']);
$fariabel3 = input($_POST['berat']);
$fariabel4 = input(hargasatuan($_POST['idjeniscucian']));

mysqli_query($konektor, "insert into detailtransaksi values('','$fariabel1','$fariabel2','$fariabel3','$fariabel4')");

header("location:../petugas/detailtransaksi.php?q=$fariabel1&pesan=berhasilinput");

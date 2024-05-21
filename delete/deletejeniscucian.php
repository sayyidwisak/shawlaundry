<?php

include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$namavariabel = input($_GET['idjeniscucian']);

mysqli_query($konektor, "delete from jeniscucian where idjeniscucian='$namavariabel'");

header("location:../petugas/jeniscucian.php?pesan=berhasilhapus");

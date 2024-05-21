<?php

include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$namavariabel = input($_GET['idpetugas']);

mysqli_query($konektor, "delete from petugas where idpetugas='$namavariabel'");

header("location:../petugas/petugas.php?pesan=berhasilhapus");

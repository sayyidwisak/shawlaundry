<?php

include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$namavariabel = input($_GET['idtransaksi']);

mysqli_query($konektor, "delete from transaksi where idtransaksi='$namavariabel'");

header("location:../petugas/transaksi.php?pesan=berhasilhapus");

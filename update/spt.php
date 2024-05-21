<?php
include "../petugas/restrict";
include "../konektor.php";
include "../getdata.php";
$namaVariabel = filter($_POST['idtransaksi']);

mysqli_query($konektor, "update transaksi set simpan='1' where idtransaksi='$namaVariabel'");
header("location:../petugas/detailtransaksi.php?q=$namaVariabel");

<?php
$target = "../petugas/foto/" . $_GET['idpetugas'] . ".jpg";
if (file_exists($target)) {
    unlink($target);
}
header('location:../petugas/petugas.php?pesan=hapusfotoberhasil');
echo '<script>window.location="petugas.php"</script>';

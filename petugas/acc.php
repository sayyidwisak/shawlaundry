<?php
include "../konektor.php";
include "../getdata.php";

$namaVariabel = filter($_GET['idpelanggan']);

mysqli_query($konektor, "update pelanggan set status='1' where idpelanggan='$namaVariabel'");

$data = mysqli_query($konektor, "select * from pelanggan where idpelanggan='$namaVariabel'");
while ($d = mysqli_fetch_array($data)) {
    $pengirim = "sayid.vision.wisak@gmail.com";
    $penerima = $d['email'];
    $subjek = "Verifikasi Akun";
    $pesan = "Hai " . $d['nama'] .
        " Akun Pelanggan BEM Laundry kamu telah diverifikasi, Selamat bergabung di BEM Laundry, Silahkan login untuk melihat data transaksi anda.";
    $headers = "Dari : " . $pengirim;
    mail($penerima, $subjek, $pesan, $headers);
}

header("location:pelanggan.php?pesan=berhasilverifikasi");

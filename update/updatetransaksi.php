<?php
include '../petugas/restrict.php';
include '../konektor.php';
include '../getdata.php';

$idtransaksi = filter($_POST['idtransaksi']);
$tanggalterima = filter($_POST['tanggalterima']);
$idpetugasterima = filter($_POST['idpetugasterima']);
$tanggalserah = filter($_POST['tanggalserah']);
$idpetugasserah = filter($_POST['idpetugasserah']);
$status = filter($_POST['status']);
$idpelanggan = filter($_POST['idpelanggan']);

$nilai = ceksimpantransaksi($idtransaksi);
if ($nilai == '1') {
    mysqli_query($konektor, "UPDATE transaksi SET tanggalserah = '$tanggalserah',idpetugasserah='$idpetugasserah', status = '$status' WHERE idtransaksi LIKE '$idtransaksi'");
    header("location:../petugas/transaksi.php?pesan=berhasilubah");
} else {
    if ($status == 'Selesai') {
        echo "
        <script>
        alert('Belum simpan permanen, status selesai tidak bisa dipilih');
        history.go(-1)
        </script>
        ";
    } else {
        mysqli_query($konektor, "UPDATE transaksi SET tanggalterima='$tanggalterima',idpetugasterima='$idpetugasterima',tanggalserah='$tanggalserah',idpetugasserah='$idpetugasserah',status='$status',idpelanggan='$idpelanggan' WHERE idtransaksi='$idtransaksi'");
        header("location:../petugas/transaksi.php?pesan=berhasilubah");
    }
}

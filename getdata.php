<?php
//Cek Input
function input($data)
{
    include 'konektor.php';
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($konektor, $data);
    return $data;
}

function idpetugas($email)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from petugas where email like '$email'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            $hasil = $d['idpetugas'];
        }
    } else {
        $hasil = '';
    }
    return $hasil;
}
function namapetugas($email)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from petugas where email like'$email'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            $hasil = $d['nama'];
        }
    } else {
        $hasil = '';
    }
    return $hasil;
}

function hargasatuan($idjeniscucian)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from jeniscucian where idjeniscucian like '$idjeniscucian'");
    if (Mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            $hasil = $d['harga'];
        }
    } //data ditemukan dan ditampilkan ke layar
    else {
        $hasil = '';
    }
    return $hasil;
}

function namapetugas1($idpetugas)
{
    include 'konektor.php';
    $hasil = mysqli_query($konektor, "select * from petugas where idpetugas like '$idpetugas'");
    if (mysqli_num_rows($hasil) > 0) {
        while ($dhasil = mysqli_fetch_array($hasil)) {
            echo $dhasil['nama'];
        }
    } else {
        echo '';
    }
}

function namapelanggan($idpelanggan)
{
    include 'konektor.php';
    $hasil = mysqli_query($konektor, "select * from pelanggan where idpelanggan like '$idpelanggan'");
    if (mysqli_num_rows($hasil) > 0) {
        while ($dhasil = mysqli_fetch_array($hasil)) {
            echo $dhasil['nama'];
        }
    } else {
        echo '';
    }
}

function namapelanggan1($email)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from pelanggan where email like'$email'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            $hasil = $d['nama'];
        }
    } else {
        $hasil = '';
    }
    return $hasil;
}

function filter($string)
{
    $hasil = preg_replace('~[\;<>{"}]~', '', $string);
    $hasil2 = str_replace("'", '', $hasil);
    return $hasil2;
}

function ceksimpantransaksi($idtransaksi)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from transaksi where idtransaksi like '$idtransaksi'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            return $d['simpan'];
        }
    }
}

function namajeniscucian($idjeniscucian)
{
    include 'konektor.php';
    $hasil = mysqli_query($konektor, "select * from jeniscucian where idjeniscucian like'$idjeniscucian'");
    if (mysqli_num_rows($hasil) > 0) {
        while ($dhasil = mysqli_fetch_array($hasil)) {
            echo $dhasil['nama'];
        }
    }
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function tanggal($tanggal)
{
    return date('d M y', strtotime($tanggal));
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

function cekverifikasistatus($email)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from pelanggan where email like '$email'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            return $d['status'];
        }
    }
}

function cekpelanggan($idpelanggan)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from pelanggan where idpelanggan like '$idpelanggan'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            return $d['idpelanggan'];
        }
    }
}

function cektransaksi($idtransaksi)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from transaksi where idtransaksi like '$idtransaksi'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            return $d['idtransaksi'];
        }
    }
}

function cekstatustransaksi($idtransaksi)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from transaksi where idtransaksi like '$idtransaksi'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            return $d['status'];
        }
    }
}

function cekstatuspelanggan($idpelanggan)
{
    include 'konektor.php';
    $data = mysqli_query($konektor, "select * from pelanggan where idpelanggan like '$idpelanggan'");
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
            return $d['status'];
        }
    }
}

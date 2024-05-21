<?php include '../konektor.php'; ?>
<?php include '../getdata.php';
session_start(); ?>

<?php
$nama_dokumen = 'Nota-';
include("../mpdf60/mpdf.php");
$mpdf = new mPDF('utf-8', 'A4');
$mpdf->SetHeader('');
ob_start();
?>

<?php

$nama = $_GET['nama'];

$idtransaksi = $_GET['idtransaksi'];
$data = mysqli_query($konektor, "SELECT * from transaksi where idtransaksi like '$idtransaksi'");
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        $n1 = $d['idtransaksi'];
        $n2 = $d['tanggalterima'];
        $n3 = $d['idpetugasterima'];
        $n4 = $d['tanggalserah'];
        $n5 = $d['idpetugasserah'];
        $n6 = $d['status'];
        $n7 = $d['idpelanggan'];
        $n8 = $d['namapenerima'];
    }
}
?>

<p style="text-align:center">
    <img src="../icons/hh.png" width='40px'><br><br>
    BEM Laundry <br>
    Jl. Perintis Kemerdekaan I, Kayu Putih, Kupang-NTT <br>
    Telp.0812-3963-2000
</p>
<hr>

<table width="100%">
    <tr>
        <td>
            <small>Nota Nomor</small> <br>
            <small>Pelanggan</small> <br>
            <small>Tanggal Terima</small> <br>
            <small>Petugas Penerima</small>
        </td>
        <td>
            <small> : <?php echo $n1; ?></small> <br>
            <small> : <?php echo namapelanggan($n7); ?></small> <br>
            <small> : <?php echo tanggal($n2); ?></small> <br>
            <small> : <?php echo namapetugas1($n3); ?></small>
        </td>
        <td>
            <small>Tanggal Serah</small> <br>
            <small>Petugas Serah</small> <br>
            <small>Status</small>
        </td>
        <td>
            <small> : <?php echo tanggal($n4); ?></small><br>
            <small> : <?php echo namapetugas1($n5); ?></small> <br>
            <small> : <?php echo $n6; ?></small>
        </td>
    </tr>
</table>


<hr>

<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <thead>
        <tr style="background-color:blue;">
            <th style="text-align:center; color:white;"><small>No</small></th>
            <th style="text-align:center; color:white;"><small>Jenis Cucian</small></th>
            <th style="text-align:center; color:white;"><small>Berat</small></th>
            <th style="text-align:center; color:white;"><small>Harga Satuan</th>
            <th style="text-align:center; color:white;"><small>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $gt = 0;
        $no = 1;
        $data = mysqli_query($konektor, "SELECT  * from detailtransaksi where idtransaksi like '$idtransaksi'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td align="center"><small><?php echo $no++ ?></small></td>
                <td align="center"><small><?php echo namajeniscucian($d['idjeniscucian']); ?></small></td>
                <td align="center"><small><?php echo $d['berat']; ?></small></td>
                <td align="center"><small><?php echo rupiah($d['harga']) ?></small></td>
                <td align="center"><small><?php echo rupiah($d['berat'] * $d['harga']) ?></small></td>
            </tr>
            <?php $gt = $gt + ($d['harga'] * $d['berat']) ?>
        <?php }  ?>
    </tbody>
</table>
<hr>

<table>
    <tr>
        <td><small>Grand Total</small> </td>
        <td><small>: <?php echo rupiah($gt); ?></small></td>
    </tr>
    <tr>
        <td><small>Terbilang</small></td>
        <td><small> : <?php echo ucwords(penyebut($gt) . " Rupiah"); ?></small></td>
    </tr>
</table>

<hr>

<table width="100%" cellpadding="20" style="text-align: center; font-size:15px; margin-top:50px;">
    <tr>
        <td><small>
                Kupang, <?php echo tanggal($n2); ?><br>
                Petugas Penerima
            </small></td>
        <td><small>
                Kupang, <?php echo date('d M Y'); ?><br>
                Pelanggan
            </small></td>
        <td><small>
                Kupang, <?php echo tanggal($n4); ?><br>
                Petugas Serah
            </small></td>
    </tr>
    <tr>
        <td><small>
                (<?php echo namapetugas1($n3); ?>)
            </small></td>
        <td><small>
                (<?php echo namapelanggan($n7); ?>)
            </small></td>
        <td><small>
                (<?php echo namapetugas1($n5); ?>)
            </small></td>
    </tr>
</table>

<hr>

<p><small><?php echo "Dicetak Pada Tanggal " . date('d M Y') . " Oleh " . $nama . " Pada Jam " . date("h:i:sa"); ?></small></p>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", "I");
exit;
?>
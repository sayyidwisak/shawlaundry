<?php include "../konektor.php";
include '../getdata.php';
session_start();
?>

<?php if ($_POST['pilihan'] == 'PDF') {
    $nama_dokumen = 'Data Transaksi';
    include("../mpdf60/mpdf.php");
    $mpdf = new mPDF("en-GB-x", "Letter-L", "", "", 10, 10, 10, 10, 6, 3);
    $mpdf->SetHeader('');
    ob_start();
    $status = $_POST['status'];
} else {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Transaksi Menurut Status Transaksi.xls");
    $status = $_POST['status'];
}
$nama = namapetugas($_SESSION['username']);
?>

<p style="text-align:center">
    <img src="../icons/hh.png" width='40px'><br><br>
    BEM Laundry <br>
    Jl. Perintis Kemerdekaan I, Kayu Putih, Kupang-NTT <br>
    Telp.0812-3963-2000
</p>
<hr>

<small>LAPORAN DATA TRANSAKSI</small> <br>
<small>Status Transaksi: <?php echo $status ?></small>
<hr>

<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <thead>
        <tr style="background-color:blue;">
            <th style="color:white;"><small>No</small></th>
            <th style="color:white;"><small>Tanggal Transaksi</small></th>
            <th style="color:white;"><small>Petugas Penerima</small></th>
            <th style="color:white;"><small>Tanggal Serah</small></th>
            <th style="color:white;"><small>Petugas Penyerah</small></th>
            <th style="color:white;"><small>Pelanggan</small></th>
            <th style="color:white;"><small>Jenis Cucian</small></th>
            <th style="color:white;"><small>Berat</small></th>
            <th style="color:white;"><small>Harga</small></th>
            <th style="color:white;"><small>Total</small></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $gt = 0;
        $data = mysqli_query($konektor, "SELECT * FROM transaksi,detailtransaksi WHERE transaksi.idtransaksi=detailtransaksi.idtransaksi and status like '$status'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td align="center"><small><?php echo $no++; ?></small></td>
                <td align="center"><small><?php echo tanggal($d['tanggalterima']); ?></small></td>
                <td align="center"><small><?php echo namapetugas1($d['idpetugasterima']); ?></small></td>

                <td align="center"><small>
                        <center><?php
                                if ($d['tanggalserah'] == '0000-00-00') {
                                    echo '-';
                                } else {
                                    echo tanggal($d['tanggalserah']);
                                }
                                ?>
                    </small></center>
                </td>
                <td align="center"><small><?php echo namapetugas1($d['idpetugasserah']); ?></small></td>
                <td align="center"><small><?php echo namapelanggan($d['idpelanggan']); ?></small></td>
                <td align="center"><small><?php echo namajeniscucian($d['idjeniscucian']); ?></small></td>
                <td style="text-align: center;"><small><?php echo $d['berat']; ?></small></td>
                <td style="text-align: center;"><small><?php echo rupiah($d['harga']); ?></small></td>
                <td style="text-align: center;"><small><?php echo rupiah($d['berat'] * $d['harga']);
                                                        $gt = $gt + $d['berat'] * $d['harga'];
                                                        ?></small></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr>

<table>
    <tr>
        <td><small>Grand Total</small></td>
        <td><small>: <?php echo rupiah($gt); ?></small></td>
    </tr>
    <tr>
        <td><small>Terbilang</small></td>
        <td><small> : <?php echo ucwords(penyebut($gt) . " Rupiah"); ?></small></td>
    </tr>
</table>

<table width="100%" cellpadding="20" style="text-align: center; font-size:15px; margin-top:50px;">
    <tr>
        <td><small>
                Kupang, <?php echo date('d M Y'); ?><br>
                Petugas
            </small></td>
    </tr>
    <tr>
        <td><small>
                (<?php echo $nama; ?>)
            </small></td>
    </tr>
</table>

<hr>

<small><?php echo "Dicetak Pada Tanggal " . date('d M Y') . " Oleh " . $nama . " Pada Jam " . date("h:i:sa"); ?></small>

<?php if ($_POST['pilihan'] == 'PDF') {
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen . ".pdf", 'I');
    exit;
} ?>
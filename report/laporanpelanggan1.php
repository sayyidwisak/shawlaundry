<?php include "../konektor.php";
include '../getdata.php';
session_start();
?>
<?php
$tanggal = date("Y-m-d h:i:sa");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar Pelanggan-" . $tanggal . ".xls");
$nama = namapetugas($_SESSION['username']);
?>

<p style="text-align:center">
    <img src="../icons/hh.png" width='40px'><br><br>
    BEM Laundry <br>
    Jl. Perintis Kemerdekaan I, Kayu Putih, Kupang-NTT <br>
    Telp.0812-3963-2000
</p>
<hr>

<small>LAPORAN DATA PELANGGAN</small>
<hr>


<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <thead>
        <tr style="background-color:blue ;">
            <th style="color:white;"><small>No</small></th>
            <th style="color:white;"><small>Nama</small></th>
            <th style="color:white;"><small>Alamat</small></th>
            <th style="color:white;"><small>Telepon</small></th>
            <th style="color:white;"><small>Email</small></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($konektor, "select * from pelanggan");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td align="center"><small><?php echo $no++; ?></small></td>
                <td align="center"><small><?php echo $d['nama']; ?></small></td>
                <td align="center"><small><?php echo $d['alamat']; ?></small></td>
                <td align="center"><small><?php echo $d['telepon']; ?></small></td>
                <td align="center"><small><?php echo $d['email']; ?></small></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<hr>

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
<p><small><?php echo "Dicetak Pada Tanggal " . date('d M Y') . " Oleh " . $nama . " Pada Jam " . date("h:i:sa"); ?></small></p>
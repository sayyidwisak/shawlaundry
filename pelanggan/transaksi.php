<?php
session_start();
if ($_SESSION['statuspelanggan'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
?>
<?php include '../konektor.php';
include '../getdata.php';
$email = $_SESSION['usernamepelanggan'];
$data2 = mysqli_query($konektor, "SELECT * FROM pelanggan WHERE email like '$email'");
if (mysqli_num_rows($data2)) {
    while ($d2 = mysqli_fetch_array($data2)) {
        $idpelanggan = $d2['idpelanggan'];
        $nama = $d2['nama'];
        $alamat = $d2['alamat'];
        $telepon = $d2['telepon'];
        $tanggal_lahir = $d2['tanggal_lahir'];
    }
}
?>
<html lang="en">

<head>
    <title>BEM | Transaksi Pelanggan</title>
    <?php include '../cdn.php';
    include '../theme/temapelanggan.php';
    ?>
    <link rel="icon" href="../icons/ht.png">
    <style>
        body {
            background-color: #fff2cc;
        }

        @media screen and (max-width: 992px) {
            body {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <?php include '../navbar/navbarpelanggan.php'; ?>


    <div class="container transaksi">

        <h3 class="focus-in-contract">Data Transaksi</h3>
        <hr>
        <input type="text" class="mt-3 form-control mb-3" id="myInput" placeholder="Cari..">
        <?php
        $idpelanggan = cekpelanggan($idpelanggan);
        $data = mysqli_query($konektor, "SELECT * FROM transaksi,detailtransaksi WHERE transaksi.idtransaksi=detailtransaksi.idtransaksi and idpelanggan like '$idpelanggan'");
        if (mysqli_num_rows($data) > 0) { ?>

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover table-sm bg-white" id="myTable">
                    <thead>
                        <tr style="text-align: center;background-color:#FFFDD0;">
                            <th>No</th>
                            <th>Nota</th>
                            <th>Tanggal Terima</th>
                            <th>Petugas Terima</th>
                            <th>Tanggal Serah</th>
                            <th>Petugas Serah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($konektor, "SELECT * from transaksi where idpelanggan like '$idpelanggan'");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><a href="../report/nota.php?idtransaksi=<?php echo $d['idtransaksi']; ?>&nama=<?php echo $nama; ?>" target="_blank">Cetak</a></td>
                                <td align="center"><?php echo tanggal($d['tanggalterima']); ?></td>
                                <td align="center"><?php echo namapetugas1($d['idpetugasterima']); ?></td>
                                <td align="center">
                                    <?php
                                    if ($d['tanggalserah'] == '0000-00-00') {
                                        echo '-';
                                    } else {
                                        echo tanggal($d['tanggalserah']);
                                    } ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($d['idpetugasserah'] == '0') { ?>
                                        <center><?php echo '-'; ?></center>
                                    <?php } else {
                                        echo namapetugas1($d['idpetugasserah']);
                                    } ?>
                                </td>
                                <td align="center"><?php echo $d['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else {
            echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Belum Ada Transaksi Yang Dilakukan</div>";
        ?>
        <?php } ?>

        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    </div>
</body>

</html>
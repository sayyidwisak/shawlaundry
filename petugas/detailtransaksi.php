
<?php include "restrict.php"; ?>
<?php include "../konektor.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../icons/ht.png">
    <title>Shawlaundry | Detail Transaksi</title>
    <?php include "../cdn.php"; ?>
    <?php include "../theme/temapetugas.php"; ?>
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
    <?php include "../navbar/navbarpetugas.php"; ?>
    <?php include '../pesan/pesanpetugas.php'; ?>

    <div class="container detailtransaksi">
        <h3 class="focus-in-contract">Data Detail Transaksi</h3>
        <?php
        $nama = namapetugas($_SESSION['username']);
        ?>
        <hr>
        <div class="row">
            <div class="col-sm-4">

                <?php
                $cek = $_GET['q'];
                $data = mysqli_query($konektor, "SELECT * from transaksi where idtransaksi like '$cek'");
                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                        $n1 = $d['idtransaksi'];
                        $n2 = $d['tanggalterima'];
                        $n3 = $d['idpetugasterima'];
                        $n4 = $d['tanggalserah'];
                        $n5 = $d['idpetugasserah'];
                        $n6 = $d['status'];
                        $n7 = $d['idpelanggan'];
                    }
                }
                ?>
                <table width="100%">
                    <tr>
                        <td>
                            Nama Pelanggan<br>
                            Petugas Terima<br>
                            Tanggal Terima<br>
                            Petugas Serah<br>
                            Tanggal Serah<br>
                            Status

                        </td>
                        <td>
                            : <?php echo namapelanggan($n7); ?> <br>
                            : <?php echo namapetugas1($n3); ?><br>
                            : <?php echo tanggal($n2); ?><br>
                            : <?php echo namapetugas1($n5); ?><br>
                            : <?php
                                if ($n4 == '0000-00-00') {
                                    echo ' ';
                                } else {
                                    echo tanggal($n4);
                                } ?><br>
                            : <?php echo $n6; ?>
                        </td>
                    </tr>
                </table>
                <hr>

                <form method="post" action="../insert/insertdetailtransaksi.php">
                    <!-- Input List Menu Dinamis-->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Jenis Cucian</span>
                        </div>
                        <select name="idjeniscucian" class="custom-select form-control" required>
                            <option value=""></option>
                            <?php
                            $data = mysqli_query($konektor, "select * from jeniscucian");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?php echo $d['idjeniscucian']; ?>"><?php echo $d['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Input Text Field-->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Berat</span>
                        </div>
                        <input type="text" class="form-control" required name="berat">
                    </div>
                    <input type="hidden" name="idtransaksi" value="<?php echo $_GET['q']; ?>">

                    <!-- Input Button-->
                    <?php
                    if (ceksimpantransaksi($_GET['q']) == '0') { ?>
                        <input class="btn tambahdetailtransaksi" type="submit" value="Tambahkan">
                    <?php } else { ?>
                        <input class="d-none" type="submit" value="Tambahkan" disabled>
                    <?php } ?>


                </form>
            </div>
            <div class="col-sm-8">

                <input class="form-control mt-2" id="myInput" type="text" placeholder="Cari..">
                <br>
                <?php
                $data = mysqli_query($konektor, "SELECT * FROM detailtransaksi");
                if (mysqli_num_rows($data) > 0) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm bg-white" id="myTable">
                            <thead>
                                <tr style="text-align: center; background-color:#FFFDD0;">
                                    <th>No</th>
                                    <th>Jenis Cucian</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <?php if (ceksimpantransaksi($_GET['q']) == '0') { ?> <th>Aksi</th> <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $gt = 0;
                                $nilai = $_GET['q'];
                                $no = 1;
                                $data = mysqli_query($konektor, "select * from detailtransaksi where idtransaksi like'$nilai'");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr style="text-align: center;">
                                        <td><?php echo $no++; ?></td>
                                        <td align="left"><?php echo namajeniscucian($d['idjeniscucian']); ?></td>
                                        <td><?php echo $d['berat']; ?></td>
                                        <td><?php echo rupiah($d['harga']); ?></td>
                                        <td><?php echo rupiah($d['berat'] * $d['harga']);
                                            $gt = $gt + ($d['berat'] * $d['harga'])
                                            ?></td>
                                        <?php if (ceksimpantransaksi($_GET['q']) == '0') { ?>
                                            <td>
                                                <a class="btn btn-sm hapusdetailtransaksi" href="../delete/deletedetailtransaksi.php?iddetailtransaksi=<?php echo $d['iddetailtransaksi']; ?> & id=<?php echo $d['idtransaksi']; ?>&nama=<?php echo $d['nama']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        Grand Total: <?php echo rupiah($gt); ?>
                    </div>



                    <?php
                    if ($gt > 0) {
                        if (ceksimpantransaksi($_GET['q']) == '0') { ?>
                            <hr>
                            <form action="../update/spt.php" name="spt1" method="POST">
                                <input type="hidden" name="idtransaksi" value="<?php echo $_GET['q']; ?>">
                                <input type="submit" value="Simpan Permanen" class="btn simperdetailtransaksi">
                            </form>
                        <?php } else { ?>
                            <hr><a target="_blank" href="../report/nota.php?idtransaksi=<?php echo $_GET['q']; ?>&nama=<?php echo $nama; ?>" class="btn btn-warning">Cetak Nota</a>
                    <?php }
                    } ?>

                <?php } else {
                    echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Transaksi Belum Dilakukan</div>";
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
        </div>
    </div>

</body>

</html>
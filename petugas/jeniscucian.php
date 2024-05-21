<?php include "restrict.php"; ?>
<?php include "../konektor.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../icons/laundry.png">
    <title>Shawlaundry | Jenis Cucian</title>
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

            .jeniscucian .row {
                margin-top: -8px;
            }
        }
    </style>
</head>

<body>
    <?php include "../navbar/navbarpetugas.php"; ?>
    <?php include '../pesan/pesanpetugas.php'; ?>

    <div class="container jeniscucian">
        <h3 class="focus-in-contract">Data Jenis Cucian</h3>
        <hr>

        <div class="row">
            <div class="col-sm-2"><a class="btn btn-sm tambahjeniscucian" href="#" data-toggle="modal" data-target="#myModalinsert">Tambah Data&nbsp;<i class="material-icons" style="font-size:16px">&#xe145;</i></a></div>
            <div class="col-sm-10 mt-3"><input class="form-control" id="myInput" type="text" placeholder="Cari.."></div>
        </div>
        <br>

        <?php
        $data = mysqli_query($konektor, "SELECT * FROM jeniscucian");
        if (mysqli_num_rows($data) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm bg-white" id="myTable">
                    <thead>
                        <tr style="text-align: center; background-color:#FFFDD0;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($konektor, "select * from jeniscucian");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td align="center"><?php echo rupiah($d['harga']); ?></td>
                                <td align="center">
                                    <a class="btn ubahjeniscucian btn-sm" href="#" data-toggle="modal" data-target="#myModalupdate<?php echo $d['idjeniscucian'] ?>">Ubah</a>
                                    <?php
                                    $idjeniscucian = $d['idjeniscucian'];
                                    $dataj = mysqli_query($konektor, "SELECT * FROM detailtransaksi where idjeniscucian like '$idjeniscucian'");
                                    if (!mysqli_num_rows($dataj) > 0) { ?>
                                        <a class="btn hapusjeniscucian btn-sm" href="../delete/deletejeniscucian.php?idjeniscucian=<?php echo $d['idjeniscucian'] ?>" onclick="return confirm('yakin ingin menghapus data ini?')">Hapus</a>
                                    <?php } else { ?>
                                        <a class="btn btn-secondary btn-sm">Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModalupdate<?php echo $d['idjeniscucian'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-tittle">Ubah Data Jenis Cucian</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form method="POST" action="../update/updatejeniscucian.php">

                                                <!-- Edit Text Field-->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Nama</span>
                                                    </div>
                                                    <input <?php
                                                            $nama = $d['idjeniscucian'];
                                                            $datac = mysqli_query($konektor, "select * from detailtransaksi where idjeniscucian like '$nama'");
                                                            if (mysqli_num_rows($datac) > 0) {
                                                                echo 'disabled';
                                                            }
                                                            ?> type="text" class="form-control" required name="nama" value="<?php echo $d['nama']; ?>">
                                                </div>


                                                <!-- Edit text field -->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Harga</span>
                                                    </div>
                                                    <input type="number" class="form-control" required name="harga" value="<?php echo $d['harga'] ?>">
                                                </div>
                                                <input type="hidden" name="idjeniscucian" value="<?php echo $d['idjeniscucian'] ?>">
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <input class="btn modalsimpan" type="submit" value="simpan"></form>
                                            <button type="button" class="btn modaltutup" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        <?php } else {
            echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Belum Ada Data Jenis Cucian Yang Tersedia</div>";
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

        <!-- The Modal -->
        <div class="modal fade" id="myModalinsert">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="../insert/insertjeniscucian.php">

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama</span>
                                </div>
                                <input type="text" class="form-control" required name="nama">
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Harga</span>
                                </div>
                                <input class="form-control" required type="text" name="harga">
                            </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Input Button-->
                        <input class="btn btn-success" type="submit" value="Simpan"></form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
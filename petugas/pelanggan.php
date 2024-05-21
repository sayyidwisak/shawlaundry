<?php include "restrict.php"; ?>
<?php include "../konektor.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../icons/hp.png">
    <title>Shawlaundry | Pelanggan</title>
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

            .pelanggan .row {
                margin-top: -8px;
            }
        }
    </style>
</head>

<body>
    <?php include "../navbar/navbarpetugas.php"; ?>
    <?php include '../pesan/pesanpetugas.php'; ?>

    <div class="container pelanggan">
        <h3 class="focus-in-contract">Data Pelanggan</h3>
        <hr>

        <div class="row">
            <div class="col-sm-4">
                <a class="btn btn-sm tambahpelanggan" href="#" data-toggle="modal" data-target="#myModalinsert">Tambah Data&nbsp;<i class="material-icons" style="font-size:16px">&#xe145;</i></a>
                <a target="_blank" href="../report/laporanpelanggan.php" class="btn btn-sm pdfpelanggan">Cetak PDF&nbsp;<i style="font-size:16px" class="fa">&#xf1c1;</i></a>
                <a target="_blank" href="../report/laporanpelanggan1.php" class="btn btn-sm xlspelanggan">Cetak xls&nbsp;<i style="font-size:16px" class="fa">&#xf1c3;</i></a>
            </div>
            <div class="col-sm-8 mt-3"><input class="form-control" id="myInput" type="text" placeholder="Cari.."></div>
        </div>
        <br>

        <?php
        $data = mysqli_query($konektor, "SELECT * FROM pelanggan");
        if (mysqli_num_rows($data) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm bg-white" id="myTable">
                    <thead>
                        <tr style="text-align: center; background-color:#FFFDD0;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($konektor, "select * from pelanggan");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td align="center"><?php echo tanggal($d['tanggal_lahir']); ?></td>
                                <td><?php echo $d['alamat']; ?></td>
                                <td align="center"><?php echo $d['telepon']; ?></td>
                                <td><?php echo $d['email']; ?></td>
                                <td align="center"><?php if ($d['status'] == '0') { ?>
                                        <a href="acc.php?idpelanggan=<?php echo $d['idpelanggan']; ?>" onclick="return confirm('Yakin ingin verifikasi data ini?')"><i style="font-size:15px; color:red;" class="fa">&#xf071;</i></a>
                                    <?php } else if ($d['status'] == '1') { ?>
                                        <i style="font-size:15px;color:green;" class="fa">&#xf00c;</i>
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <a class="btn btn-sm ubahpelanggan" href="#" data-toggle="modal" data-target="#myModalupdate<?php echo $d['idpelanggan'] ?>">Ubah</a>
                                    <?php
                                    $idpelanggan = $d['idpelanggan'];
                                    $datap = mysqli_query($konektor, "SELECT * from transaksi where idpelanggan like '$idpelanggan'");
                                    if (!mysqli_num_rows($datap) > 0) { ?>
                                        <a class="btn btn-sm hapuspelanggan" href="../delete/deletepelanggan.php?idpelanggan=<?php echo $d['idpelanggan'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    <?php } else { ?>
                                        <a class="btn btn-secondary btn-sm">Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModalupdate<?php echo $d['idpelanggan'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-tittle">Ubah Data Pelanggan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <form method="post" action="../update/updatepelanggan.php">

                                                <!-- Edit text field -->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Nama</span>
                                                    </div>
                                                    <input type="text" class="form-control" required name="nama" value="<?php echo $d['nama'] ?>">
                                                </div>

                                                <!-- Edit Text Field -->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Alamat</span>
                                                    </div>
                                                    <input type="text" class="form-control" required name="alamat" value="<?php echo $d['alamat'] ?>">
                                                </div>

                                                <!-- Edit text field -->

                                                <input type="hidden" name="telepon" value="<?php echo $d['telepon'] ?>">


                                                <!-- Edit text field -->

                                                <input type="hidden" name="email" value="<?php echo $d['email'] ?>">


                                                <!-- Edit Text Field-->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Password</span>
                                                    </div>
                                                    <input type="password" class="form-control" required name="password" value="<?php echo $d['password']; ?>">
                                                </div>
                                                <input type="hidden" name="idpelanggan" value="<?php echo $d['idpelanggan'] ?>">

                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <!-- Input button -->
                                            <input type="submit" class="btn modalsimpan" value="Simpan"></form>
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
            echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Data Tidak Tersedia</div>";
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
                        <form method="post" action="../insert/insertpelanggan.php">

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
                                    <span class="input-group-text">Tanggal Lahir</span>
                                </div>
                                <input type="date" class="form-control" required name="tanggal_lahir">
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Alamat</span>
                                </div>
                                <input type="text" class="form-control" required name="alamat">
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Telepon</span>
                                </div>
                                <input type="number" class="form-control" required name="telepon">
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email</span>
                                </div>
                                <input type="email" class="form-control" required name="email">
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Password</span>
                                </div>
                                <input type="password" class="form-control" required name="password">
                            </div>




                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Input Button-->
                        <input class="btn modalsimpan" type="submit" value="Simpan"></form>
                        <button type="button" class="btn modaltutup" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
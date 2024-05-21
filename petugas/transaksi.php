<?php include "restrict.php"; ?>
<?php include "../konektor.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../icons/ht.png">
    <title>Shawlaundry | Transaksi</title>
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
    <?php include '../pesan/pesanpetugas.php'; ?>


    <?php include "../navbar/navbarpetugas.php";
    $idpetugas = idpetugas($_SESSION['username']);
    ?>
    <div class="container transaksi">
        <h3 class="focus-in-contract">Data Transaksi</h3>
        <hr>

        <div class="row">
            <div class="col-md-2">
                <a href="#" class="btn btn-sm tambahtransaksi" data-toggle="modal" data-target="#myModalinsert">Tambah Data&nbsp;<i class="material-icons" style="font-size:16px">&#xe145;</i></a>
            </div>

            <div class="col-md-2">

                <div class="dropdown">
                    <button class="btn cetaklaporan btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        Cetak Laporan
                    </button>
                    <ul class="dropdown-menu">
                        <li> <a href="#" class="dropdown-item laporandd" data-toggle="modal" data-target="#myModallpp">Laporan Menurut Periode</a></li>
                        <li> <a href="#" class="dropdown-item laporandd" data-toggle="modal" data-target="#myModallst">Laporan Menurut Status</a></li>
                        <li> <a href="#" class="dropdown-item laporandd" data-toggle="modal" data-target="#myModallmp">Laporan Menurut Pelanggan</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <input type="text" class="form-control mt-3" id="myInput" placeholder="Cari...">
            </div>
        </div>
        <br>
        <?php
        $data = mysqli_query($konektor, "SELECT * FROM transaksi");
        if (mysqli_num_rows($data) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm bg-white" id="myTable">
                    <thead>
                        <tr style="text-align: center; background-color:#FFFDD0;">
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Terima</th>
                            <th>Petugas Penerima</th>
                            <th>Tanggal Serah</th>
                            <th>Petugas Penyerah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($konektor, "select * from transaksi");
                        while ($d = mysqli_fetch_array($data)) {
                            $val = $d['simpan'];
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><a href="detailtransaksi.php?q=<?php echo $d['idtransaksi']; ?>">Detail</a></td>
                                <td align="center"><?php echo namapelanggan($d['idpelanggan']); ?></td>
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
                                <td align="center">
                                    <?php if ($d['status'] == 'Selesai') { ?>
                                        <i style="font-size:15px;color:green;" class="fa statusselesai">&#xf00c;</i>
                                    <?php } else { ?>
                                        <a class="btn ubahtransaksi btn-sm" href="#" data-toggle="modal" data-target="#myModalupdate<?php echo $d['idtransaksi'] ?>">Ubah</a>
                                    <?php } ?>

                                    <?php if (ceksimpantransaksi($d['idtransaksi']) == '0') { ?>
                                        <a class="btn hapustransaksi btn-sm" href="../delete/deletetransaksi.php?idtransaksi=<?php echo $d['idtransaksi'] ?>" onclick="return confirm('Yakin Ingin menghapus data ini?')">Hapus</a>
                                    <?php } else { ?>
                                        <a class="btn btn-secondary btn-sm">Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr>

                            <!-- The Modal -->
                            <div class=" modal fade" id="myModalupdate<?php echo $d['idtransaksi'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Transaksi</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <!-- Form ubah data menyatu dengan form index-->
                                            <form onsubmit="return confirm('Yakin ingin mengubah data ini?')" method="post" action="../update/updatetransaksi.php">

                                                <!-- Edit List Menu Dinamis-->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Pelanggan</span>
                                                    </div>
                                                    <?php
                                                    $data3 = mysqli_query($konektor, "select * from pelanggan"); ?>
                                                    <select <?php if ($val == '1') { ?> disabled <?php } ?> class='form-control' required name='idpelanggan'>
                                                        <?php $existingid = $d['idpelanggan'];
                                                        while ($d3 = mysqli_fetch_array($data3)) {
                                                            if ($existingid == $d3['idpelanggan'])
                                                                echo "<option selected='selected' value='" . $d3['idpelanggan'] . "'>" . $d3['nama'] . "</option>";
                                                            else
                                                                echo "<option value='" . $d3['idpelanggan'] . "'>" . $d3['nama'] . "</option>";
                                                        }
                                                        echo "</select>";
                                                        ?>
                                                </div>

                                                <!-- Edit Text Field-->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tanggal Transaksi</span>
                                                    </div>
                                                    <input <?php if ($val == '1') { ?> disabled <?php } ?> type="date" class="form-control" required name="tanggalterima" value="<?php echo $d['tanggalterima']; ?>">
                                                </div>

                                                <!-- Edit List Menu Dinamis-->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Petugas Penerima</span>
                                                    </div>
                                                    <?php
                                                    $data1 = mysqli_query($konektor, "select * from petugas"); ?>
                                                    <select <?php if ($val == '1') { ?> disabled <?php } ?> class='form-control' required name='idpetugasterima'>
                                                        <?php $existingid = $d['idpetugasterima'];
                                                        while ($d1 = mysqli_fetch_array($data1)) {
                                                            // cek jika $existingid sama dengan yang dipilih untuk ditampilkan
                                                            if ($existingid == $d1['idpetugas'])
                                                                echo "<option selected='selected' value='" . $d1['idpetugas'] . "'>" . $d1['nama'] . "</option>";
                                                            else
                                                                echo "<option value='" . $d1['idpetugas'] . "'>" . $d1['nama'] . "</option>";
                                                        }
                                                        echo "</select>";
                                                        ?>
                                                </div>

                                                <!-- Edit text field -->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tanggal Serah</span>
                                                    </div>
                                                    <input type="date" class="form-control" name="tanggalserah" value="<?php echo $d['tanggalserah'] ?>">
                                                </div>

                                                <!-- Edit list menu dinamis -->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Petugas Penyerah</span>
                                                    </div>
                                                    <?php
                                                    $data2 = mysqli_query($konektor, "select * from petugas");
                                                    echo "<select class='form-control' name='idpetugasserah'>";
                                                    echo "<option value=''></option>";
                                                    $existingid = $d['idpetugasserah'];
                                                    while ($d2 = mysqli_fetch_array($data2)) {
                                                        if ($existingid == $d2['idpetugas'])
                                                            echo "<option selected='selected' value='" . $d2['idpetugas'] . "'>" . $d2['nama'] . "</option>";
                                                        else
                                                            echo "<option value='" . $d2['idpetugas'] . "'>" . $d2['nama'] . "</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div>

                                                <!-- Edit list menu dinamis -->
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Status</span>
                                                    </div>
                                                    <select name="status" class="custom-select form-control" required>
                                                        <option value="Diterima">Diterima</option>
                                                        <option value="Dicuci">Dicuci</option>
                                                        <option value="Dikeringkan">Dikeringkan</option>
                                                        <option value="Disetrika">Disetrika</option>
                                                        <option value="Dibungkus">Dibungkus</option>
                                                        <option value="Siap Diambil">Siap Diambil</option>
                                                        <option value="Selesai">Selesai</option>
                                                    </select>
                                                </div>


                                                <input type="hidden" name="idtransaksi" value="<?php echo $d['idtransaksi'] ?>">
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
                        <form method="post" action="../insert/inserttransaksi.php">

                            <!-- Input List Menu Dinamis-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pelanggan</span>
                                </div>
                                <select name="idpelanggan" class="custom-select form-control" required>
                                    <option value=""></option>
                                    <?php
                                    $data2 = mysqli_query($konektor, "select * from pelanggan");
                                    while ($d2 = mysqli_fetch_array($data2)) {
                                    ?>
                                        <option value="<?php echo $d2['idpelanggan']; ?>"><?php echo $d2['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tanggal Transaksi</span>
                                </div>
                                <input type="date" class="form-control" required name="tanggalterima">
                            </div>
                            <!-- Input List Menu Dinamis-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Petugas Penerima</span>
                                </div>
                                <select name="idpetugasterima" class="custom-select form-control" required>
                                    <option value=""></option>
                                    <?php
                                    $data = mysqli_query($konektor, "select * from petugas");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <option value="<?php echo $d['idpetugas']; ?>"><?php echo $d['nama']; ?></option>
                                    <?php } ?>  
                                </select>
                            </div>

                            <!-- Input Text Field-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tanggal Serah</span>
                                </div>
                                <input type="date" class="form-control" name="tanggalserah">
                            </div>

                            <!-- Input List Menu Dinamis-->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Petugas Penyerah</span>
                                </div>
                                <select name="idpetugasserah" class="custom-select form-control">
                                    <option value=""></option>
                                    <?php
                                    $data1 = mysqli_query($konektor, "select * from petugas");
                                    while ($d1 = mysqli_fetch_array($data1)) {
                                    ?>
                                        <option value="<?php echo $d1['idpetugas']; ?>"><?php echo $d1['nama']; ?></option>
                                    <?php } ?>
                                </select>
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

        <!-- Modal -->
        <div class="modal fade" id="myModallmp">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h4 class="modal-tittle">Pelanggan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form method="post" action="../report/laporanmnrtpelanggan.php" target="_blank">
                            <!-- Input List Menu Dinamis -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama</span>
                                </div>
                                <select name="idpelanggan" class="custom-select form-control" required>
                                    <?php
                                    $datap = mysqli_query($konektor, "select * from pelanggan");
                                    while ($dp = mysqli_fetch_array($datap)) {
                                    ?>
                                        <option value="<?php echo $dp['idpelanggan']; ?>"><?php echo $dp['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Input List Menu Dinamis -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pilihan</span>
                                </div>
                                <select name="pilihan" class="custom-select form-control" required>
                                    <option value="PDF">PDF</option>
                                    <option value="xls">xls</option>
                                </select>
                            </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" value="Cetak"></form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModallpp">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h4 class="modal-tittle">Periode Laporan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form method="post" action="../report/laporanperiode.php" target="_blank">
                            <div class="input-group mb-2">
                                <span class="input-group-text">Mulai</span>
                                <input class="form-control" required type="date" name="mulai">
                            </div>

                            <div class="input-group mb-2">
                                <span class="input-group-text">Selesai</span>
                                <input class="form-control" required type="date" name="selesai">
                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pilihan</span>
                                </div>
                                <select name="pilihan" class="custom-select form-control" required>
                                    <option value="PDF">PDF</option>
                                    <option value="xls">xls</option>
                                </select>
                            </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" value="Cetak"></form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>


                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModallst">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h4 class="modal-tittle">Status Transaksi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="input-group-prepend">
                            <form method="post" action="../report/laporanstatustransaksi.php" target="_blank">

                                <!-- Input List Menu Dinamis -->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Status</span>
                                    </div>
                                    <select name="status" class="custom-select form-control" required>
                                        <option value="Diterima">Diterima</option>
                                        <option value="Dicuci">Dicuci</option>
                                        <option value="Dikeringkan">Dikeringkan</option>
                                        <option value="Disetrika">Disetrika</option>
                                        <option value="Dibungkus">Dibungkus</option>
                                        <option value="Siap Diambil">Siap Diambil</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Pilihan</span>
                                    </div>
                                    <select name="pilihan" class="custom-select form-control" required>
                                        <option value="PDF">PDF</option>
                                        <option value="xls">xls</option>
                                    </select>
                                </div>

                        </div>
                        <!-- Footer -->
                        <div class="modal-footer">
                            <input class="btn btn-success" type="submit" value="Cetak"></form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>

</body>

</html>
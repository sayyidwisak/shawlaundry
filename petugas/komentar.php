<?php include "restrict.php"; ?>
<?php include "../konektor.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../icons/comment.png">
    <title>BEM | Pesan</title>
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

    <div class="container jeniscucian">
        <h3 class="focus-in-contract">Data Pesan</h3>
        <hr>
        <div class="row">
            <div class="col-sm mt-1"><input class="form-control" id="myInput" type="text" placeholder="Cari.."></div>
        </div>
        <br>
        <?php
        $data = mysqli_query($konektor, "SELECT * FROM komentar");
        if (mysqli_num_rows($data) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm bg-white" id="myTable">
                    <thead>
                        <tr style="text-align: center; background-color:#FFFDD0;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($konektor, "select * from komentar");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $d['nama']; ?></td>
                                <td align="center"><?php echo $d['email']; ?></td>
                                <td align="center"><?php echo $d['pesan']; ?></td>
                                <td align="center"><a class="btn hapusjeniscucian btn-sm" href="../delete/deletekomentar.php?idkomentar=<?php echo $d['idkomentar'] ?>" onclick="return confirm('yakin ingin menghapus data ini?')">Hapus</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        <?php } else {
            echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Belum Ada Komentar</div>";
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
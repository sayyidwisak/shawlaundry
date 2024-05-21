<?php
session_start();
if ($_SESSION['statuspelanggan'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include '../konektor.php';
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
<!doctype html>
<html lang="en">

<head>
    <?php include '../cdn.php'; ?>
    <title>Kartu Pelanggan</title>
    <script src="../convertjpg/html2canvas.js"></script>
    <script type="text/javascript">
        function downloadimage() {
            var container = document.getElementById("htmltoimage");
            html2canvas(container, {
                allowTaint: true
            }).then(function(canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "Kartu_Pelanggan.jpg";
                link.href = canvas.toDataURL();
                link.target = '_blank';
                link.click();

            });
        }
    </script>


    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .download {
            font-size: 15px;
            background-color: blue;
            margin-top: 25px;
            color: white;
        }

        .download:hover {
            font-size: 16px;
            color: black;
            background-color: #fffaeb;
        }

        .shaw {
            width: 600px;
            height: 250px;
            margin-top: 25px;
            background-image: url('../img/shawlaundry.png');
            padding: 25px;
        }

        table {
            font-size: large;
        }
    </style>

</head>

<body>

    <div align="center">
        <div id="htmltoimage" class="shaw">
            <h3><img src="../icons/laundry.png" width="35" style="margin-right: 20px;" alt="icon">Kartu Pelanggan Shawlaundry</h3>
            <hr>
            <table class="mt-4" width="100%">
                <tbody>
                    <tr>
                        <td>
                            Nama <br>
                            Alamat <br>
                            Email <br>
                            Telepon <br>
                            tanggal Lahir
                        </td>
                        <td>
                            : <?php echo $nama ?><br>
                            : <?php echo $alamat ?><br>
                            : <?php echo $email ?><br>
                            : <?php echo $telepon ?> <br>
                            : <?php echo $tanggal_lahir ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-sm download" onclick="downloadimage()"><i class="fa">&#xf019;</i> Download jpg</a>
    </div>

</body>

</html>
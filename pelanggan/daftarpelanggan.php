<?php "../konektor.php"; ?>
<html lang="en">

<head>
    <?php include '../cdn.php';
    include '../theme/temadaftarpelanggan.php';
    ?>
    <link rel="icon" href="../icons/signup.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>Daftar Pelanggan</title>
    <style>
        body {
            background-color: #fff2cc;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand judul" href="daftarpelanggan.php">BEM | STIKOM</a>
            <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php"><i style='font-size:15px' class='fas'>&#xf3e5;</i>&nbsp;Kembali</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo " 
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Email Atau Telepon Yang Anda Masukkan Tidak Tersedia, Silahkan Daftar Dengan Data Yang Lain',
                                })
                            </script>
                            ";
        }
    }
    ?>

    <section class="login">
        <div class="form">
            <form action="regis.php" method="post">
                <h2>Daftar Pelanggan</h2>
                <div class="user-box">
                    <input autocomplete="off" id="email" type="email" name="email" required="">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input autocomplete="off" type="text" name="nama" required="">
                    <label>Nama</label>
                </div>
                <div class="user-box">
                    <input autocomplete="off" type="text" name="alamat" required="">
                    <label>Alamat</label>
                </div>
                <div class="user-box">
                    <input class="input_tanggal_lahir" value="none" type="date" name="tanggal_lahir" required="">
                    <label class="tanggal_lahir">Tanggal Lahir</label>
                </div>
                <div class="user-box">
                    <input autocomplete="off" type="number" name="telepon" required="">
                    <label>Telepon</label>
                </div>
                <div class="user-box">
                    <input autocomplete="off" type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <center>
                    <div class="submit">
                        <input class="a" type="submit" value="SEND">
                        <span></span>
                    </div>
                </center>
            </form>
        </div>
    </section>

    <script>
        $("#email").on({
            keydown: function(e) {
                if (e.which === 32)
                    return false;
            },
            keyup: function() {
                this.value = this.value.toLowerCase();
            },
            change: function() {
                this.value = this.value.replace(/\s/g, "");

            }
        });
    </script>

</body>

</html>
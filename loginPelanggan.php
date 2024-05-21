<?php "konektor.php"; ?>
<html lang="en">

<head>
    <?php include 'cdn.php';
    include 'theme/temalogin.php';
    ?>
    <link rel="icon" href="icons/signin.png">
    <title>BEM | Login Pelanggan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
                        <a class="nav-link" href="index.php"><i style='font-size:15px' class='fas'>&#xf3e5;</i>&nbsp;Kembali</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <?php include "pesan/pesanlogin.php"; ?>


    <section class="login">
        <div class="form">
            <form action="pelanggan/cekLogin.php" method="post">
                <h2>Login Pelanggan</h2>
                <div class="user-box">
                    <input autocomplete="off" id="email" type="email" name="email" required="">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input autocomplete="off" type="password" name="pass" required="">
                    <label>Password</label>
                </div>
                <a style="font-size: 15px;" href="" data-toggle="modal" data-dismiss="modal" data-target="#lupapass">Lupa Password?</a>
                <center>
                    <div class="submit">
                        <input class="a" type="submit" value="SEND">
                        <span></span>
                    </div>
                </center>
            </form>
        </div>
    </section>

    <!-- Modal Lupa Password Pelanggan -->
    <div class="modal fade" id="lupapass">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="color:black ;">Lupa Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="col-sm-10 mx-auto">
                        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_b0lj6sfx.json" background="transparent" speed="0.7" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                        <form method="POST" action="pelanggan/lupapass.php">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email</span>
                                </div>
                                <input class="form-control" required type="text" name="email" placeholder="Masukkan Email">
                            </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" value="Kirim"></form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>

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
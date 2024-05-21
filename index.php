<?php include 'konektor.php';
include 'getdata.php'; ?>
<html lang="en">

<head>
    <?php include 'cdn.php';
    include 'theme/temaindex.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="icon" href="icons/hh.png">
    <title>BEM | Uyelindo</title>
    <style>
        @media screen and (min-width:992px) {
            .mobile {
                display: none;
            }
        }

        @media screen and (max-width:992px) {
            .computer {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="computer">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "berhasilkirim") {
                echo "
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success...',
                                        text: 'Pesan Berhasil Dikirim',
                                        showConfirmButton: false,
                                        timer: 1500
                                        })
                                </script>
                                ";
            }
        }
        ?>

        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
                <a class="navbar-brand judul" href="index.php">BEM Uyelindo</a>
                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home"><i style="font-size:17px" class="fa">&#xf015;</i>&nbsp;Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about"><i style="font-size:17px" class="fa fa-solid fa-info"></i>&nbsp;About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact"><i style="font-size:15px" class="fa">&#xf2b9;</i>&nbsp;Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i style='font-size:15px' class='fas'>&#xf2f6;</i>&nbsp;Login
                            </a>
                            <div class="dropdown-content">
                                <a class="dropdown-item loginptg" href="loginPetugas.php">Petugas</a>
                                <a class="dropdown-item loginplg" href="loginPelanggan.php">Pelanggan</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div id="home" class="jumbotron jumbotron-fluid banner">
            <div class="container">
                <h1 align="center">Selamat Datang Di ShawLaundry</h1>
                <p align="center">Website Laundry Terbaik, Terdepan Dan Terpercaya</p>
                <div class="text-center">
                    <a href="pelanggan/daftarpelanggan.php" class="btn btn-md daftarpelanggan"><i class="fa fa-user-plus"></i>&nbsp;Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <!-- akhir Jumbotron -->

        <?php include "pesan/pesanindex.php"; ?>

        <div class="all">
            <div id="about" class="container about-us">
                <h2 data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="mb-3">About Us</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <center><img data-aos="fade-right" data-aos-anchor-placement="top-center" data-aos-duration="900" src="img/logoBEM.png" alt="Logo BEM"></center>
                    </div>
                    <div data-aos="fade-left" data-aos-anchor-placement="top-center" data-aos-duration="900" class="col-sm-6" style="padding-top:  25px;">
                        <div class="about-us-title">Website BEM Laundry</div>
                        <hr>
                        <p align="justify">BEM Laundry merupakan Website yang bertujuan untuk memudahkan masyarakat yang sangat sibuk sehingga tidak sempat untuk mencuci pakaiannya sendiri.<br>Pelanggan bisa dengan mudah menghubungi Petugas BEM Laundry, kemudian Petugas yang menjemput cucian Pelanggan tersebut.</p>
                    </div>
                </div>
                <div class="information">
                    <div class="row">
                        <div data-aos="fade-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="900" class="col-sm-6">
                            <h4 class="sub">Jenis Cucian</h4>
                            <hr>
                            <p align="justify">Terdapat beberapa Jenis Cucian yang diterima di BEM Laundry, seperti yang dapat dilihat pada tabel Jenis Cucian tersebut.<br>Nama Jenis Cucian serta Harganya sewaktu-waktu dapat bertambah ataupun berubah tanpa ada pemberitahuan.</p>
                        </div>
                        <div data-aos="fade-left" data-aos-anchor-placement="bottom-bottom" data-aos-duration="900" class="col-sm-6">
                            <?php
                            $data = mysqli_query($konektor, "SELECT * FROM jeniscucian");
                            if (mysqli_num_rows($data) > 0) { ?>
                                <table class="table table-bordered table-sm table-hover bg-white">
                                    <thead>
                                        <tr style="background-color:#FFFDD0;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga/g</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($konektor, "select * from jeniscucian");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td align="center"><?php echo $d['nama']; ?></td>
                                                <td align="center"><?php echo rupiah($d['harga']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Belum Ada Data Jenis Cucian Yang Tersedia</div>";
                            ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container whyus">
                <h2 data-aos="zoom-in-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="200">Why Us</h2><br>
                <div class="row text-center">
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="700" class="container whyus1">
                            <img src="img/whyus1.png">
                            <p>Penjadwalan penjemputan dan pengantaran sesuai kenyamanan Anda.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container whyus2">
                            <img src="img/whyus2.png">
                            <p>Kami tidak menggunakan produk yang berbahaya terhadap pakaian Anda.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container whyus3">
                            <img src="img/whyus3.png">
                            <p>Pakaian akan diantarkan dengan aman sampai depan pintu rumah Anda.</p>
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="700" class="col-md">
                        <div class="container wyus4">
                            <img src="img/whyus4.png">
                            <p>Harga yang ditawarkan di Shawlaundry sangat ramah kantong.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container services">
                <h2 data-aos="zoom-in-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900">Services</h2><br>
                <div class="row">
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/pencucian.png">
                            <h5>Pencucian</h5>
                            <p>Pakaian Pelanggan yang kotor akan dicuci oleh Petugas hingga bersih.</p>
                        </div>

                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="container">
                            <img src="img/pengeringan.png">
                            <h5>Pengeringan</h5>
                            <p>Setelah pakaian dicuci bersih, pakaian tersebut akan dikeringkan.</p>
                        </div>

                    </div>
                    <div class="col-md">
                        <div data-aos="fade-left" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/penyetrikaan.png">
                            <h5>Penyetrikaan</h5>
                            <p>Pakaian yang telah dikeringkan akan di setrika agar tidak kusut.</p>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/pengharuman.png">
                            <h5>Pengharuman</h5>
                            <p>Pakaian yang sudah di setrika akan diberi pengharum khas Shawlaundry.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="container">
                            <img src="img/pengemasan.png">
                            <h5>Pengemasan</h5>
                            <p>Pakaian akan di kemas di dalam tempat yang telah ditentukan oleh Pelanggan.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="fade-left" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/pengantaran.png">
                            <h5>Pengantaran</h5>
                            <p>Pakaian akan diantarkan oleh Petugas ke lokasi yang telah ditentukan oleh Pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <section id="contact" class="contact-us">
                <div class="container">
                    <h2 data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="contact-h2">Contact Us</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <iframe data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d677.8698008479491!2d123.62252426149576!3d-10.162979452289497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56834e0db12415%3A0x4adc2c26430f6087!2sSTIKOM%20Uyelindo%20Kupang!5e0!3m2!1sid!2sid!4v1682952982181!5m2!1sid!2sid" width="100%" height="400" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-6">
                            <form data-aos="fade-left" data-aos-anchor-placement="center-bottom" data-aos-duration="900" action="insert/insertkomentar.php" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" required />
                                </div>
                                <div class="mb-3">
                                    <label for="email" clas s="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="your@email.com" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                                    <textarea class="form-control" name="pesan" id="exampleFormControlTextarea1" rows="8"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
            <p class="text-center bg-dark text-white p-2">© 2021 Copyright: sayyidwisak</p>
        </footer>
    </div>

    <div class="mobile">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "berhasilkirim") {
                echo "
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success...',
                                        text: 'Pesan Berhasil Dikirim',
                                        showConfirmButton: false,
                                        timer: 1500
                                        })
                                </script>
                                ";
            }
        }
        ?>

        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
                <a class="navbar-brand judul" href="index.php">BEM Uyelindo</a>
                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home"><i style="font-size:17px" class="fa">&#xf015;</i>&nbsp;Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about"><i style="font-size:17px" class="fa fa-solid fa-info"></i>&nbsp;About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact"><i style="font-size:15px" class="fa">&#xf2b9;</i>&nbsp;Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i style='font-size:15px' class='fas'>&#xf2f6;</i>&nbsp;Login
                            </a>
                            <div class="dropdown-content">
                                <a class="dropdown-item loginptg" href="loginPetugas.php">Petugas</a>
                                <a class="dropdown-item loginplg" href="loginPelanggan.php">Pelanggan</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div id="home" class="jumbotron jumbotron-fluid banner">
            <div class="container">
                <h1 align="center">Selamat Datang Di STIKOM Laundry</h1>
                <p align="center">Website Laundry Terbaik, Terdepan Dan Terpercaya</p>
                <div class="text-center">
                    <a href="pelanggan/daftarpelanggan.php" class="btn btn-md daftarpelanggan"><i class="fa fa-user-plus"></i>&nbsp;Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <!-- akhir Jumbotron -->

        <?php include "pesan/pesanindex.php"; ?>

        <div class="all">
            <div id="about" class="container about-us">
                <h2 data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="mb-3">About Us</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <center><img data-aos="fade-right" data-aos-anchor-placement="top-center" data-aos-duration="900" src="img/logoBEM.png" alt="Logo BEM"></center>
                    </div>
                    <div data-aos="fade-right" data-aos-anchor-placement="top-center" data-aos-duration="900" class="col-sm-6" style="padding-top:  25px;">
                        <div class="about-us-title">Website BEM Laundry</div>
                        <hr>
                        <p align="justify">BEM Laundry merupakan Website yang bertujuan untuk memudahkan masyarakat yang sangat sibuk sehingga tidak sempat untuk mencuci pakaiannya sendiri.<br>Pelanggan bisa dengan mudah menghubungi Petugas BEM Laundry, kemudian Petugas yang menjemput cucian Pelanggan tersebut.</p>
                    </div>
                </div>
                <div class="information">
                    <div class="row">
                        <div data-aos="fade-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="900" class="col-sm-6">
                            <h4 class="sub">Jenis Cucian</h4>
                            <hr>
                            <p align="justify">Terdapat beberapa Jenis Cucian yang diterima di BEM Laundry, seperti yang dapat dilihat pada tabel Jenis Cucian tersebut.<br>Nama Jenis Cucian serta Harganya sewaktu-waktu dapat bertambah ataupun berubah tanpa ada pemberitahuan.</p>
                        </div>
                        <div data-aos="fade-right" data-aos-anchor-placement="bottom-bottom" data-aos-duration="900" class="col-sm-6">
                            <?php
                            $data = mysqli_query($konektor, "SELECT * FROM jeniscucian");
                            if (mysqli_num_rows($data) > 0) { ?>
                                <table class="table table-bordered table-sm table-hover bg-white">
                                    <thead>
                                        <tr style="background-color:#FFFDD0;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga/g</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($konektor, "select * from jeniscucian");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td align="center"><?php echo $d['nama']; ?></td>
                                                <td align="center"><?php echo rupiah($d['harga']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else {
                                echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Belum Ada Data Jenis Cucian Yang Tersedia</div>";
                            ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container whyus">
                <h2 data-aos="zoom-in-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="200">Why Us</h2><br>
                <div class="row text-center">
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="700" class="container whyus1">
                            <img src="img/whyus1.png">
                            <p>Penjadwalan penjemputan dan pengantaran sesuai kenyamanan Anda.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container whyus2">
                            <img src="img/whyus2.png">
                            <p>Kami tidak menggunakan produk yang berbahaya terhadap pakaian Anda.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container whyus3">
                            <img src="img/whyus3.png">
                            <p>Pakaian akan diantarkan dengan aman sampai depan pintu rumah Anda.</p>
                        </div>
                    </div>
                    <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="700" class="col-md">
                        <div class="container wyus4">
                            <img src="img/whyus4.png">
                            <p>Harga yang ditawarkan di Shawlaundry sangat ramah kantong.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container services">
                <h2 data-aos="zoom-in-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900">Services</h2><br>
                <div class="row">
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/pencucian.png">
                            <h5>Pencucian</h5>
                            <p>Pakaian Pelanggan yang kotor akan dicuci oleh Petugas hingga bersih.</p>
                        </div>

                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="container">
                            <img src="img/pengeringan.png">
                            <h5>Pengeringan</h5>
                            <p>Setelah pakaian dicuci bersih, pakaian tersebut akan dikeringkan.</p>
                        </div>

                    </div>
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/penyetrikaan.png">
                            <h5>Penyetrikaan</h5>
                            <p>Pakaian yang telah dikeringkan akan di setrika agar tidak kusut.</p>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/pengharuman.png">
                            <h5>Pengharuman</h5>
                            <p>Pakaian yang sudah di setrika akan diberi pengharum khas Shawlaundry.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="container">
                            <img src="img/pengemasan.png">
                            <h5>Pengemasan</h5>
                            <p>Pakaian akan di kemas di dalam tempat yang telah ditentukan oleh Pelanggan.</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" data-aos-delay="300" class="container">
                            <img src="img/pengantaran.png">
                            <h5>Pengantaran</h5>
                            <p>Pakaian akan diantarkan oleh Petugas ke lokasi yang telah ditentukan oleh Pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <section id="contact" class="contact-us">
                <div class="container">
                    <h2 data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="900" class="contact-h2">Contact Us</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <iframe data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d677.8698008479491!2d123.62252426149576!3d-10.162979452289497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56834e0db12415%3A0x4adc2c26430f6087!2sSTIKOM%20Uyelindo%20Kupang!5e0!3m2!1sid!2sid!4v1682952982181!5m2!1sid!2sid" width="100%" height="400" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-md-6">
                            <form data-aos="fade-right" data-aos-anchor-placement="center-bottom" data-aos-duration="900" action="insert/insertkomentar.php" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" required />
                                </div>
                                <div class="mb-3">
                                    <label for="email" clas s="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="your@email.com" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                                    <textarea class="form-control" name="pesan" id="exampleFormControlTextarea1" rows="8"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
            <p class="text-center bg-dark text-white p-2">© 2021 Copyright: sayyidwisak</p>
        </footer>
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
        AOS.init();
        // AOS.init({
        //     disable: 'mobile'
        // });
    </script>

</body>

</html>
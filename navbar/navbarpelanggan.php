<?php
$email = namapelanggan1($_SESSION['usernamepelanggan']);
?>

<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <a class="navbar-brand judul">BEM Uyelindo</a>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="beranda.php"><i style="font-size:17px" class="fa">&#xf015;</i>&nbsp;Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php"><i class='fa fa-book mx-auto' style='font-size:17px;'></i>&nbsp;Transaksi</a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" onclick="return confirm('Yakin ingin Logout?')"><i style='font-size:15px' class='fas'>&#xf2f5;</i>&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>`
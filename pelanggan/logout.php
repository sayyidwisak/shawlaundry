    <?php
    session_start();
    $_SESSION['statuspelanggan'] = '';
    $_SESSION['usernamepelanggan'] = '';

    unset($_SESSION['statuspelanggan']);
    unset($_SESSION['usernamepelanggan']);

    session_unset();
    session_destroy();

    header("location:../index.php");
    ?>
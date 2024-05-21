<?php
session_start();

$_SESSION['status'] = '';
$_SESSION['username'] = '';

unset($_SESSION['status']);
unset($_SESSION['username']);

session_unset();
session_destroy();

header("location:../index.php");

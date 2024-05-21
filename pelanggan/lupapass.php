<?php
include '../konektor.php';
include '../getdata.php';

$email = filter($_POST['email']);

$data = mysqli_query($konektor, "SELECT * FROM pelanggan WHERE email LIKE '$email'");
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        $nama = $d['nama'];
        $password = $d['password'];
    }
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Required variables
  $FROMEMAIL  = '"Shawlaundry" <sayid.vision.wisak@gmail.com>';
  $TOEMAIL    = $email;
  $SUBJECT    = "Lupa Password";
  $PLAINTEXT  = "Password Anda : $password";
  $RANDOMHASH = "anyrandomhash";
  $FICTIONALSERVER = "@email.myownserver.com";


  // Basic headers
  $headers = "From: " . $FROMEMAIL . "\n";
  $headers .= "Reply-To: " . $FROMEMAIL . "\n";
  $headers .= "Return-path: " . $FROMEMAIL . "\n";
  $headers .= "Message-ID: <" . $RANDOMHASH . $FICTIONALSERVER . ">\n";

  $headers .= "Dear $nama ,Terimah kasih sudah menjadi pelanggan Shawlaundry\n";

  // Add content type (plain text encoded in quoted printable, in this example)
  $headers .= "Berikut password anda\r\n";

  // Convert plain text body to quoted printable
  $message = quoted_printable_encode($PLAINTEXT);

  // Create a BASE64 encoded subject
  $subject = "=?UTF-8?B?" . base64_encode($SUBJECT) . "?=";

  // Send email
  mail($TOEMAIL, $subject, $message, $headers, "-f" . $FROMEMAIL);

  header("location:../loginPelanggan.php?pesan=emailberhasil");

}else {
  header("location:../loginPelanggan.php?pesan=emailgagal");
}


<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

require'koneksi.php';

$baru = new Database();
$baru->masukuser($username, $password, $email); // untuk input data sesuai dng variabel yang dideklarasikan

?>
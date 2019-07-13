<?php

require 'koneksi.php';
$x = new Database();

$iduser = $_POST['iduser'];
$username =  $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$x->updateuser($iduser, $username, $password, $email);


?>
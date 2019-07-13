<?php

require 'koneksi.php';
$x = new Database();

$idadmin = $_POST['idadmin'];
$username =  $_POST['username'];
$password = $_POST['password'];

$x->updateadmin($idadmin, $username, $password);


?>
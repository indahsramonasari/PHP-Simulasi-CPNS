<?php

require 'koneksi.php';
$new = new Database();

$iduser = $_GET['iduser'];

$new->deleteuser($iduser);

?>
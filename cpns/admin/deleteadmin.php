<?php

require 'koneksi.php';
$new = new Database();

$idadmin = $_GET['idadmin'];

$new->deleteadmin($idadmin);

?>
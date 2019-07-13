<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
}
?>

<head>
<title>Form Edit Admin</title>
</head>
<body>
<?php include "menu.php";?>
<?php 
$idadmin= $_GET['idadmin'];
?>
<div class="col s9">
<h4 align="center">Edit Data Admin</h4>
<form action="terimaeditadmin.php" method="post">
<table align="center">
	<tr>
		<td><input type="hidden" name="idadmin" value="<?php echo $idadmin;?>"/></td>
	</tr>
		<tr>
		<td>Masukan username baru </td>
		<td><input type="text" name="username"/></td>
	</tr>
	<tr>
		<td>Masukan password baru </td>
		<td><input type="text" name="password"/></td>
	</tr>
	<tr>
		<tr>
		<td></td>
		<td><button class="btn waves-effect waves- blue darken-1" value="submit" name="submit">Simpan</button></td>
	</tr></table>
</form>
</div>

</body>

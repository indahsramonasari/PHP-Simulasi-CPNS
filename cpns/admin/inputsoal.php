<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
}
?>
<script type="text/javascript">
function valregister(){
            var x=register.idpaketsoal.value;
            if(register.idpaketsoal.value=="pilih"){
                        alert("Id pelanggan belum dipilih");
                        register.idpaketsoal.focus();
                        return false;      
            }
            if(register.noosoal.value==""){
                        alert("No Soal masih kosong");
                        register.nosoal.focus();
                        return false;
            }if(register.soal.value==""){
                        alert("Soal masih kosong");
                        register.soal.focus();
                        return false;
            }
            if(register.a.value==""){
                        alert("Jawaban a masih kosong");
                        register.a.focus();
                        return false;
            }
            if(register.b.value==""){
                        alert("Jawaban b masih kosong");
                        register.b.focus();
                        return false;
            }
            if(register.c.value==""){
                        alert("Jawaban c masih kosong");
                        register.c.focus();
                        return false;
            }
            if(register.d.value==""){
                        alert("Jawaban d masih kosong");
                        register.d.focus();
                        return false;
            }
            if(register.e.value==""){
                        alert("Jawaban d masih kosong");
                        register.e.focus();
                        return false;
            }
            var j=register.jawaban.value;
            if(register.jawaban.value=="pilih1"){
                        alert("Jawaban d masih kosong");
                        register.jawaban.focus();
                        return false;
            }
}
</script>

<?php
require 'koneksi.php';
$baru = new Database();
$hasil = $baru->tampilpaketsoal();
?>

<div class="col s5">
<h3 align="center">Masukan Soal</h3>
<form role="form" name="register" method="post" onSubmit="return valregister()" action="terimasoal.php">
<table align="center">
	<tr>
		<td>Masukan paket soal </td>
		<td><select class="browser-default" id="idpaketsoal" name="idpaketsoal">
		<option id="pilih" value="pilih">Pilih Paket Soal</option>
		<?php foreach ($hasil as $value): ?>
		<?php echo "<option value=".$value['idpaketsoal']." >".$value['namapaketsoal']."</option>" ?>
		<?php endforeach ?>
		</select>
	</td>
	</tr>
		<tr>
		<td>Masukan nomor soal </td>
		<td><input  type="text" name="nosoal"  id="nosoal"/></td>
	</tr>
	<tr>
		<td>Masukan soal </td>
		<td><input  type="text" name="soal"  id="soal"/></td>
	</tr>
	<tr>
		<td>Masukan jawaban a </td>
		<td><input type="text" name="a"  id="a"/></td>
	</tr>
	<tr></div>
		<td>Masukan jawaban b </td>
		<td><input type="text" name="b"  id="b"/></td>
	</tr>
	<tr>
		<td>Masukan jawaban c </td>
		<td><input type="text" name="c"  id="c"/></td>
	</tr>
	<tr>
		<td>Masukan jawaban d </td>
		<td><input type="text" name="d"  id="d"/></td>
	</tr>
	<tr>
		<td>Masukan jawaban e </td>
		<td><input type="text" name="e"  id="e"/></td>
	</tr>
	<tr>
		<td>Pilih jawaban yang benar </td>
		<td><select class="browser-default" name="jawaban">
			<option value="pilih1">Pilih Jawaban</option>
			<option value="a">a</option>
			<option value="b">b</option>
			<option value="c">c</option>
			<option value="d">d</option>
			<option value="e">e</option>
		</select></td>
	</tr>
		<tr>
		<td></td>
		<td><button class="btn waves-effect waves- blue darken-1"  type ="submit" value="submit">simpan</button></td>
	</tr></table>
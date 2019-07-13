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
                        alert("Paket Soal belum dipilih");
                        register.idpaketsoal.focus();
                        return false;      
            }
}
</script>

<?php
require 'koneksi.php';
$baru = new Database();
$hasil = $baru->tampilpaketsoal();
?>

<script>
  $("document").ready(function(){
    $("select").DataTable();
  })
</script>

<div class="col s9"><br><br><br>
<h5 align="center">Mulai Simulasi Tes CPNS</h5><br>
</div>
<form role="form" name="register" method="post" onSubmit="return valregister()" action="terimasoal.php">
		<div align="center" class="row">
    <div class="select">
		<td><select style="width:10%; max-width: 10%; max-height: 10%" class="browser-default" id="idpaketsoal" name="idpaketsoal">
		<option id="pilih" value="pilih">Pilih Paket Soal</option>
		<?php foreach ($hasil as $value): ?>
		<?php echo "<option value=".$value['idpaketsoal']." >".$value['namapaketsoal']."</option>" ?>
		<?php endforeach ?>
		</select></td></div></div>
		<div align="center" class="row">
          <div class="input-field">
          <td><button class="btn waves-effect waves- blue darken-1" type ="submit" value="submit" name="cek">Lanjutkan</button></td>
        </div>
      	</div>
	</td>
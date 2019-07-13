<?php
session_start();
?>
<?php require 'koneksi.php' ?>
 
<strong>2. soal.php</strong>
 
Script yang berisi modul soal untuk tes.

<?php
switch ($_GET['aksi']){
 
 # Tambah data
 case "tambah":
 echo '
 <script>
function validateForm() {
 var a = document.forms["myForm"]["kd_kriteria"].value;
 var b = document.forms["myForm"]["nm_kriteria"].value;
 if (a==null || a=="" || b==null || b=="") {
 alert("Tidak boleh kosong");
 return false;
 }
}
</script>
 <h3>Tambah Data Soal Tes </h3>
 <form method="post" action="ksi_soal.php?aksi=insert" name="myForm" onsubmit="return validateForm()">
 <table>
 <tr>
 <td>Soal</td>
 <td><input name="soal" type="text" size="30"></td>
 </tr>
 <tr>
 <td>Jawaban Benar</td>
 <td>
 <input type="radio" name="pilihan_benar" value="a">a
 <input type="radio" name="pilihan_benar" value="b">b
 <input type="radio" name="pilihan_benar" value="c">c
 <input type="radio" name="pilihan_benar" value="d">d
 <input type="radio" name="pilihan_benar" value="e">e
 </td>
 </tr>
 <tr>
 <td>Pilihan a</td>
 <td><input name="pilihan_a" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan b</td>
 <td><input name="pilihan_b" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan c</td>
 <td><input name="pilihan_c" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan d</td>
 <td><input name="pilihan_d" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan e</td>
 <td><input name="pilihan_e" type="text" size="20">
 <input name="token" type="hidden"">
 </td>
 </tr>
 <tr>
 <td colspan="2">';
 #cek token
 $token= "SELECT * FROM soal_tes ORDER BY no_soal DESC LIMIT 1";
 $prosestoken = mysql_query($token);
 $datatoken = mysql_fetch_array($prosestoken);
 if($deteksitoken = mysql_num_rows($prosestoken) < 1 ){
 $isitoken = date('Y-m-d:H:i:s');
 $no_soal = 1;
 
 }else{
 $isitoken = $datatoken[token];
 $no_soal = $datatoken[no_soal]+1;
 }
 echo '<input type=hidden name=token value="'.$isitoken.'">
 <input type=hidden name=no_soal value="'.$no_soal.'">
 <input type="submit" value="Simpan" class="tombol"/>
 <input type="reset" name="reset" value="Batal" class="tombol" onclick=self.history.back()></td>
 </tr>
 </table>
 </form>';
 break;
 
 # Edit data
 case "edit":
 $edit = "SELECT * FROM soal_tes WHERE no_soal = '$_GET[id]'";
 $hasil = mysql_query($edit);
 $data = mysql_fetch_array($hasil);
 
echo '
 <script>
function validateForm() {
 var a = document.forms["myForm"]["kd_kriteria"].value;
 var b = document.forms["myForm"]["nm_kriteria"].value;
 if (a==null || a=="" || b==null || b=="") {
 alert("Tidak boleh kosong");
 return false;
 }
}
</script>
 <h3>Form Edit Data Master Soal Tes</h3>
 <form method="post" action="aksi_soal.php?aksi=update&id='.$_GET[id].'" name="myForm" onsubmit="return validateForm()">
 <table>
 <tr>
 <td>Soal</td>
 <td><input name="soal" value="'.$data[soal].'" type="text" size="30"></td>
 </tr>
 <tr>
 <td>Jawaban Benar</td>
 <td>
 <input type="radio" name="pilihan_benar" value="a"';if($data[pilihan_benar]=='a'){echo "checked";} echo '>a
 <input type="radio" name="pilihan_benar" value="b"';if($data[pilihan_benar]=='b'){echo "checked";} echo '>b
 <input type="radio" name="pilihan_benar" value="c"';if($data[pilihan_benar]=='c'){echo "checked";} echo '>c
 <input type="radio" name="pilihan_benar" value="d"';if($data[pilihan_benar]=='d'){echo "checked";} echo '>d
 <input type="radio" name="pilihan_benar" value="e"';if($data[pilihan_benar]=='e'){echo "checked";} echo '>e
 </td>
 </tr>
 <tr>
 <td>Pilihan a</td>
 <td><input name="pilihan_a" value="'.$data[pilihan_a].'" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan b</td>
 <td><input name="pilihan_b" value="'.$data[pilihan_b].'" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan c</td>
 <td><input name="pilihan_c" value="'.$data[pilihan_c].'" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan d</td>
 <td><input name="pilihan_d" value="'.$data[pilihan_d].'" type="text" size="20"></td>
 </tr>
 <tr>
 <td>Pilihan e</td>
 <td><input name="pilihan_e" value="'.$data[pilihan_e].'" type="text" size="20">
 <input name="no_soal" value="'.$_GET[id].'" type="hidden">';
 echo '<input type=hidden name=token value="'.$data[token].'">
 </td>
 </tr>
 <tr>
 <td colspan="2">
 <input type="submit" value="Simpan" class="tombol"/>
 <input type="reset" name="reset" value="Batal" class="tombol" onclick=self.history.back()></td>
 </tr>
 </table>
 </form>';
 break;
 
# Menampilkan data
 case "tampil";
 echo '
 <h3>Data Master Soal Tes</h3>
 <button type="submit"><a href="?modul=soal&aksi=tambah">Tambah</a></button>
 <table class="full">
 <tr>
 <th>No</th>
 <th>Soal Tes</th>
 <th>Pilihan Benar</th>
 <th>Detail</th>
 <th>Edit</th>
 <th>Hapus</th>
 </tr>
 <tr>';
 
 $i=0;
 $tampil = "SELECT * FROM soal_tes";
 $sql = mysql_query($tampil);
 while($data = mysql_fetch_array($sql)) {
 $i++;
 
 //konfirmasi hapus
 echo "
 <script language=\"JavaScript\">
 function konfirmasi()
 {
 tanya = confirm('Anda Yakin Akan Menghapus Data ?');
 if (tanya == true) return true;
 else return false;
 }
 </script>
 
 <td>$i</td>
 <td><a href=?modul=soal&aksi=tampil&id=$data[no_soal]>$data[soal] ?</a><br/>";
 if ($data[no_soal]== $_GET[id]){
 $i=0;
 $tampil2 = "SELECT * FROM soal_tes WHERE no_soal='$_GET[id]'";
 $sql2 = mysql_query($tampil2);
 while($data2 = mysql_fetch_array($sql2)) {
 $i++;
 echo 'a. '.$data2[pilihan_a].'<br/>';
 echo 'b. '.$data2[pilihan_b].'<br/>';
 echo 'c. '.$data2[pilihan_c].'<br/>';
 echo 'd. '.$data2[pilihan_d].'<br/>';
 echo 'e. '.$data2[pilihan_e].'<br/>';
 }
 }
 echo "</td>
 <td>$data[pilihan_benar]</td>
 <td align=center><a href=?modul=soal&aksi=tampil&id=".$data[no_soal]."><img src=detail.png title=Detail></a></td>
 <td align=center><a href=?modul=soal&aksi=edit&id=".$data[no_soal]."><img src=edit.png title=Edit></a></td>
 <td align=center><a href=ksi_soal.php?aksi=delete&id=".$data[no_soal]." onclick=\"return konfirmasi()\"><img src=delete.png title=Hapus></a></td>
 </tr>";
 }
 echo '</table>';
 break;
 
}
?>

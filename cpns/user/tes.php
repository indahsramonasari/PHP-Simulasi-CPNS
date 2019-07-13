<?php
switch ($_GET['aksi']){
 default;
 //cek token
 $token= "SELECT token FROM soal_tes ORDER BY no_soal DESC LIMIT 1";
 $prosestoken = mysql_query($token);
 $datatoken = mysql_fetch_array($prosestoken);
 
 //cek kd_karyawan
 $sqlkd = "SELECT * FROM karyawan WHERE nm_karyawan = '$_SESSION[nm_karyawan]'";
 $kd_karyawan = mysql_fetch_array(mysql_query($sqlkd));
 //cek jawaban
 $jwb = "SELECT * FROM jawaban_tes WHERE kd_karyawan ='$kd_karyawan[kd_karyawan]' AND token = '$datatoken[token]'";
 $xjwb = mysql_query($jwb);
 
 if($data=mysql_num_rows($xjwb) == 100){
 echo '<table class="full">
 <tr>
 <th>Soal tes selesai di Jawab</th>
 </tr>
 <tr>';
 //jml soal
 $totalsoal = mysql_num_rows(mysql_query("SELECT * FROM soal_tes"));
 //hasil jawaban
 $i=0;
 $tampil = "SELECT a. * , b. * FROM soal_tes a, jawaban_tes b WHERE a.pilihan_benar = b.jawaban AND a.no_soal = b.no_soal AND a.token = b.token";
 $sql = mysql_query($tampil);
 $jbenar = mysql_num_rows($sql);
 $jsalah = $totalsoal-$jbenar;
 $skor = $jbenar/10;
 echo '
 <tr>
 <td colspan=2 align=center>
 Jawaban benar: '.$jbenar.'<br/>
 Jawaban salah: '.$jsalah.'<br/>
 Score Anda: '.$skor.'
 </td></tr></table>';
 }else{
 echo '<h3>Salamat datang di tes online</h3>
 <p align=center>Harap mengerjakan soal dengan teliti, baca soal dan pilihlah jawaban yang paling benar. Untuk megerjakan soal tes silahkan klik lanjut
 </p><p align=center><button type=submit><a href="?modul=tes&aksi=tampil&token='.$datatoken[token].'">Lanjut</a></button></p>';
 }
 break;
 
 # Menampilkan data
 case "tampil";
 echo '<script>
 function validateForm() {
 var a = document.forms["myForm"]["jawaban"].value;
 if (a==null || a=="") {
 alert("Pertayaan harus dijawab");
 return false;
 }
 }
 </script>';
 //cek no soal
 $sqlkd = "SELECT * FROM karyawan WHERE nm_karyawan = '$_SESSION[nm_karyawan]'";
 $kd = mysql_fetch_array(mysql_query($sqlkd));
 
 $no = mysql_query("SELECT * FROM jawaban_tes WHERE kd_karyawan='$kd[kd_karyawan]' ORDER BY no_soal DESC ");
 $nosoal = mysql_fetch_array($no);
 if($nosoalxx = mysql_num_rows($no) < 1 ){
 $nosoalx = 1;
 }else{
 $nosoalx= $nosoal[no_soal]+1;
 }
 $totalsoal = mysql_num_rows(mysql_query("SELECT * FROM soal_tes"));
 if($nosoalx<=100){
 echo ' <h3>Soal no '.$nosoalx.' dari '.$totalsoal.' Soal</h3> ';
 echo '<form action="aksi_tes.php?aksi=insert" method="POST" name="myForm" onsubmit="return validateForm()">
 <table class="full">
 <tr>
 <th>Soal Tes</th>
 </tr>
 <tr>';
 
 $i=0;
 $tampil = "SELECT * FROM soal_tes WHERE token='$_GET[token]' AND no_soal='$nosoalx' ORDER BY no_soal ASC LIMIT 1";
 $sql = mysql_query($tampil);
 while($data = mysql_fetch_array($sql)) {
 $i++;
 
 echo "
 <td><p style='margin:0 0 10px 5px;font-size:18px;'>$data[soal] ?</p>";
 echo '<input type="radio" name="jawaban" value="a">a. '.$data[pilihan_a].'<br/>';
 echo '<input type="radio" name="jawaban" value="b">b. '.$data[pilihan_b].'<br/>';
 echo '<input type="radio" name="jawaban" value="c">c. '.$data[pilihan_c].'<br/>';
 echo '<input type="radio" name="jawaban" value="d">d. '.$data[pilihan_d].'<br/>';
 echo '<input type="radio" name="jawaban" value="e">e. '.$data[pilihan_e].'<br/>';
 
 echo "
 <input type=hidden name=token value=".$data[token].">
 <input type=hidden name=no_soal value=".$nosoalx.">
 <input type=hidden name=kd_karyawan value=".$kd[kd_karyawan].">
 </tr>";
 }
 echo '
 <tr>
 <td colspan=2 align=center>
 <input type=submit value=Jawab>
 </td></tr></table></form>';
 }else{
 echo '<table class="full">
 <tr>
 <th>Soal tes selesai di Jawab</th>
 </tr>
 <tr>';
 
 $i=0;
 $tampil = "SELECT a. * , b. * FROM soal_tes a, jawaban_tes b WHERE a.pilihan_benar = b.jawaban AND a.no_soal = b.no_soal AND a.token = b.token";
 $sql = mysql_query($tampil);
 $jbenar = mysql_num_rows($sql);
 $jsalah = $totalsoal-$jbenar;
 $skor = $jbenar/10;
 echo '
 <tr>
 <td colspan=2 align=center>
 Jawaban benar: '.$jbenar.'<br/>
 Jawaban salah: '.$jsalah.'<br/>
 Score Anda: '.$skor.'
 </td></tr></table>';
 }
 break;
 
}
?>

<?php
$server = "localhost";
 $username = "root" ;
 $password = "" ;
 $database = "karyawan";
 
//Koneksi dan memilih database di server
 mysql_connect($server,$username,$password) or die ("Koneksi database gagal");
 mysql_select_db($database) or die ("Database tidak tersedia");
 
$kd_karyawan = $_POST['kd_karyawan'];
 $jawaban = $_POST['jawaban'];
 $no_soal = $_POST['no_soal'];
 $token = $_POST['token'];
 
switch ($_GET['aksi']) {
 
 # Insert data
 case "insert" :
 $sql = "INSERT INTO jawaban_tes(kd_karyawan,jawaban,no_soal,token)
 values('$kd_karyawan','$jawaban','$no_soal','$token')";
 //echo "$sql";exit;
 $hasil = mysql_query($sql);
 
 if($hasil){
 
 //pesan data berhasil disimpan
 echo "
 <script>
 window.location=\"?modul=tes&aksi=tampil&token=$token\";
 </script>";
 }
 break;
 
 # Update data
 case "update" :
 $update = "UPDATE soal_tes SET soal = '$soal',pilihan_benar = '$pilihan_benar'
 ,pilihan_a = '$pilihan_a' ,pilihan_b = '$pilihan_b' ,pilihan_c = '$pilihan_c' ,pilihan_d = '$pilihan_d' ,pilihan_e = '$pilihan_e' WHERE id_soal='$id_soal'";
 //echo "$update";exit;
 $hasil = mysql_query($update);
 
 if($update){
 
 echo "
 <script>
 window.location=\"?modul=soal&aksi=tampil\";
 </script>";
 }
 
 break;
 
 # Delete data
 case "delete" :
 $delete="DELETE FROM soal_tes WHERE id_soal ='$_GET[id]'";
 //echo $delete;exit;
 $hasil=mysql_query($delete);
 if($hasil){
 echo "
 <script>
 window.location=\"?modul=soal&aksi=tampil\";
 </script>";
 }
 break;
 
}
?>

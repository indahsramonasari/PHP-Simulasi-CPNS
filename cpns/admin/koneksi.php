<?php
class Database{ // class Database
	function __construct(){
		$this->db = new mysqli("localhost","root","","cpns");

	}

	public function masukadmin($username, $password){ 
	$sql="insert into admin (username, password) values ('$username', '$password')";
	$query = $this->db->query($sql);
	
	if($query){
	echo "input admin berhasil</br>";
	}else{
		echo "input admin gagal</br>";
		echo"<br/>".$this->db->error;
	}
	}

	public function masukuser($username, $password, $email){ 
	$sql="insert into user (username, password, email) values ('$username', '$password', '$email')";
	$query = $this->db->query($sql);
	
	if($query){
	echo "input user berhasil</br>";
	}else{
		echo "input user gagal</br>";
		echo"<br/>".$this->db->error;
	}
	}


	public function cariadmin($kunci){
	$data = array();
	$query = "select * from admin where idadmin like '$kunci' "; 
	$sql = $this->db->query($query);
	while ($x = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
		$data[] = $x;
	}
	return $data;
	}
	
	public function cariuser($value){
	$data = array();
	$query = "select * from user where iduser like '%$value%' OR username like '%$value%' OR email like '%$value%' "; 
	$sql = $this->db->query($query);
	while ($x = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
		$data[] = $x;
	}
	return $data;
	}

	public function masukpaketsoal($paketsoal, $namasoal){ 
	$sql="insert into paketsoal (paketsoal, namasoal) values ('$paketsoal', '$namasoal')";
	$query = $this->db->query($sql);
	
	if($query){
	echo "input data berhasil</br>";
	}else{
		echo "input data gagal</br>";
		echo"<br/>".$this->db->error;
	}
	}

	public function masuksoal($idpaketsoal, $nosoal, $soal, $a, $b, $c, $d, $e, $jawaban){ 
	$sql="insert into soal (idpaketsoal, nosoal, soal, a, b, c, d, e, jawaban) values ('$idpaketsoal', '$nosoal', '$soal', '$a', '$b', '$c', '$d', '$e', '$jawaban')";
	$query = $this->db->query($sql);
	
	if($query){
	echo "input data berhasil</br>";
	}else{
		echo "input data gagal</br>";
		echo"<br/>".$this->db->error;
	}
	}

	public function tampilAdm(){ 
		$query = " select * from admin";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}
	
	public function tampiluser(){ // function untuk menampilkan data dari tabel pelanggan
		$query = " select * from user";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}

	public function tampilpaketsoal(){ 
		$query = " select * from paketsoal";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}

		public function tampilsoal(){
		$query = " select soal.idsoal, soal.nosoal, soal.soal, soal.a, soal.b, soal.c, soal.d, soal.e, soal.jawaban, paketsoal.namapaketsoal from (soal INNER JOIN paketsoal ON soal.idpaketsoal = paketsoal.idpaketsoal)";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}


	public function deleteuser($iduser) 
	{
		$query = "delete from user where iduser=$iduser";
		$sql = $this->db->query($query);
		if($sql){
			echo "hapus data user berhasil";
		}else{
			echo "hapus data user gagal</br>";
			echo $this->db->error;
		}
	}
	public function updateuser($iduser, $username, $password, $email){ 
		$query = "update user set username='$username', password='$password', email='$email' where iduser=$iduser";
		
		$sql = $this->db->query($query);
		if($sql){
			echo "edit data user berhasil";
		}else{
			echo "edit data user gagal</br>";
			echo $this->db->error;
		}
	}
	public function deleteadmin($idadmin) 
	{
		$query = "delete from admin where idadmin=$idadmin";
		$sql = $this->db->query($query);
		if($sql){
			echo "hapus data admin berhasil";
		}else{
			echo "hapus data admin gagal</br>";
			echo $this->db->error;
		}
	}
	public function updateadmin($idadmin, $username, $password){ 
		$query = "update admin set username='$username', password='$password' where idadmin=$idadmin";
		
		$sql = $this->db->query($query);
		if($sql){
			echo "edit data admin berhasil";
		}else{
			echo "edit data admin gagal</br>";
			echo $this->db->error;
		}
	}
}
?>
<?php
class Database{ // class Database
	function __construct(){
		$this->db = new mysqli("localhost","root","","cpns");

	}

	
	public function tampiluser(){ // function untuk menampilkan data dari tabel pelanggan
		$query = " SELECT * FROM user WHERE username = '$_SESSION[username]'";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}

		public function tampilpaketsoal(){ // function untuk menampilkan data dari tabel pelanggan
		$query = " select * from paketsoal ";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}

		public function tampilsoal(){ // function untuk menampilkan data dari tabel pelanggan
		$query = " select soal.idsoal, soal.nosoal, soal.soal, soal.a, soal.b, soal.c, soal.d, soal.e, soal.jawaban, paketsoal.namapaketsoal from (soal INNER JOIN paketsoal ON soal.idpaketsoal = paketsoal.idpaketsoal)";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}

	public function tampileval(){ // function untuk menampilkan data dari tabel pelanggan
		$query = " select beli.id_beli, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, barang.kode_barang, barang.nama_barang, beli.jumlah_item, beli.total_harga from ((beli INNER JOIN pelanggan ON beli.id_pelanggan = pelanggan.id_pelanggan) INNER JOIN barang ON beli.kode_barang = barang.kode_barang) ";
		$sql = $this->db->query($query);
		$data = array();

		while($x = mysqli_fetch_array($sql)){
			$data[] = $x;
		}
		return $data;
	}

	public function updateuser($iduser, $username, $password, $email){ // function untuk mengupdate data dari tabel barang, dipanggil di file terimaeditbarang.php
		$query = "update user set username='$username', password='$password', email='$email' where iduser=$iduser";
		
		$sql = $this->db->query($query);
		if($sql){
			echo "edit data user berhasil";
		}else{
			echo "edit data user gagal</br>";
			echo $this->db->error;
		}
	}

}
?>
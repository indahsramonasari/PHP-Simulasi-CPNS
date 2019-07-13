<?php
session_start();

	if(isset($_POST['cek'])){

		$username = $_POST['username'];
		$password=$_POST['password'];
		$con=mysqli_connect("localhost","root","","cpns");

		$status="gagal";
		$q=mysqli_query($con,"select * from admin");
		while($data=mysqli_fetch_array($q)){
			if(($data['username']==$username) and ($data['password']==$password)){
				$_SESSION['hasil']="berhasil";
				$_SESSION['username']=$username;	
				header('location: admin/dashboard.php');
			}
		}

		$q=mysqli_query($con,"select * from user");
		while($data=mysqli_fetch_array($q)){
			if(($data['username']==$username) and ($data['password']==$password)){
				$_SESSION['hasil']="berhasil";
				$_SESSION['username']=$username;	
				header('location: user/dashboard.php');
			}
		}

		echo "keterangan : ".$status; 
	
	}
?>

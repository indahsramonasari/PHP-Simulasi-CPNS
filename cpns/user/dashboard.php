 <?php
session_start();

if(!isset($_SESSION["username"])){
  header("Location: cpns/index.php");
}
?>
<link rel="stylesheet" href="aset/css/materialize.min.css">
<script src="aset/css/materialize.css"></script>
<script src="aset/js/jquery.js"></script>
<script src="aset/js/materialize.js"></script>

 <?php
 	if(isset($_GET['r'])){
 		$r=$_GET['r'];
 	}
 	else $r=1;
 ?>
 <script>
 	$("document").ready(function(){
 		r=parseInt(<?=$r?>)
 		if(r==1)awal(); 
 		else if(r==2) simulasi();
 		else if(r==3) tampilevaluasi();
 		else if(r==4) tampilbank();
 		else if(r==5) tampiluser();
 		else if(r==6) logout();
 	})

 	function awal(){$(".utama").load("awal.php");}
 	function simulasi(){$(".utama").load("simulasi.php");}
 	function tampilevaluasi(){$(".utama").load("tampileval.php");}
 	function tampilbank(){$(".utama").load("tampilbank.php");}
 	function tampiluser(){$(".utama").load("tampiluser.php");}
 	function logout(){$(".utama").load("logout.php");}
 </script>
 <nav>
      <div class="nav-wrapper blue darken-2">
      <a href="#" class="brand-logo">Simulasi CPNS Online</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="?r=1">Beranda</a></li>
			<li><a href="?r=2">Simulasi</a></li>
			<li><a href="?r=3">Evaluasi</a></li>
			<li><a href="?r=4">Bank Soal</a></li>
			<li><a href="?r=5">Akun</a>/li>
			<li><a href="../?keluar"">Logout</a></li></ul>
	</div></nav>

	<div class="col l10">
		<div class="utama"></div>
	</div>
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
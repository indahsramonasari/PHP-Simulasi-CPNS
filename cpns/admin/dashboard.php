 <?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: cpns/index.php");
}
?>
<link rel="stylesheet" href="aset/css/materialize.min.css">
<script src="aset/js/jquery.js"></script>
<script src="aset/js/materialize.js"></script>

 <?php
 	if(isset($_GET['r'])){
 		$r=$_GET['r'];
 	}
 	else $r=1;

 	for($i=1;$i<=10;$i++){
 		$stat[$i]=$r==$i?"active":"";
 	}
 ?>
 <script>
 	$("document").ready(function(){
 		r=parseInt(<?=$r?>)
 		if(r==1)awal(); 
 		else if(r==2) tampiluser();
 		else if(r==3) tampiladmin();
 		else if(r==4) tampilsoal();
 		else if(r==5) tampilbank();
 		else if(r==6) tampilevaluasi();
 		else if(r==7) logout();
 	})
 	function awal(){$(".utama").load("awal.php");}
 	function tampiluser(){$(".utama").load("tampiluser.php");}
 	function tampiladmin(){$(".utama").load("tampiladmin.php");}
 	function tampilsoal(){$(".utama").load("tampilsoal.php");}
 	function tampilbank(){$(".utama").load("tampilbank.php");}
 	function tampilevaluasi(){$(".utama").load("tampilevaluasi.php");}
 	function logout(){$(".utama").load("logout.php");}
 </script>
 <nav>
      <div class="nav-wrapper blue darken-2">
      <a href="#" class="brand-logo">Simulasi CPNS Online</a>
      </div>
      </nav>

      <div class="row"> 
      <div class="col l2 blue" style="height:100%; padding:0">
		<ul class="collection">
			<li class="collection-item red <?=$stat[1]?>"><a href="?r=1">Beranda</a></li>
			<li class="collection-item <?=$stat[2]?>"><a href="?r=2">Pengguna</a></li>
			<li class="collection-item <?=$stat[3]?>"><a href="?r=3">Admin</a></li>
			<li class="collection-item <?=$stat[4]?>"><a href="?r=4">Latihan Soal</a></li>
			<li class="collection-item <?=$stat[5]?>"><a href="?r=5">Bank Soal</a></li>
			<li class="collection-item <?=$stat[6]?>"><a href="?r=6">Evaluasi</a></li>
			<li class="collection-item <?=$stat[7]?>"><a href="../?keluar">Logout</a></li>
		</ul>
	</div>

	<div class="col l10">
		<div class="utama"></div>
	</div>
</div>
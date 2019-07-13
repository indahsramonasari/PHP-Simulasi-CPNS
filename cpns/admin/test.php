<?php
	$con=new mysqli("localhost","root","","cpns");
	$q=$con->query("select * from soal");
	$r=$q->fetch_assoc();
	extract($r);?>

	<input type="radio" name="r" /> <?=$a?><br />
	<input type="radio" name="r" /> <?=$b?><br />
	<input type="radio" name="r" /> <?=$a?><br />
	<input type="radio" name="r" /> <?=$b?><br />
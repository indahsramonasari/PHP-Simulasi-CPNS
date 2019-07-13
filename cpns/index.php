<?php
session_start();
if(isset($_GET['keluar'])){ 
  session_destroy(); // menghapus sessions untuk logout
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="aset/css/materialize.min.css">
  <script src="aset/js/jquery.js"></script>
  <script src="aset/js/materialize.min.js"></script>
</head>

<script type="text/javascript">
function valregister(){
            var x=register.username.value;
            var x1=parseInt(x);
            var panjang=x.length;
            if(register.username.value==""){
                        alert("Username belum diisi");
                        register.username.focus();
                        return false;      
            }
            if(panjang < 4){
                        alert("Username tidak boleh kurang dari 4 huruf");
                        register.username.focus();
                        return false;      
            }
            if(isNaN(x1)==false){
                        alert("Username harus huruf");
                        register.username.focus();
                        return false;

            }

            var z=register.password.value;
            var panjang1=z.length;
            if(register.password.value==""){
                        alert("Password masih kosong");
                        register.password.focus();
                        return false;
            }
            if(panjang1 <8){
                        alert("Password tidak boleh kurang dari 8 huruf ");
                        register.password.focus();
                        return false;      
            }
}
</script>
 <nav>
      <div class="nav-wrapper blue darken-2">
      <a href="#" class="brand-logo">Simulasi CPNS Online</a>
      </div>
      </nav>
<br><br>
<form role="form" name="register" method="post" onSubmit="return valregister()" action="login.php">
		    <div align="center" class="row">
          <div class="input-field col s12 m4 center-on-small-only">
          <i class="mdi-action-account-circle prefix"></i>
          <h5>Masuk</h5>
          </div>
         </div>
         <div align="center" class="row">
          <div class="input-field col s12 m4 center-on-small-only">
          <img src="aset/user.png" alt="" class="circle"><i class="mdi-action-account-circle prefix"></i>
          </div>
      	 </div><br>
          <div align="center" class="row">
          <div class="input-field col s12 m4 center-on-small-only"><i class="mdi-action-account-circle prefix"></i>
          <td><input type="text" id="username" name="username" placeholder="Masukan username.."></td>
          </div>
         </div>
      	 <div align="center"  class="row">
          <div class="input-field col s12 m4 center-on-small-only"><i class="mdi-action-account-circle prefix"></i>
          <td><input type="password" id="password" name="password" placeholder="Masukan password.."></td>
        </div>
      	</div>
      	 <div align="center" class="row">
          <div class="input-field col s12 m4 center-on-small-only">
          <td><button class="btn waves-effect waves- blue darken-1" type ="submit" value="submit" name="cek">login</button></td>
        </div>
      	</div>
          <div align="center" class="row">
          <div class="input-field col s12 m4 center-on-small-only">
          <i class="mdi-action-account-circle prefix"></i>
          <h6>Belum punya akun?? </h6><a href="daftar.php">Daftar</a>
          </div>
         </div>
</form>
</body>
</html>
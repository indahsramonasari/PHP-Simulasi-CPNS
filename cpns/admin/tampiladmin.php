<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../");
}
?>

<?php
require 'koneksi.php';
$baru = new Database();
$hasil = $baru->tampilAdm();

?>

<link rel="stylesheet" href="aset/css/data_tables.css">
<script src="aset/js/data_tables.js"></script>
<script>
  $("document").ready(function(){
    $('select').material_select();
    $(".tabel").DataTable();
    $(".modal").modal();
  })
</script>

    <a href="#modal1" class="btn btn-floating btn-large cyan pulse modal-trigger"><i class="material-icons">+</i></a>

    <br><br><div class="col s9">
    <table class="tabel" border="1px" align="center">
    <thead><tr>
    <td>  Id Admin  </td>
    <td>  Username  </td>
    <td>  Aksi </td>
    </tr></thead>
    <?php foreach ($hasil as $value): ?>
    <tr>
      <td><?php echo $value['idadmin'] ?></td>
      <td><?php echo $value['username'] ?></td>
      <td><a href="tambahadmin.php?idadmin=<?php echo $value['idadmin']?>"><button class="btn waves-effect waves- blue darken-1">Hapus</button></a>
        <a href="editadmin.php?idadmin=<?php echo $value['idadmin']?>"><button class="btn waves-effect waves- blue darken-1">Edit</button></a></td>
    </tr>
    <?php endforeach ?>
    </table>
      </div>

    </div>
            <script type="text/javascript">
            function valregister(){
            var x=register.username.value;
            var x1=parseInt(x);
            if(register.username.value==""){
                        alert("Username masih kosong");
                        register.username.focus();
                        return false;      
            }if(isNaN(x1)==false){
                        alert("Username harus huruf");
                        register.username.focus();
                        return false;    
            }
            var z=register.password.value;
            var panjang=z.length;
            if(register.password.value==""){
                        alert("Password masih kosong");
                        register.password.focus();
                        return false;
            } if(panjang<6 || panjang>8){
                        alert("Password minimum 6 karakter dan maksimum 8 karakter");
                        register.password.focus();
                        return false;
            }
             return true; 
            }
            </script>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
            <form  role="form" name="register" method="post" onSubmit="return valregister()" action="terimaadmin.php">
    <div class="modal-content">
      <h4>Masukan Data Admin</h4>
      <p><div class="col s7">
            <table align="center">
            <tr>
            <td>Masukan username </td>
            <td><input type="text" id="username" name="username"/></td>
            </tr>
            <tr>
            <td>Masukan password</td>
            <td><input type="text" id="password" name="password"/></td>
            </tr>
            </table>
      </div></p>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn waves-effect waves- blue darken-1">simpan</button>
    </div>
    </form>
  </div>

</body>
</html>
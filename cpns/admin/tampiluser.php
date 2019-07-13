<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
}
?>
<?php
require 'koneksi.php';
$baru = new Database();
$hasil = $baru->tampiluser();
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
    <td>  Id User  </td>
    <td>  Username  </td>
    <td>  Email  </td>
    <td>  Aksi </td>
    </tr></thead>
    <?php foreach ($hasil as $value): ?>
    <tr>
      <td><?php echo $value['iduser'] ?></td>
      <td><?php echo $value['username'] ?></td>
      <td><?php echo $value['email'] ?></td>
      <td><l<a href="deleteuser.php?iduser=<?php echo $value['iduser']?>"><button class="btn waves-effect waves- blue darken-1">Hapus</button></a>
        <a href="edituser.php?iduser=<?php echo $value['iduser']?>"><button class="btn waves-effect waves- blue darken-1">Edit</button></a></td>
    </tr>
    <?php endforeach ?>
    </table>
    </div>
    </div>

      <!-- Modal Structure --> 
  <div id="modal1" class="modal modal-fixed-footer"><form  role="form" name="register" method="post" onSubmit="return valregister()" action="terimauser.php">
    <div class="modal-content">
      <h4>Masukan Data User</h4>
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
            <tr>
            <td>Masukan email</td>
            <td><input type="text" id="email" name="email"/></td>
            </tr></table>
            </div></p>
    </div>
    <div class="modal-footer">
     <button type="submit" class="btn waves-effect waves- blue darken-1">simpan</button>
    </div></form>
  </div>

</body>
</html>

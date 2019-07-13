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
<script src="aset/js/jquery.js"></script>
<script src="aset/js/data_tables.js"></script>
<script>
  $("document").ready(function(){
    $("select").DataTable();
  })
</script>
<script>
  $("document").ready(function(){
    $(".tabel").DataTable();
  })
</script>

    <h5>Profil Saya</h5><br>
    <div align="center" class="col l10">
    <table class="tabel" border="1px" align="center">
    <tr><?php foreach ($hasil as $value): ?>
      <td>Id User</td>
      <td><?php echo $value['iduser'] ?></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><?php echo $value['username'] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $value['email'] ?></td>
    </tr>
    <tr><td></td>
      <td><a href="edituser.php?iduser=<?php echo $value['iduser']?>"><button class="btn waves-effect waves- blue darken-1">Edit Profil Saya</button></a></td>
    </tr>
    <?php endforeach ?>
    </table>
    </div>
    </div>                                                            
<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
}
?>
<?php
require 'koneksi.php';

$baru = new Database();
$hasil = $baru->tampilsoal();

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

  <a href="inputsoal.php" class="btn btn-floating btn-large cyan pulse"><i class="material-icons">+</i></a>
  <br><br><div class="col s9">
    <table class="tabel" border="1px" align="center">
    <thead><tr><td>Id</td><td>Paket</td><td>No</td><td>Soal</td><td>a </td><td>d</td><td>c</td><td>d</td><td>e</td><td>Jawaban</td><td>Aksi</td></tr></thead>
    <?php foreach ($hasil as $value): ?>
    <tr>
      <td><?php echo $value['idsoal'] ?></td>
      <td><?php echo $value['namapaketsoal'] ?></td>
      <td><?php echo $value['nosoal'] ?></td>
      <td><?php echo $value['soal'] ?></td>
      <td><?php echo $value['a'] ?></td>
      <td><?php echo $value['b'] ?></td>
      <td><?php echo $value['c'] ?></td>
      <td><?php echo $value['d'] ?></td>
      <td><?php echo $value['e'] ?></td>
      <td><?php echo $value['jawaban'] ?></td>
      <td><ul><a href="deletesoal.php?idsoal=<?php echo $value['idsoal']?>"><button class="btn waves-effect waves- blue darken-1">Hapus</button></a></ul>
        <ul><a href="editsoal.php?idsoal=<?php echo $value['idsoal']?>"><button class="btn waves-effect waves- blue darken-1">Edit</button></a></td></ul>
    </tr>
    <?php endforeach ?>
    </table>
    </div>
    </div>

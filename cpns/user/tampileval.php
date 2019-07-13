<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../");
}
?>

<?php
require 'koneksi.php';
$baru = new Database();
$hasil = $baru->tampileval();

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

  <h5>Evaluasi Saya</h5>
  <div class="col s9">
    <table class="tabel" border="1px" align="center">
    <thead><tr>
    <td>  Id Evaluasi </td>
    <td>  Paketsoal  </td>
    <td>  Nilai </td>
    <td>  Tanggal Evaluasi </td>
    </tr></thead>
    <?php foreach ($hasil as $value): ?>
    <tr>
      <td><?php echo $value['ideval'] ?></td>
      <td><?php echo $value['namapaketsoal'] ?></td>
      <td><?php echo $value['nilai'] ?></td>
      <td><?php echo $value['tgleval'] ?></td>
    </tr>
    <?php endforeach ?>
    </table>
      </div>

    </div>

</body>
</html>
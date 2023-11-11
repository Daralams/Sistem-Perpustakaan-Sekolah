<?php 
require "../../config/config.php";
$idPengembalian = $_GET["id"];

if(deleteDataPengembalian($idPengembalian) > 0) {
  echo "
  <script>
  alert('Data berhasil dihapus');
  document.location.href = 'pengembalianBuku.php';
  </script>";
}else {
  echo "
  <script>
  alert('Data gagal dihapus');
  document.location.href = 'pengembalianBuku.php';
  </script>";
}
?>
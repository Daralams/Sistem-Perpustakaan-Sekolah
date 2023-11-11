<?php 
require "../../config/config.php";
$bukuId = $_GET["id"];
//var_dump($bukuId); die;

if(delete($bukuId) > 0) {
  echo "
  <script>
  alert('Data buku berhasil dihapus');
  document.location.href = 'daftarBuku.php';
  </script>";
}else {
  echo "
  <script>
  alert('Data buku gagal dihapus');
  document.location.href = 'daftarBuku.php';
  </script>";
}
?>
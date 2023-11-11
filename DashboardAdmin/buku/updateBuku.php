<?php
require "../../config/config.php";
// Ambil data dari url
$review = $_GET["idReview"];
$reviewData = queryReadData("SELECT * FROM buku WHERE id_buku = '$review'")[0];

// ==== FASE PERCOBAAN DEBUGGING =====
/*
$reviewKategori = queryReadData("SELECT * FROM buku WHERE kategori = '$review'");
*/
// Data kategori buku
$kategori = queryReadData("SELECT * FROM kategori_buku"); 

if(isset($_POST["update"]) ) {
  
  if(updateBuku($_POST) > 0) {
    echo "<script>
    alert('Data buku berhasil diupdate!');
    document.location.href = 'daftarBuku.php';
    </script>";
  }else {
    echo "<script>
    alert('Data buku gagal diupdate!');
    </script>";
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Edit data buku || Admin</title>
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../../assets/logoNav.png" alt="logo" width="120px">
        </a>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dashboardAdmin.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="daftarBuku.php">Browse</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
    <div class="container p-3 mt-5">
      <div class="card p-2 mt-5">
      <h1 class="text-center fw-bold p-3">Form Edit buku</h1>
      <form action="" method="post" enctype="multipart/form-data" class="mt-3 p-2">

      <div class="custom-css-form">
        <div class="mb-3">
          <input type="hidden" name="coverLama" value="<?= $reviewData["cover"];?>">
          <img src="../../imgDB/<?= $reviewData["cover"]; ?>" width="80px" height="80px">
          <label for="formFileMultiple" class="form-label">Cover Buku</label>
          <input class="form-control" type="file" name="cover" id="formFileMultiple">
          </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Id Buku</label>
          <input type="text" class="form-control" name="id_buku" id="exampleFormControlInput1" placeholder="example inf01" value="<?= $reviewData["id_buku"]; ?>">
        </div>
      </div>
    
      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
        <select class="form-select" id="inputGroupSelect01" name="kategori">
          <option selected><?= $reviewData["kategori"]; ?></option>
          <?php foreach ($kategori as $item) : ?>
          <option><?= $item["kategori"]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" aria-label="Username" aria-describedby="basic-addon1" value="<?= $reviewData["judul"]; ?>">
          </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
          <input type="text" class="form-control" name="pengarang" id="exampleFormControlInput1" placeholder="nama pengarang"  value="<?= $reviewData["pengarang"]; ?>">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="exampleFormControlInput1" placeholder="nama penerbit"   value="<?= $reviewData["penerbit"]; ?>">
        </div>
        
        <label for="validationCustom01" class="form-label">Tahun Terbit</label>
        <div class="input-group mt-0">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
          <input type="date" class="form-control" name="tahun_terbit" id="validationCustom01"  value="<?= $reviewData["tahun_terbit"]; ?>">
          </div>
          
        <label for="validationCustom01" class="form-label">Jumlah Halaman</label>
        <div class="input-group mt-0">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book-open"></i></span>
          <input type="number" class="form-control" name="jumlah_halaman" id="validationCustom01"  value="<?= $reviewData["jumlah_halaman"]; ?>">
          </div>
        
        <div class="form-floating mt-3 mb-3">
          <textarea class="form-control" placeholder="sinopsis tentang buku ini" name="buku_deskripsi" id="floatingTextarea2" style="height: 100px"><?= $reviewData["buku_deskripsi"]; ?></textarea>
          <label for="floatingTextarea2">Sinopsis</label>
          </div>
          
      <button class="btn btn-success" type="submit" name="update">Edit</button>
      <a class="btn btn-danger" href="daftarBuku.php">Batal</a>
      </form>
    </div>
  </div>
  
  <footer class="mt-5 shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Mangandaralam Sakti</span> © 2023</p>
      <p class="mt-2">versi 1.0</p>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
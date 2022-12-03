<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'function.php';
//jika tidak id maka
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST['ubah'])) {
  if (ubahmhs($_POST) > 0) { ?>
    <script>
      alert('Data Berhasil Diubah !');
      document.location.href = 'index.php';
    </script>
<?php } else {
    echo "Data Gagal Diubah";
  }
  // CobaVar($_POST);
  // var_dump($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Mahasiswa</title>
</head>

<body>
  <h3>Form Edit Data Mhasiswa </h3>
  <form action="" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
    <ul>
      <li>
        <label>
          Nama
          <input type="text" name="nama" maxlength="100" size="50" autofocus required value="<?= $mhs['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          NIM
          <input type="text" name="nim" maxlength="9" size="9" required value="<?= $mhs['nim']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan
          <input type="text" name="jurusan" maxlength="40" size="50" required value="<?= $mhs['jurusan']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email
          <input type="text" name="email" maxlength="100" size="50" required value="<?= $mhs['email']; ?>">
        </label>
      </li>
      <input type="hidden" name="gambar_lama" value="<?= $mhs['gambar'] ?>">
      <li>
        <label>
          Gambar
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/<?= $mhs['gambar']; ?>" alt="" width="150px" style="display: block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
    </ul>

  </form>
  <script src="js/script.js"></script>
</body>


</html>
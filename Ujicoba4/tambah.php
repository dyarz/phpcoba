<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'function.php';
//cek tombol tambah iiset
if (isset($_POST['tambah'])) {
  if (tambahmhs($_POST) > 0) { ?>
    <script>
      alert('Data Berhasil Ditambahkan !');
      document.location.href = 'index.php';
    </script>
<?php } else {
    echo "Data Gagal Ditambahkan";
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
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Tambah Data Mhasiswa </h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Nama
          <input type="text" name="nama" autofocus required maxlength="100" size="50">
        </label>
      </li>
      <li>
        <label>
          NIM
          <input type="text" name="nim" maxlength="9" size="9" required>
        </label>
      </li>
      <li>
        <label>
          Jurusan
          <input type="text" name="jurusan" size="50" maxlength="40" required>
        </label>
      </li>
      <li>
        <label>
          Email
          <input type="text" name="email" size="100" maxlength="50" required>
        </label>
      </li>
      <li>
        <label>
          Gambar
          <input type="file" name="gambar">
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data</button>
      </li>
    </ul>

  </form>
</body>

</html>
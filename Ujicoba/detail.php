<?php
require 'function.php';
$id = $_GET['id'];
// query mahasisawa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>
    Detail Mahasiswa
  </h3>
  <ul>
    <li><img src="img/<?= $mhs['gambar']; ?>"></li>
    <li>NIM : <?= $mhs['nim']; ?></li>
    <li>Nama :<?= $mhs['nama']; ?></li>
    <li>Email :<?= $mhs['email']; ?></li>
    <li>Jurusan :<?= $mhs['jurusan']; ?></li>
    <li><a href="">UBAH</a>| <a href=""> HAPUS </a> </li>
    <li><a href="latihan3.php">Kembali</a></li>
</body>

</html>
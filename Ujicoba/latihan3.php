<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <table border="1" cellpadding="10" cellspacing="10">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama Mahasiswa</th>

      <th>Aksi</th>
    </tr>
    <?php foreach ($mahasiswa as $mhs) : ?>
      <tr>
        <td><?= $mhs['id']; ?></td>
        <td><img src="img/<?= $mhs['gambar']; ?>" width="60"></td>
        <td><?= $mhs['nim']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><a href="detail.php?id=<?= $mhs['id']; ?>">LIHAT DETAIL</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
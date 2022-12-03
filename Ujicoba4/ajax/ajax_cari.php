<?php
require '../function.php';
$mahasiswa = carimhs($_GET['keyword']);

//var_dump($mahasiswa);
// echo "helo world";
?>
<table border="1" cellpadding="10" cellspacing="10">
  <tr>
    <th>#</th>
    <th>Gambar</th>
    <th>NIM</th>
    <th>Nama Mahasiswa</th>
    <th>Aksi</th>
    <?php if (empty($mahasiswa)) : ?>
  </tr>
  <td colspan="5">
    <p style="color: red;font-style: italic;">Data Mahasiswa Tidak ditemukan</p>
  </td>
  <tr>

  </tr>
<?php
    endif;
    $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
  <tr>
    <td><?= $i++; ?></td>
    <td><img src="img/<?= $mhs['gambar']; ?>" width="60"></td>
    <td><?= $mhs['nim']; ?></td>
    <td><?= $mhs['nama']; ?></td>
    <td><a href="detail.php?id=<?= $mhs['id']; ?>">LIHAT DETAIL</a></td>
  </tr>
<?php endforeach; ?>
</table>
<?php
function koneksi()
{
  $servername = "localhost";
  $username = "root";
  $pass = '';
  $dbname = "phpdasar";
  $conn = mysqli_connect($servername, $username, $pass, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  return mysqli_connect($servername, $username, $pass, $dbname);
}
function query($query)
{
  $db = koneksi();
  $disp = mysqli_query($db, $query);
  if (mysqli_num_rows($disp) == 1) {
    return mysqli_fetch_assoc($disp);
  } else {
    $rows = [];
    while ($row = mysqli_fetch_assoc($disp)) {
      $rows[] = $row;
    }
    return $rows;
  }
}
function tambahmhs($data)
{
  //var_dump($data);
  $conn = koneksi();
  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO `mahasiswa` VALUES (null, '$nama', '$nim', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
function CobaVar($data)
{
  var_dump($data);
}
function hapusid($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
function ubahmhs($data)
{
  $conn = koneksi();
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);
  $query = "UPDATE `mahasiswa` SET `nama`='$nama',`email` = '$email', `jurusan` = '$jurusan', `gambar` = '$gambar' WHERE `id` = '$id'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

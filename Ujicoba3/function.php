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
function carimhs($mhs)
{
  $conn = koneksi();
  $query = "SELECT * FROM mahasiswa
  WHERE nama LIKE '%$mhs%' OR
  nim LIKE '%$mhs%'";
  $disp = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($disp)) {
    $rows[] = $row;
  }
  return $rows;
}
function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);


  $konek = query("SELECT * FROM `user` WHERE username='$username'");

  if (!empty($konek) && password_verify($password, $konek['password'])) {
    $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username/Password Salah!'
    ];
  }
}
function regist($data)
{
  $conn = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password = mysqli_real_escape_string($conn, $data['password']);
  $confimpass = mysqli_real_escape_string($conn, $data['confirmpass']);
  if (empty($username) || empty($password) || empty($confimpass)) { ?>
    <script>
      alert('Username/Password tidak boleh Kosong');
      document.location.href = 'registrasi.php';
    </script>
  <?php
    return false;
  } else if (query("SELECT * FROM user WHERE username='$username'")) { ?>
    <script>
      alert('Username Sudah ada');
      document.location.href = 'registrasi.php';
    </script>
  <?php return false;
  } else if ($password !== $confimpass) { ?>
    <script>
      alert('Konfirmasi Password Salah');
      document.location.href = 'registrasi.php';
    </script>
  <?php
    return false;
  } else if (strlen($password) < 5) { ?>
    <script>
      alert('Panjang Password Minimal 5');
      document.location.href = 'registrasi.php';
    </script>
<?php

  }
  //enkripsi password
  $new_password = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO user 
  VALUES (null,'$username','$new_password')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
} ?>
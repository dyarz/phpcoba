<?php
require "function.php";
if (isset($_POST['submit'])) {
  if (regist($_POST) > 0) { ?>
    <script>
      alert('User Berhasil Ditambahkan !');
      document.location.href = 'login.php';
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
  <title> Registrasi</title>
</head>

<body>
  <h3>Form Registrasi</h3>
  <form action="" method="post">
    <ul>
      <li><label>
          Username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label></li>
      <li>
        <label>
          Password :
          <input type="password" name="password" required>
        </label>
      </li>
      <li>
        <label>
          Konfirm Password :
          <input type="password" name="confirmpass" required>
        </label>
      </li>
      <li>
        <button type="submit" name="submit">Daftar</button>
      </li>
    </ul>

  </form>
</body>

</html>
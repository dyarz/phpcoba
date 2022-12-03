<?php
require 'function.php';
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}
$id = $_GET['id'];
if (hapusid($id) > 0) { ?>
  <script>
    alert('Data Berhasil Dihapus !');
    document.location.href = 'index.php';
  </script>
<?php } else {
  echo "Data Gagal Dihapus";
}

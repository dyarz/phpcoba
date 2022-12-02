<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'phpdasar');
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

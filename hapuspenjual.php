<?php
include "koneksi.php";
if (isset($_GET['kdpenjual'])) {
  $kdpenjual = $_GET['kdpenjual'];
  $a = "delete from tblpenjual where kdpenjual='$kdpenjual'";
  $b = mysqli_query($koneksi, $a);
  if ($b) {
    header("location:beranda.php?page=datapenjual");
  }
} else {
  header("location:beranda.php?page=datapenjual");
}

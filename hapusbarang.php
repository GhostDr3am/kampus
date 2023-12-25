<?php
include "koneksi.php";
if (isset($_GET['kdbarang'])) {
  $kdbarang = $_GET['kdbarang'];
  $a = "delete from tblbarang where kdbarang='$kdbarang'";
  $b = mysqli_query($koneksi, $a);
  if ($b) {
    header("location:beranda.php?page=databarang");
  }
} else {
  header("location:beranda.php?page=databarang");
}

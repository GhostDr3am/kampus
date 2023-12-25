<?php
include "koneksi.php";
if (isset($_GET['email'])) {
  $email = $_GET['email'];
  $a = "delete from user where email='$email'";
  $b = mysqli_query($koneksi, $a);
  if ($b) {
    header("location:beranda.php?page=datapembeli");
  }
} else {
  header("location:beranda.php?page=datapembeli");
}

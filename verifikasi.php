<?php
include "koneksi.php";
if (isset($_GET['email'])) {
  // Get the submitted form data
  $email = $_GET['email'];
  $sql = "update user set verifikasi='Y' where email='$email'";
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    echo "<h3 align='center'>Akun email sudah diverifikasi, 
		silahkan login <a href='login.php'>disini</a></h3>";
  } else {
    echo "Verifikasi akun email gagal";
  }
}

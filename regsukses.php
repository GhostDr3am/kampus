<?php
if (isset($_GET['email'])) {
  // Get the submitted form data
  $email = "admin@pelatihancms.my.id";
  $name = "Admin";
  $subject = "Selamat!";
  $message = "Anda sudah berhasil kirim email";
  // Cek apakah ada data yang belum diisi

  // Pengaturan penerima email dan subjek email
  $toEmail = $_GET['email']; // Ganti dengan alamat email yang Anda inginkan
  $emailSubject = 'Verifikasi Akun Pendaftaran Anda';
  $htmlContent = 'Seseorang telah  mendaftar pada website pelatihancms.my.id<br>
    Jika itu adalah Anda, silahkan klik link berikut untuk verifikasi Akun email Anda :<br>
     https://keamananweb.pelatihancms.my.id/verifikasi.php?email=' . $_GET['email'];
  // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  // Header tambahan
  $headers .= 'From: ' . $name . '<' . $email . '>' . "\r\n";
  // Send email
  if (mail($toEmail, $emailSubject, $htmlContent, $headers)) {
    echo "<h3 align='center'>Pendaftaran sukses, silahkan cek email anda untuk verifikasi akun.</h3>";
  } else {
    echo "Email gagal";
  }
}

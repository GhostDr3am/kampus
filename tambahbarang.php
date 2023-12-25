<?php
include "koneksi.php";
?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tambah Barang</h3>
        <p class="text-subtitle text-muted">Data Barang</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="beranda.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          Tambah Data Barang
        </h5>
      </div>
      <div class="card-body">
        <?php
        include "koneksi.php";
        if (isset($_POST['simpan'])) {

          $kdbarang = $_POST['kdbarang'];
          $nama_brg = $_POST['nama_brg'];
          $jenis = $_POST['jenis'];
          $kondisi = $_POST['kondisi'];
          $deskripsi = $_POST['deskripsi'];
          $foto = $_FILES['foto']['name'];
          $tmp = $_FILES['foto']['tmp_name'];
          $ekstensi = ['png', 'jpg', 'jpeg'];
          $ukuran = $_FILES['foto']['size'];

          $a = mysqli_query($koneksi, "select * from tblbarang where kdbarang='$kdbarang'");
          if (mysqli_num_rows($a) > 0) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Gagal!</strong> Kode Barang sudah digunakan!
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
          } else {
            if ($_FILES['foto']['error'] == 4) {
              $sql = "insert into tblbarang values('$kdbarang','$nama_brg','$jenis',
		          '$kondisi','$deskripsi','default.png')";
              $query = mysqli_query($koneksi, $sql);
            } else {
              $sql = "insert into tblbarang values('$kdbarang','$nama_brg','$jenis',
		          '$kondisi','$deskripsi','$foto')";
              if ($_FILES['foto']['size'] > 1000000) {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Gagal!</strong> Ukuran file maksimal 2MB!
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
                $query = false;
              } else {
                $ekstensi_file = explode('.', $foto);
                $ekstensi_foto = strtolower(end($ekstensi_file));
                if (!in_array($ekstensi_foto, $ekstensi)) {
                  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <strong>Gagal!</strong> Ekstensi file salah!
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                  $query = false;
                } else {
                  $query = mysqli_query($koneksi, $sql);
                  move_uploaded_file($tmp, "./img/foto_brg/$foto");
                }
              }
            }
            if ($query) {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Sukses!</strong> Data berhasil disimpan! <a href='?page=databarang'>LIHAT DATA</a>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
            } else {
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Gagal!</strong> Data gagal disimpan!
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
            }
          }
        }
        ?>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Kode Barang</label>
            <div class="col-sm-8">
              <input name="kdbarang" type="text" class="form-control" id="inputEmail3" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input name="nama_brg" type="text" class="form-control" id="inputEmail3" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Barang</label>
            <div class="col-sm-8">
              <select name="jenis" class="form-select" aria-label="Default select example">
                <option value="Laptop">Laptop</option>
                <option value="Handphone">Handphone</option>
                <option value="Tablet">Tablet</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Deskripsi Barang</label>
            <div class="col-sm-8">
              <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
          </div>
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Kondisi</legend>
            <div class="col-sm-8">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="gridRadios1" value="Baru" checked>
                <label class="form-check-label" for="gridRadios1">
                  Baru
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="gridRadios2" value="Bekas">
                <label class="form-check-label" for="gridRadios2">
                  Bekas
                </label>
              </div>

            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Upload Foto</label>
            <div class="col-sm-8">
              <input name="foto" class="form-control" type="file" id="formFile" required>
            </div>
          </div>
          <input type="submit" class="btn btn-primary" name="simpan" value="SIMPAN">
          <input type="reset" class="btn btn-warning" name="batal" value="BATAL">
        </form>
      </div>
    </div>
  </section>
</div>
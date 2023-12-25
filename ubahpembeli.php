<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Ubah Pembeli</h3>
        <p class="text-subtitle text-muted">Data Pembeli</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="beranda.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Pembeli</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          Ubah Data Pembeli
        </h5>
      </div>
      <div class="card-body">
        <?php
        include "koneksi.php";
        if (isset($_GET['email'])) {
          $email = $_GET['email'];
          $a = "select * from user where email='$email'";
          $b = mysqli_query($koneksi, $a);
          $c = mysqli_fetch_array($b);
        }

        if (isset($_POST['simpan'])) {
          $nama_lengkap = $_POST['nama_lengkap'];
          $alamat = $_POST['alamat'];
          $jk = $_POST['jk'];
          $telepon = $_POST['telepon'];
          $verifikasi = $_POST['verifikasi'];
          $foto = $_FILES['foto']['name'];
          $tmp = $_FILES['foto']['tmp_name'];
          if (strlen($foto) > 0) {
            $sql = "update user set nama_lengkap='$nama_lengkap',alamat='$alamat',jk='$jk',telepon='$telepon',foto='$foto' where email='$email'";
            $query = mysqli_query($koneksi, $sql);
            move_uploaded_file($tmp, "img/foto_user/$foto");
          } else {
            $sql = "update user set nama_lengkap='$nama_lengkap',alamat='$alamat',jk='$jk',telepon='$telepon',verifikasi='$verifikasi' where email='$email'";
            $query = mysqli_query($koneksi, $sql);
          }
          if ($query) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Sukses!</strong> Data berhasil disimpan! <a href='?page=datapembeli'>LIHAT DATA</a>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
          } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Gagal!</strong> Data gagal disimpan!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
          }
        }
        ?>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input name="email" value="<?php echo $c['email']; ?>" type="text" class="form-control" id="inputEmail3" disabled>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Pembeli</label>
            <div class="col-sm-8">
              <input name="nama_lengkap" type="text" value="<?php echo $c['nama_lengkap']; ?>" class="form-control" id="inputEmail3">
            </div>
          </div>
          <!-- jenis kelamin -->
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin</legend>
            <div class="col-sm-8">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="L" <?php if ($c['jk'] == "L") {
                                                                                                    echo "checked";
                                                                                                  } ?>>
                <label class="form-check-label" for="gridRadios1">
                  Laki-Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="gridRadios2" value="P" <?php if ($c['jk'] == "P") {
                                                                                                    echo "checked";
                                                                                                  } ?>>
                <label class="form-check-label" for="gridRadios2">
                  Perempuan
                </label>
              </div>
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $c['alamat']; ?></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">NO Hp</label>
            <div class="col-sm-8">
              <input name="telepon" type="text" value="<?php echo $c['telepon']; ?>" class="form-control" id="inputEmail3">
            </div>
          </div>
          <!-- verifkasi -->
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Verifikasi</label>
            <div class="col-sm-8">
              <select class="form-select" name="verifikasi" id="inputPassword3">
                <option value="N">Belum Verifikasi</option>
                <option value="Y">Sudah Verifikasi</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Upload Foto</label>
            <div class="col-sm-8">
              <img src="img/foto_user/<?php echo $c['foto']; ?>" width="70px" class="img-thumbnail" alt="..."><br>
              <input name="foto" class="form-control" type="file" id="formFile">
            </div>
          </div>
          <input type="submit" class="btn btn-primary" name="simpan" value="SIMPAN">
          <input type="reset" class="btn btn-warning" name="batal" value="BATAL">
        </form>
      </div>
    </div>
  </section>
</div>
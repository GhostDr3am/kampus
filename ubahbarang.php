<?php
include "koneksi.php";
?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Ubah Barang</h3>
        <p class="text-subtitle text-muted">Data Barang</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="beranda.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Barang</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          Ubah Data Barang
        </h5>
      </div>
      <div class="card-body">
        <?php
        include "koneksi.php";
        if (isset($_GET['kdbarang'])) {
          $kdbarang = $_GET['kdbarang'];
          $a = "select * from tblbarang where kdbarang='$kdbarang'";
          $b = mysqli_query($koneksi, $a);
          $c = mysqli_fetch_array($b);
        }

        if (isset($_POST['simpan'])) {
          $nama_brg = $_POST['nama_brg'];
          $jenis = $_POST['jenis'];
          $kondisi = $_POST['kondisi'];
          $deskripsi = $_POST['deskripsi'];
          $foto = $_FILES['foto']['name'];
          $tmp = $_FILES['foto']['tmp_name'];
          if (strlen($foto) > 0) {
            $sql = "update tblbarang set nama_brg='$nama_brg',jenis='$jenis',
			kondisi='$kondisi',deskripsi='$deskripsi',foto='$foto' where kdbarang='$kdbarang'";
            $query = mysqli_query($koneksi, $sql);
            move_uploaded_file($tmp, "img/foto_brg/$foto");
          } else {
            $sql = "update tblbarang set nama_brg='$nama_brg',jenis='$jenis',
			kondisi='$kondisi',deskripsi='$deskripsi' where kdbarang='$kdbarang'";
            $query = mysqli_query($koneksi, $sql);
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
        ?>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Kode Barang</label>
            <div class="col-sm-8">
              <input name="kdbarang" value="<?php echo $c['kdbarang']; ?>" type="text" class="form-control" id="inputEmail3" disabled>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Barang</label>
            <div class="col-sm-8">
              <input name="nama_brg" type="text" value="<?php echo $c['nama_brg']; ?>" class="form-control" id="inputEmail3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Barang</label>
            <div class="col-sm-8">
              <select name="jenis" class="form-select" aria-label="Default select example">
                <option value="Laptop" <?php if ($c['jenis'] == "Laptop") {
                                          echo "selected";
                                        } ?>>Laptop</option>
                <option value="Handphone" <?php if ($c['jenis'] == "Handphone") {
                                            echo "selected";
                                          } ?>>Handphone</option>
                <option value="Tablet" <?php if ($c['jenis'] == "Tablet") {
                                          echo "selected";
                                        } ?>>Tablet</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Deskripsi Barang</label>
            <div class="col-sm-8">
              <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $c['deskripsi']; ?></textarea>
            </div>
          </div>
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Kondisi</legend>
            <div class="col-sm-8">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="gridRadios1" value="Baru" <?php if ($c['kondisi'] == "Baru") {
                                                                                                            echo "checked";
                                                                                                          } ?>>
                <label class="form-check-label" for="gridRadios1">
                  Baru
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kondisi" id="gridRadios2" value="Bekas" <?php if ($c['kondisi'] == "Bekas") {
                                                                                                              echo "checked";
                                                                                                            } ?>>
                <label class="form-check-label" for="gridRadios2">
                  Bekas
                </label>
              </div>

            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Upload Foto</label>
            <div class="col-sm-8">
              <img src="img/foto_brg/<?php echo $c['foto']; ?>" width="70px" class="img-thumbnail" alt="..."><br>
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
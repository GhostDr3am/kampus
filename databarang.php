<?php
include "koneksi.php";
?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Barang</h3>
        <p class="text-subtitle text-muted">Data Barang</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="beranda.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">
          <a href="?page=tambahbarang">
            <button class="btn btn-primary">
              <i class="fa-solid fa-plus"></i>
              <span>Tambah</span>
            </button>
          </a>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Kode</th>
                <th>Nama barang</th>
                <th>Jenis Barang</th>
                <th>Kondisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($koneksi, "select * from tblbarang");
              while ($a = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <?php
                    if (strlen($a['foto']) > 0) {
                    ?>
                      <img src="./img/foto_brg/<?php echo $a['foto']; ?>" width="70px" class="img-thumbnail" alt="...">
                    <?php } else { ?>
                      <img src="./img/foto_brg/default.png" width="70px" class="img-thumbnail" alt="...">
                    <?php } ?>
                  </td>
                  <td><?= $a['kdbarang']; ?></td>
                  <td><?= $a['nama_brg']; ?></td>
                  <td><?= $a['jenis']; ?></td>
                  <td><?= $a['kondisi']; ?></td>
                  <td><a href="?page=ubahbarang&&kdbarang=<?= $a['kdbarang']; ?>">
                      <i class="fa-solid fa-edit"></i></a> |
                    <a href="hapusbarang.php?kdbarang=<?= $a['kdbarang']; ?>" onclick="return confirm('Yakin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</div>
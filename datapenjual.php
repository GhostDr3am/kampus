<?php
include "koneksi.php";
?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Penjual</h3>
        <p class="text-subtitle text-muted">Data Penjual</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="beranda.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penjual</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <!-- <h5 class="card-title">
          <a href="?page=tambahpenj">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
              <i class="bi bi-file-earmark-spreadsheet-fill"></i>
              <span>Tambah</span>
            </button>
          </a>
        </h5> -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table1">
            <thead>
              <tr>
                <th>NO</th>
                <th>Poto</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>alamat</th>
                <th>Telepon</th>
                <th>Verifikasi</th>

                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($koneksi, "select * from user where level='penjual'");
              while ($a = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <?php
                    if (strlen($a['foto']) > 0) {
                    ?>
                      <img src="./img/foto_user/<?php echo $a['foto']; ?>" width="70px" class="img-thumbnail" alt="...">
                    <?php } else { ?>
                      <img src="./img/foto_user/user_default.jpg" width="70px" class="img-thumbnail" alt="...">
                    <?php } ?>
                  </td>
                  <td><?= $a['nama_lengkap']; ?></td>
                  <td><?= $a['email']; ?></td>
                  <td><?php echo $a['jk']; ?></td>
                  <td><?php echo $a['alamat']; ?></td>
                  <td><?php echo $a['telepon']; ?></td>
                  <td><?php echo $a['verifikasi']; ?></td>

                  <td><a href="?page=ubahpenjual&&email=<?php echo $a['email']; ?>"><i class="fa-solid fa-edit"></i></a></a> |
                    <a href="hapuspenjual.php?email=<?php echo $a['email']; ?>" onclick="return confirm('Yakin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
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
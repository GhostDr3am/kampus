<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Selamat Datang <?php echo $_SESSION['nama_lengkap']; ?></h3>
        <p class="text-subtitle text-muted">A page where users can change profile information</p>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <?php
						$sql = mysqli_query($koneksi, "select * from user where
                        email='$_SESSION[email]'");
						$dt = mysqli_fetch_assoc($sql);
						?>
            <div class="d-flex justify-content-center align-items-center flex-column">
              <div class="avatar avatar-2xl">
                <img src="./img/foto_user/<?php echo $dt['foto']; ?>" class="img-thumbnail" alt="...">
              </div>

              <h3 class="mt-3"><?php echo $dt['nama_lengkap']; ?></h3>
              <p class="text-small"><?php echo $dt['level']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordeless mb-0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <th><?php echo $dt['nama_lengkap']; ?></th>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th>:</th>
                    <th><?php echo $dt['email']; ?></th>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <th><?php echo $dt['alamat']; ?></th>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <th>:</th>
                    <th><?php $jk = ($dt['jk'] == "L") ? "Laki-Laki" : "Perempuan";
												echo $jk; ?></th>
                  </tr>
                  <tr>
                    <th>Telepon</th>
                    <th>:</th>
                    <th><?php echo $dt['telepon']; ?></th>
                  </tr>
                </thead>
              </table><br>
              <a href="?page=updateprofil&&email=<?php echo $dt['email']; ?>">
                <button class="btn btn-primary">
                  <i class="fa-solid fa-plus"></i>
                  <span>Update Profile</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="container-fluid">
	<div class="alert alert-success bg-success text-white p-5 shadow">
			<h3>Halo <?= $nama_user ?>, Anda Login Sebagai <?= $jabatan ?></h3>
			<h4>
				Selamat Datang di Aplikasi
				<b>Sistem Informasi Pengelolaan Keuangan</b> <br>
				Pada
				<b>SMK NU 02 ROWOSARI</b>
			</h4>
	</div>


	<div class="row mt-5">

    <div class="col-xl-4 col-md-4 mb-4">
      <a href="<?= base_url('transaksi/pengeluaran') ?>" class="text-secondary">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    Jumlah Pengeluaran
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                           <?= "Rp. ".number_format($jumlah_pengeluaran->nominal) ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
      <a href="<?= base_url('transaksi/pengeluaran') ?>" class="text-secondary">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                Jumlah Pemasukan
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?= "Rp. ".number_format($jumlah_pemasukan->nominal) ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              Jumlah Siswa
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?= $jumlah_siswa ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              Jumlah Kelas
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?= $jumlah_kelas ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              Jumlah Jurusan
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?= $jumlah_jurusan ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>



</div>
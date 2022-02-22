<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemasukan</li>
        </ol>
    </nav>
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-dismissible fade show alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
		</div>
	<?php endif ?>

    
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Tambah Kategori Pemasukan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <form action="<?= base_url("pemasukan/simpan") ?>" method="POST">
                                <div class="form-group">
                                    <label for="">Nama Kategori Pemasukan</label>
                                    <input type="text" name="nama_jenis_pemasukan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Periode</label>
                                    <select name="periode_pemasukan" class="form-control">
                                        <option value="11">Satu Kali</option>
                                        <option value="1">Setiap 1 Bulan</option>
                                        <option value="6">Setiap 6 Bulan</option>
                                        <option value="12">Setiap 1 Tahun</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="number" class="form-control" placeholder="Nominal per periode" name="nominal">
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End Card -->
        </div>

        <div class="col-6 mx-auto">
            <div class="card shadow mb-3">
                <div class="card-header text-white bg-primary">
                    <h5 class="card-title">Daftar Kategori Pemasukan</h5>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-hover table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori Pemasukan</th>
                                <th>Periode</th>
                                <th>Nominal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

        <?php if (count($pemasukan) < 1): ?>
                            <tr>
                                <td colspan="4" class="text-center h3 p-5">Data Kosong</td>
                            </tr>
        <?php endif ?>
        <?php $no = 1; foreach ($pemasukan as $k): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $k->nama_jenis_pemasukan ?></td>
                                <td>
                                    <?php if ($k->periode_pemasukan == 1): ?>
                                        Setiap 1 Bulan
                                    <?php elseif ($k->periode_pemasukan == 6): ?>
                                        Setiap 6 Bulan
                                    <?php elseif ($k->periode_pemasukan == 12): ?>
                                        Setiap 1 Tahun
                                    <?php else: ?>
                                        Satu Kali
                                    <?php endif ?>
                                </td>
                                <td>
                                    Rp. <?= number_format($k->nominal, 0); ?>
                                </td>
                                <td>
                                    <!-- <a href="<?= base_url() ?>pemasukan/detail/<?= $k->id_jenis_pemasukan ?>">
                                        <button class="btn btn-success text-white">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a> -->
                                    <a href="<?= base_url() ?>pemasukan/edit/<?= $k->id_jenis_pemasukan ?>">
                                        <button class="btn btn-warning text-white">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= base_url() ?>pemasukan/hapus/<?= $k->id_jenis_pemasukan ?>">
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
        <?php $no++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- col -->
    </div>
	
	
</div>
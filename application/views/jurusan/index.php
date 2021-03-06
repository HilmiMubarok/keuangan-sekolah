<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jurusan</li>
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
        <div class="col-12 col-lg-6 mb-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Tambah Jurusan</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url("jurusan/simpan") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama jurusan</label>
                            <input type="text" name="nama_jurusan" placeholder="Masukkan Nama Jurusan" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">
                            <i class="fas fa-save"></i> Simpan
                        </button>
					</form>
                </div>
            </div>
        </div> <!-- End Col -->
        <div class="col-12 col-lg-6 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">
                        Daftar Jurusan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jurusan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
            <?php if (count($jurusan) < 1): ?>
                                <tr>
                                    <td colspan="3" class="text-center h3 p-5">Data Kosong</td>
                                </tr>
            <?php endif ?>
            <?php $no = 1; foreach ($jurusan as $j): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $j->nama_jurusan ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>jurusan/edit/<?= $j->id_jurusan ?>" data-toggle="tooltip" class="btn btn-warning text-white" data-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url() ?>jurusan/hapus/<?= $j->id_jurusan ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
            <?php $no++; endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- End Col -->
    </div>
	
</div>
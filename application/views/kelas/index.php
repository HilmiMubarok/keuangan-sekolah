<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelas</li>
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
            <div class="card shadow mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Tambah Kelas</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url("kelas/simpan") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan_id" class="form-control">
                                <?php foreach($jurusan as $j): ?>
                                    <option value="<?= $j->id_jurusan ?>"><?= $j->nama_jurusan ?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div> <!-- End Card -->
        </div>

        <div class="col-12 col-lg-6 mb-3 mx-auto">
            <div class="card shadow mb-3">
                <div class="card-header text-white bg-primary">
                    <h5 class="card-title">Daftar Kelas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

            <?php if (count($kelas) < 1): ?>
                                <tr>
                                    <td colspan="4" class="text-center h3 p-5">Data Kosong</td>
                                </tr>
            <?php endif ?>
            <?php $no = 1; foreach ($kelas as $k): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $k->nama_kelas ?></td>
                                    <td><?= (!$k->nama_jurusan ? "Jurusan Dihapus" : $k->nama_jurusan) ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>kelas/detail/<?= $k->id_kelas ?>" class="btn btn-success text-white" data-toggle="tooltip" data-placement="top" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url() ?>kelas/edit/<?= $k->id_kelas ?>" class="btn btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url() ?>kelas/hapus/<?= $k->id_kelas ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
        </div> <!-- col -->
    </div>
	
	
</div>
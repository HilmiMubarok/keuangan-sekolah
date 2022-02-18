<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">
                        Daftar Jurusan
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jurusan</th>
                                <?php if ($this->session->userdata('role') == "Bendahara"): ?>
                                <th>Opsi</th>
                                <?php endif ?>
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
                                <?php if ($this->session->userdata('role') == "Bendahara"): ?>
                                <td>
                                    <a href="<?= base_url() ?>jurusan/edit/<?= $j->id_jurusan ?>">
                                        <button class="btn btn-warning text-white">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= base_url() ?>jurusan/hapus/<?= $j->id_jurusan ?>">
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                                <?php endif ?>
                            </tr>
        <?php $no++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- End Col -->
        <div class="col-6">
            

            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Tambah Jurusan</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url("jurusan/simpan") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">
                            <i class="fas fa-save"></i> Simpan
                        </button>
					</form>
                </div>
            </div>
        
        </div> <!-- End Col -->
    </div>
	
</div>
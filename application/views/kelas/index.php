<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

	<?php if ($this->session->userdata('role') == "Bendahara"): ?>
	<div class="card shadow mb-3">
		<div class="card-body">
				
			<div class="row">
				<div class="col-6">
                    <h3 class="mb-3">Tambah Kelas</h3>
                    <form action="<?= base_url("kelas/simpan") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control">
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
				<div class="col-6 mx-auto">
                    <h3 class="mb-5">Daftar Kelas</h3>
					<table class="table table-hover table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Jurusan</th>
                                <?php if ($this->session->userdata('role') == "Bendahara"): ?>
                                <th>Opsi</th>
                                <?php endif ?>
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
                                <td><?= $k->nama_jurusan ?></td>
                                <?php if ($this->session->userdata('role') == "Bendahara"): ?>
                                <td>
                                    <a href="<?= base_url() ?>kelas/detail/<?= $k->id_kelas ?>">
                                        <button class="btn btn-success text-white">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= base_url() ?>kelas/edit/<?= $k->id_kelas ?>">
                                        <button class="btn btn-warning text-white">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= base_url() ?>kelas/hapus/<?= $k->id_kelas ?>">
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
		</div>
	</div> <!-- End Card -->
	<?php endif ?>
	
</div>
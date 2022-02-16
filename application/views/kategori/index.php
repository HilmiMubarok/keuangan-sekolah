<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

	<h3 class="mb-3">Daftar Kategori</h3>
		
	<?php if ($this->session->userdata('jabatan') == "staff_sarpras"): ?>
	<div class="card shadow mb-3">
		<div class="card-body">
				
			<div class="row">
				<div class="col-6">
					<form action="<?= base_url("kategori/simpan") ?>" method="POST">
						<button type="submit" class="btn btn-primary mb-3">
							<i class="fas fa-save"></i> Tambah Kategori
						</button>
						<div class="form-group">
							<label for="">Id Kategori</label>
							<input type="text" name="id_kategori" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Nama Kategori</label>
							<input type="text" name="nama_kategori" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Umur Ekonomis</label>
							<input type="number" name="umur_ekonomis" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<input type="text" name="status" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Metode Penyusutan</label>
							<input type="text" name="metode_penyusutan" class="form-control">
						</div>
					</form>
				</div>
				<div class="col-6 mx-auto">
					<form action="<?= base_url("kategori/") ?>" method="POST" class="form-inline">
						<button type="submit" class="btn btn-success mr-3">
							<i class="fas fa-search"></i> Cari Data
						</button>
						<input type="text" name="cari_kategori" placeholder="Cari Data Kategori" class="form-control form-search">
					</form>
				</div>
			</div>
		</div>
	</div> <!-- End Card -->
	<?php endif ?>
	<div class="card shadow">
		<div class="card-body">
			<table class="table table-hover table-stripped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Kategori</th>
						<th>Nama Kategori</th>
						<th>Umur Ekonomis</th>
						<th>Status</th>
						<th>Metode Penyusutan</th>
						<?php if ($this->session->userdata('jabatan') == "staff_sarpras"): ?>
						<th>Opsi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>

<?php if (count($kategori) < 1): ?>
					<tr>
						<td colspan="7" class="text-center h3 p-5">Data Kosong</td>
					</tr>
<?php endif ?>
<?php $no = 1; foreach ($kategori as $k): ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $k->id_kategori ?></td>
						<td><?= $k->nama_kategori ?></td>
						<td><?= $k->umur_ekonomis ?></td>
						<td><?= $k->status ?></td>
						<td><?= $k->metode_penyusutan ?></td>
						<?php if ($this->session->userdata('jabatan') == "staff_sarpras"): ?>
						<td>
							<a href="<?= base_url() ?>kategori/edit/<?= $k->id_kategori ?>">
								<button class="btn btn-warning text-white">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url() ?>kategori/hapus/<?= $k->id_kategori ?>">
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
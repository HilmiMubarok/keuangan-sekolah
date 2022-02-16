<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

	<h3 class="mb-3">Daftar Aktiva Tetap</h3>
	<?php if ($this->session->userdata('jabatan') == "staff_sarpras"): ?>
		
	<div class="card shadow mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<form action="<?= base_url("aktiva_tetap/simpan") ?>" method="POST">
						<button type="submit" class="btn btn-primary mb-3">
							<i class="fas fa-save"></i> Tambah Aktiva Tetap
						</button>
						<div class="form-group">
							<label>Id Aktiva Tetap</label>
							<input type="text" name="id_aktiva_tetap" class="form-control">
						</div>
						<div class="form-group">
							<label>Nama Aktiva Tetap</label>
							<input type="text" name="nama_aktiva_tetap" class="form-control">
						</div>
						<div class="form-group">
							<label>Merk / Type</label>
							<input type="text" name="merk_aktiva_tetap" class="form-control">
						</div>
						<div class="form-group">
							<label>Tanggal Perolehan</label>
							<input type="text" name="tgl_perolehan" class="form-control datepicker">
						</div>
						<div class="form-group">
							<label>Harga Perolehan</label>
							<input type="number" name="harga_perolehan" class="form-control">
						</div>
						<div class="form-group">
							<label>Perolehan Dana</label>
							<select name="perolehan_dana" class="form-control">
								<option value="bos">BOS</option>
								<option value="sekolah">Sekolah</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nilai Residu</label>
							<input type="number" name="nilai_residu" class="form-control">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan_aktiva_tetap" class="form-control">
						</div>
					</form>
				</div>
				<div class="col-6 mx-auto">
					<form action="<?= base_url("aktiva_tetap") ?>" method="POST" class="form-inline">
						<button type="submit" class="btn btn-success mr-3">
							<i class="fas fa-search"></i> Cari Data
						</button>
						<input type="text" name="cari_aktiva_tetap" placeholder="Cari Data Aktiva Tetap" class="form-control form-search">
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
						<th>Id Aktiva Tetap</th>
						<th>Nama Aktiva Tetap</th>
						<th>Merk / Type</th>
						<th>Tanggal Perolehan</th>
						<th>Harga Perolehan</th>
						<th>Perolehan Dana</th>
						<th>Nilai Residu</th>
						<th>Keterangan</th>
						<?php if ($this->session->userdata('jabatan') == "staff_sarpras"): ?>
						<th>Opsi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>

<?php if (count($at) < 1): ?>
					<tr>
						<td colspan="9" class="text-center h3 p-5">Data Kosong</td>
					</tr>
<?php endif; $no = 1; foreach ($at as $a): ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $a->id_aktiva_tetap ?></td>
						<td><?= $a->nama_aktiva_tetap ?></td>
						<td><?= $a->merk ?></td>
						<td><?= formatHariTanggal($a->tgl_perolehan) ?></td>
						<td><?= number_format($a->harga_perolehan) ?></td>
						<td><?= $a->perolehan_dana ?></td>
						<td><?= number_format($a->nilai_residu) ?></td>
						<td><?= $a->keterangan ?></td>
						<?php if ($this->session->userdata('jabatan') == "staff_sarpras"): ?>
						<td>
							<a href="<?= base_url() ?>aktiva_tetap/edit/<?= $a->id_aktiva_tetap ?>">
								<button class="btn btn-warning text-white">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url() ?>aktiva_tetap/hapus/<?= $a->id_aktiva_tetap ?>">
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
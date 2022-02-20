<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

	<h3 class="mb-3">Entry Data Penyusutan</h3>
	<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
	<div class="card shadow mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<form action="<?= base_url("penyusutan/simpan") ?>" method="POST">
						<button type="submit" class="btn btn-primary mb-3">
							<i class="fas fa-save"></i> Tambah Data
						</button>
						<div class="form-group">
							<label for="">Id Penyusutan</label>
							<input type="text" name="id_penyusutan" class="form-control" value="<?= $kode ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Tanggal Penyusutan</label>
							<input type="text" name="tgl_penyusutan" class="form-control datepicker">
						</div>
						<div class="form-group">
							<label for="">Id Aktiva Tetap</label>
							<select name="id_aktiva_tetap" id="at_penyusutan" class="form-control">
								<option>-- Pilih Id Aktiva Tetap --</option>
<?php foreach ($at as $a): ?>
								<option value="<?= $a->id_aktiva_tetap ?>"><?= $a->id_aktiva_tetap ?></option>
<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Nama Aktiva Tetap</label>
							<input type="text" name="nm_at" class="form-control" id="nm_at" disabled>
						</div>
						<div class="form-group">
							<label for="">Tanggal Perolehan</label>
							<input type="text" name="tgl_perolehan" class="form-control" id="tp_penyusutan" disabled>
						</div>
						<div class="form-group">
							<label for="">harga Perolehan</label>
							<input type="number" name="harga_perolehan" class="form-control" id="hp_penyusutan" disabled>
						</div>
						<div class="form-group">
							<label for="">Nilai Residu</label>
							<input type="number" name="nilai_residu" class="form-control" id="nr_penyusutan" disabled>
						</div>
						<div class="form-group">
							<label for="">Id Kategori</label>
							<select name="id_kategori" id="kategori_penyusutan" class="form-control">
								<option>-- Pilih Kategori --</option>
<?php foreach ($kategori as $k): ?>
								<option value="<?= $k->id_kategori ?>"><?= $k->id_kategori ?></option>
<?php endforeach ?>							
							</select>
						</div>
						<div class="form-group">
							<label>Nama Kategori</label>
							<input type="text" name="nama_kategori" id="nm_kategori" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label>Umur Ekonomis</label>
							<input type="number" name="umur_ekonomis" id="ue_penyusutan" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label>Beban Penyusutan</label>
							<input type="number" readonly name="besar_penyusutan" id="bp_penyusutan" class="form-control">
						</div>
					</form>
				</div>
				<div class="col-6 mx-auto">
					<form action="<?= base_url("penyusutan/") ?>" method="POST" class="form-inline">
						<button type="submit" class="btn btn-success mr-3">
							<i class="fas fa-search"></i> Cari Data
						</button>
						<input type="text" name="cari_penyusutan" placeholder="Cari Data Penyusutan" class="form-control form-search">
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
						<th>Id Penyusutan</th>
						<th>Tanggal Penyusutan</th>
						<th>Nama Aktiva Tetap</th>
						<th>Nama Kategori</th>
						<th>Nilai Residu</th>
						<th>Umur Ekonomis</th>
						<th>Beban Penyusutan</th>
						<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
						<th>Opsi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>

<?php if (count($penyusutan) < 1): ?>
					<tr>
						<td colspan="9" class="text-center h3 p-5">Data Kosong</td>
					</tr>
<?php endif ?>
<?php $no = 1; foreach ($penyusutan as $p): ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $p->id_penyusutan ?></td>
						<td><?= $p->tgl_penyusutan ?></td>
						<td><?= $p->nama_aktiva_tetap ?></td>
						<td><?= $p->nama_kategori ?></td>
						<td><?= number_format($p->nilai_residu) ?></td>
						<td><?= $p->umur_ekonomis ?></td>
						<td><?= number_format($p->besar_penyusutan) ?></td>
						<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
						<td>
							<a href="<?= base_url() ?>penyusutan/edit/<?= $p->id_penyusutan ?>">
								<button class="btn btn-warning text-white">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url() ?>penyusutan/hapus/<?= $p->id_penyusutan ?>">
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

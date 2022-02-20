<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>
	<!-- <div class="alert alert-danger bg-danger text-white">
				<?php $data = [] ?>

		<?php foreach ($get_at_atd as $notif): ?>
			<?php if ((date('Y') - substr($notif->tgl_perolehan, 0, 4)) > $notif->umur_ekonomis): ?>
				<?php $data['barang'] ?>
			<?php endif ?>
		<?php endforeach ?>
	</div> -->

	<h3 class="mb-3">Entry Data Aktiva Tetap Dihentikan</h3>
	<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
	<div class="card shadow mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<form action="<?= base_url("at_dihentikan/simpan") ?>" method="POST">
						<button type="submit" class="btn btn-primary mb-3" id="btn-at-dihentikan">
							<i class="fas fa-save"></i> Tambah Data
						</button>
						<div class="form-group">
							<label for="">Id AT Dihentikan</label>
							<input type="text" name="id_at_dihentikan" class="form-control" value="<?= $kode ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Tanggal Dihentikan</label>
							<input type="text" name="tgl_dihentikan" class="form-control datepicker">
						</div>
						<div class="form-group">
							<label for="">Id Penyusutan</label>
							<select name="id_penyusutan" id="ip_at_dihentikan" class="form-control">
								<option>-- Pilih Id Penyusutan --</option>
<?php foreach ($penyusutan as $p): ?>
								<option value="<?= $p->id_penyusutan ?>"><?= $p->id_penyusutan ?></option>
<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Id Aktiva tetap</label>
							<input type="text" class="form-control" id="iat_atd" disabled>
						</div>
						<div class="form-group">
							<label for="">Nama Aktiva tetap</label>
							<input type="text" class="form-control" id="iat_at" disabled>
						</div>
						<div class="form-group">
							<label for="">Tahun Perolehan</label>
							<input type="text" class="form-control" id="tp_atd" disabled>
						</div>
						<div class="form-group">
							<label for="">Harga Perolehan</label>
							<input type="text" class="form-control" id="hp_atd" disabled>
						</div>
						<div class="form-group">
							<label for="">Besar Penyusutan</label>
							<input type="text" name="besar_penyusutan" class="form-control" id="bp_atd" readonly>
						</div>
						<div class="form-group">
							<label for="">Nilai Jual</label>
							<input type="number" name="nilai_jual" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Nilai Buku</label>
							<input type="text" name="nilai_buku" class="form-control" id="nb_atd" readonly>
						</div>
					</form>
				</div>
				<div class="col-6 mx-auto">
					<form action="<?= base_url("at_dihentikan/") ?>" method="POST" class="form-inline">
						<button type="submit" class="btn btn-success mr-3">
							<i class="fas fa-search"></i> Cari Data
						</button>
						<input type="text" name="cari_at_dihentikan" placeholder="Cari Data AT Dihentikan" class="form-control form-search">
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
						<th>Id AT Dihentikan</th>
						<th>Tgl Dihentikan</th>
						<th>Id Penyusutan</th>
						<th>Nama Aktiva Tetap</th>
						<th>Akumulasi Penyusutan</th>
						<th>Nilai Buku</th>
						<th>Nilai Jual</th>
						<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
						<th>Opsi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>

<?php if (count($at_dihentikan) < 1): ?>
					<tr>
						<td colspan="9" class="text-center h3 p-5">Data Kosong</td>
					</tr>
<?php endif ?>
<?php $no = 1; foreach ($at_dihentikan as $atd): ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $atd->id_at_dihentikan ?></td>
						<td><?= $atd->tgl_dihentikan ?></td>
						<td><?= $atd->id_penyusutan ?></td>
						<td><?= $atd->nama_aktiva_tetap ?></td>
						<td><?= number_format($atd->besar_penyusutan * $atd->umur_ekonomis) ?></td>
						<td><?= number_format($atd->nilai_buku) ?></td>
						<td><?= number_format($atd->nilai_jual) ?></td>
						<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
						<td>
							<a href="<?= base_url() ?>at_dihentikan/edit/<?= $atd->id_at_dihentikan ?>">
								<button class="btn btn-warning text-white">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url() ?>at_dihentikan/hapus/<?= $atd->id_at_dihentikan ?>">
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

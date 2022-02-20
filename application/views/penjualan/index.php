<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

	<h3 class="mb-3">Entry Data Penjualan</h3>
	<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
	<div class="card shadow mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<form action="<?= base_url("penjualan/simpan") ?>" method="POST">
						<button type="submit" class="btn btn-primary mb-3" id="btn-penjualan">
							<i class="fas fa-save"></i> Tambah Data
						</button>
						<div class="alert alert-danger bg-danger text-white" id="notif-penjualan"></div>
						<div class="form-group">
							<label>Id Penjualan</label>
							<input type="text" name="id_penjualan" class="form-control" value="<?= $kode ?>" readonly>
						</div>
						<div class="form-group">
							<label>Id AT Dihentikan</label>
							<select name="id_at_dihentikan" class="form-control" id="atd_penjualan">
								<option>-- Pilih AT Dihentikan --</option>
<?php foreach ($at_dihentikan as $ad): ?>
								<option value="<?= $ad->id_at_dihentikan ?>">
									<?= $ad->id_at_dihentikan ?>
								</option>
<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Aktiva Tetap</label>
							<input type="text" name="nm_aktiva_tetap" class="form-control" id="at_penjualan" readonly>
						</div>
						<div class="form-group">
							<label>Nilai Jual</label>
							<input type="text" name="nilai_jual" class="form-control" id="nj_penjualan" readonly>
						</div>
						<div class="form-group">
							<label>Nilai Buku</label>
							<input type="text" name="nilai_buku" class="form-control" id="nb_penjualan" readonly>
						</div>
						<div class="form-group">
							<label>Penjualan</label>
							<input type="text" name="penjualan" class="form-control" id="p_penjualan" readonly>
						</div>
						<div class="form-group">
							<label>Laba Rugi</label>
							<input type="text" name="laba_rugi" class="form-control" id="lb_penjualan" readonly>
						</div>
					</form>
				</div>
				<div class="col-6 mx-auto">
					<form action="<?= base_url("penjualan") ?>" method="POST" class="form-inline">
						<button type="submit" class="btn btn-success mr-3">
							<i class="fas fa-search"></i> Cari Data
						</button>
						<input type="text" name="cari_penjualan" placeholder="Cari Data Penjualan" class="form-control form-search">
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
						<th>Id Penjualan</th>
						<th>Id AT Dihentikan</th>
						<th>Nama Aktiva Tetap</th>
						<th>Nilai Jual</th>
						<th>Nilai Buku</th>
						<th>Penjualan</th>
						<th>Laba Rugi</th>
						<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
						<th>Opsi</th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>

<?php if (count($penjualan) < 1): ?>
					<tr>
						<td colspan="9" class="text-center h3 p-5">Data Kosong</td>
					</tr>
<?php endif; $no = 1; foreach ($penjualan as $p): ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $p->id_penjualan ?></td>
						<td><?= $p->id_at_dihentikan ?></td>
						<td><?= $p->nama_aktiva_tetap ?></td>
						<td><?= number_format($p->nilai_jual) ?></td>
						<td><?= number_format($p->nilai_buku) ?></td>
						<td><?= number_format($p->penjualan) ?></td>
						<td><?= $p->laba_rugi ?></td>
						<?php if ($this->session->userdata('jabatan') == "bendahara"): ?>
						<td>
							<a href="<?= base_url() ?>penjualan/edit/<?= $p->id_penjualan ?>">
								<button class="btn btn-warning text-white">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url() ?>penjualan/hapus/<?= $p->id_penjualan ?>">
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
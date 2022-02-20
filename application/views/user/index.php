<div class="container-fluid">
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
		</div>
	<?php endif ?>

	<h3 class="mb-3">Daftar User</h3>
	<div class="card shadow mb-3">
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<form action="<?= base_url("user/simpan") ?>" method="POST">
						<button type="submit" class="btn btn-primary mb-3">
							<i class="fas fa-save"></i> Tambah User
						</button>
						<div class="form-group">
							<label>Id User</label>
							<input type="text" name="id_user" class="form-control" value="<?= $kode ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" name="nama_user" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label>Jabatan</label>
							<select name="jabatan" class="form-control">
								<option value="waka_sarpras">Waka Sarpras</option>
								<option value="bendahara">Bendahara</option>
								<option value="staff_sarpras">Staff Sarpras</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nomor Telepon</label>
							<input type="number" name="tlpn" class="form-control">
						</div>
					</form>
				</div>
				<div class="col-6 mx-auto">
					<form action="<?= base_url("user") ?>" method="POST" class="form-inline">
						<button type="submit" class="btn btn-success mr-3">
							<i class="fas fa-search"></i> Cari Data
						</button>
						<input type="text" name="cari_user" placeholder="Cari Data User" class="form-control form-search">
					</form>
				</div>
			</div>
		</div>
	</div> <!-- End Card -->
	<div class="card shadow">
		<div class="card-body">
			<table class="table table-hover table-stripped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Id User</th>
						<th>Nama User</th>
						<th>Password</th>
						<th>Jabatan</th>
						<th>No. Telp</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>

<?php if (count($user) < 1): ?>
					<tr>
						<td colspan="7" class="text-center h3 p-5">Data Kosong</td>
					</tr>
<?php endif; $no = 1; foreach ($user as $u): ?>
<?php if($id_user !== $u->id_user): ?>
<?php
	if ($u->jabatan == "waka_sarpras") {
		$jabatan = "Waka Sarpras";
	} elseif($u->jabatan == "bendahara"){
		$jabatan = "Bendahara";
	} else {
		$jabatan = "Staff Sarpras";
	}
?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $u->id_user ?></td>
						<td><?= $u->nama_user ?></td>
						<td><?= $u->password ?></td>
						<td><?= $jabatan ?></td>
						<td><?= $u->tlpn ?></td>
						<td>
							<a href="<?= base_url() ?>user/edit/<?= $u->id_user ?>">
								<button class="btn btn-warning text-white">
									<i class="fas fa-edit"></i>
								</button>
							</a>
							<a href="<?= base_url() ?>user/hapus/<?= $u->id_user ?>">
								<button class="btn btn-danger">
									<i class="fas fa-trash"></i>
								</button>
							</a>
						</td>
					</tr>
<?php endif ?>
<?php $no++; endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
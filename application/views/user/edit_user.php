<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit User <?= $user->nama_user ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("user/update") ?>" method="POST">
				<input type="hidden" name="id_user" class="form-control" value="<?= $user->id_user ?>">
				<div class="form-group">
					<label>Nama User</label>
					<input type="text" name="nama_user" class="form-control" value="<?= $user->nama_user ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" name="password" class="form-control" value="<?= $user->password ?>">
				</div>
				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control">
						<option value="waka_sarpras" <?= ($user->jabatan) == "waka_sarpras" ? "selected" : null ?> >Waka Sarpras</option>
						<option value="bendahara" <?= ($user->jabatan) == "bendahara" ? "selected" : null ?> >Bendahara</option>
						<option value="staff_sarpras" <?= ($user->jabatan) == "staff_sarpras" ? "selected" : null ?> >Staff Sarpras</option>
					</select>
				</div>
				<div class="form-group">
					<label>Nomor Telepon</label>
					<input type="number" name="tlpn" class="form-control" value="<?= $user->tlpn ?>">
				</div>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan User
				</button>
				<a href="<?= base_url("user") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
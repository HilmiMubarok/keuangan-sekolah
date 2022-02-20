<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Kelas <?= $kelas->nama_kelas ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("kelas/update") ?>" method="POST">
				<input type="hidden" name="id_kelas" class="form-control" value="<?= $kelas->id_kelas ?>">
				<div class="form-group">
					<label for="">Nama kelas</label>
					<input type="text" name="nama_kelas" class="form-control" value="<?= $kelas->nama_kelas ?>">
				</div>
				
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan kelas
				</button>
				<a href="<?= base_url("kelas") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
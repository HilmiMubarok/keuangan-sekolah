<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Jurusan <?= $jurusan->nama_jurusan ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("jurusan/update") ?>" method="POST">
				<input type="hidden" name="id_jurusan" class="form-control" value="<?= $jurusan->id_jurusan ?>">
				<div class="form-group">
					<label for="">Nama jurusan</label>
					<input type="text" name="nama_jurusan" class="form-control" value="<?= $jurusan->nama_jurusan ?>">
				</div>
				
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan jurusan
				</button>
				<a href="<?= base_url("jurusan") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
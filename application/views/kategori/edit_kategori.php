<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Kategori <?= $kategori->nama_kategori ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("kategori/update") ?>" method="POST">
				<input type="hidden" name="id_kategori" class="form-control" value="<?= $kategori->id_kategori ?>">
				<div class="form-group">
					<label for="">Nama Kategori</label>
					<input type="text" name="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori ?>">
				</div>
				<div class="form-group">
					<label for="">Umur Ekonomis</label>
					<input type="number" name="umur_ekonomis" class="form-control" value="<?= $kategori->umur_ekonomis ?>">
				</div>
				<div class="form-group">
					<label for="">Status</label>
					<input type="text" name="status" class="form-control" value="<?= $kategori->status ?>">
				</div>
				<div class="form-group">
					<label for="">Metode Penyusutan</label>
					<input type="text" name="metode_penyusutan" class="form-control" value="<?= $kategori->metode_penyusutan ?>">
				</div>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan Kategori
				</button>
				<a href="<?= base_url("kategori") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
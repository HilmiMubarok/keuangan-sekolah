<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Aktiva tetap <?= $at->nama_aktiva_tetap ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("aktiva_tetap/update") ?>" method="POST">
				
				<input type="hidden" name="id_aktiva_tetap" class="form-control" value="<?= $at->id_aktiva_tetap ?>">
				<div class="form-group">
					<label>Nama Aktiva Tetap</label>
					<input type="text" name="nama_aktiva_tetap" class="form-control" value="<?= $at->nama_aktiva_tetap ?>">
				</div>
				<div class="form-group">
					<label>Merk / Type</label>
					<input type="text" name="merk_aktiva_tetap" class="form-control" value="<?= $at->merk?>">
				</div>
				<div class="form-group">
					<label>Tanggal Perolehan</label>
					<input type="text" name="tgl_perolehan" class="form-control datepicker" value="<?= $at->tgl_perolehan ?>">
				</div>
				<div class="form-group">
					<label>Harga Perolehan</label>
					<input type="number" name="harga_perolehan" class="form-control" value="<?= $at->harga_perolehan ?>">
				</div>
				<div class="form-group">
					<label>Perolehan Dana</label>
					<select name="perolehan_dana" class="form-control">
						<option value="bos" <?= ($at->perolehan_dana == "bos") ? "selected" : null ?>>BOS</option>
						<option value="sekolah" <?= ($at->perolehan_dana == "sekolah") ? "selected" : null ?>>Sekolah</option>
					</select>
				</div>
				<div class="form-group">
					<label>Nilai Residu</label>
					<input type="number" name="nilai_residu" class="form-control" value="<?= $at->nilai_residu ?>">
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<input type="text" name="keterangan_aktiva_tetap" class="form-control" value="<?= $at->keterangan ?>">
				</div>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan Aktiva tetap
				</button>
				<a href="<?= base_url("aktiva_tetap") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
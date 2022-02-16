<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Aktiva Tetap Dihentikan <?= $at_dihentikan->id_at_dihentikan ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("at_dihentikan/update") ?>" method="POST">
				<input type="hidden" name="id_at_dihentikan" class="form-control" value="<?= $at_dihentikan->id_at_dihentikan ?>">

				<div class="form-group">
					<label for="">Tanggal Dihentikan</label>
					<input type="text" name="tgl_dihentikan" class="form-control datepicker" value="<?= $at_dihentikan->tgl_dihentikan ?>">
				</div>
				<div class="form-group">
					<label for="">Id Penyusutan</label>
					<select name="id_penyusutan" id="ip_at_dihentikan" class="form-control">
						<option>-- Pilih Id Penyusutan --</option>
<?php foreach ($penyusutan as $p): ?>
						<option value="<?= $p->id_penyusutan ?>" <?= ($p->id_penyusutan == $at_dihentikan->id_penyusutan ? "selected" : null) ?>><?= $p->id_penyusutan ?></option>
<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Id Aktiva tetap</label>
					<input type="text" class="form-control" id="iat_atd" value="<?= $penyusutan_where->id_aktiva_tetap ?>" disabled>
				</div>
				<div class="form-group">
					<label for="">Tahun Perolehan</label>
					<input type="text" class="form-control" id="tp_atd" value="<?= $at_where->tgl_perolehan ?>" disabled>
				</div>
				<div class="form-group">
					<label for="">Harga Perolehan</label>
					<input type="text" class="form-control" id="hp_atd" value="<?= $at_where->harga_perolehan ?>" disabled>
				</div>
				<div class="form-group">
					<label for="">Besar Penyusutan</label>
					<input type="text" name="besar_penyusutan" class="form-control" id="bp_atd" value="<?= $at_dihentikan->besar_penyusutan ?>" readonly>
				</div>
				<div class="form-group">
					<label for="">Nilai Jual</label>
					<input type="number" name="nilai_jual" class="form-control" value="<?= $at_dihentikan->nilai_jual ?>">
				</div>
				<div class="form-group">
					<label for="">Nilai Buku</label>
					<input type="text" name="nilai_buku" class="form-control" id="nb_atd" value="<?= $at_dihentikan->nilai_buku ?>" readonly>
				</div>
				
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan AT Dihentikan
				</button>
				<a href="<?= base_url("at_dihentikan") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
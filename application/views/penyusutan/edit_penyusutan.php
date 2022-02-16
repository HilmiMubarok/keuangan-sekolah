<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Penyusutan <?= $penyusutan->id_penyusutan ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("penyusutan/update") ?>" method="POST">
				<input type="hidden" name="id_penyusutan" class="form-control" value="<?= $penyusutan->id_penyusutan ?>">
				<div class="form-group">
					<label for="">Tanggal Penyusutan</label>
					<input type="text" name="tgl_penyusutan" class="form-control datepicker" value="<?= $penyusutan->tgl_penyusutan ?>">
				</div>
				<div class="form-group">
					<label for="">Id Aktiva Tetap</label>
					<select name="id_aktiva_tetap" id="at_penyusutan" class="form-control">
<?php foreach ($at as $a): ?>
						<option value="<?= $a->id_aktiva_tetap ?>" <?= ($a->id_aktiva_tetap == $penyusutan->id_aktiva_tetap) ? "selected" : null ?>>
							<?= $a->id_aktiva_tetap ?>
						</option>
<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Tanggal Perolehan</label>
					<input type="text" name="tgl_perolehan" class="form-control" id="tp_penyusutan" disabled value="<?= $at_where->tgl_perolehan ?>">
				</div>
				<div class="form-group">
					<label for="">harga Perolehan</label>
					<input type="number" name="harga_perolehan" class="form-control" id="hp_penyusutan" disabled value="<?= $at_where->harga_perolehan ?>">
				</div>
				<div class="form-group">
					<label for="">Nilai Residu</label>
					<input type="number" name="nilai_residu" class="form-control" id="nr_penyusutan" disabled value="<?= $at_where->nilai_residu ?>">
				</div>
				<div class="form-group">
					<label for="">Id Kategori</label>
					<select name="id_kategori" id="kategori_penyusutan" class="form-control">
<?php foreach ($kategori as $k): ?>
						<option value="<?= $k->id_kategori ?>" <?= ($k->id_kategori == $penyusutan->id_kategori) ? "selected" : null ?>>
							<?= $k->id_kategori ?>
								
						</option>
<?php endforeach ?>							
					</select>
				</div>
				<div class="form-group">
					<label>Umur Ekonomis</label>
					<input type="number" name="umur_ekonomis" id="ue_penyusutan" class="form-control" disabled value="<?= $kategori_where->umur_ekonomis ?>">
				</div>
				<div class="form-group">
					<label>Besar Penyusutan</label>
					<input type="number" readonly name="besar_penyusutan" id="bp_penyusutan" class="form-control" value="<?= $penyusutan->besar_penyusutan ?>">
				</div>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan Penyusutan
				</button>
				<a href="<?= base_url("penyusutan") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
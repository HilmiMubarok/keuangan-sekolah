<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Penjualan <?= $penjualan->id_penjualan ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("penjualan/update") ?>" method="POST">
				<input type="hidden" name="id_penjualan" class="form-control" value="<?= $penjualan->id_penjualan ?>">
				<div class="form-group">
					<label>Id AT Dihentikan</label>
					<select name="id_at_dihentikan" class="form-control" id="atd_penjualan">
<?php foreach ($at_dihentikan as $ad): ?>
						<option value="<?= $ad->id_at_dihentikan ?>" <?= ($ad->id_at_dihentikan == $penjualan->id_at_dihentikan) ? "selected" : null ?>>
							<?= $ad->id_at_dihentikan ?>
						</option>
<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Nilai Jual</label>
					<input type="text" name="nilai_jual" class="form-control" value="<?= $penjualan->nilai_jual ?>" id="nj_penjualan" readonly>
				</div>
				<div class="form-group">
					<label>Nilai Buku</label>
					<input type="text" name="nilai_buku" class="form-control" value="<?= $penjualan->nilai_buku ?>" id="nb_penjualan" readonly>
				</div>
				<div class="form-group">
					<label>Penjualan</label>
					<input type="text" name="penjualan" class="form-control" value="<?= $penjualan->penjualan ?>" id="p_penjualan" readonly>
				</div>
				<div class="form-group">
					<label>Laba Rugi</label>
					<input type="text" name="laba_rugi" value="<?= $penjualan->laba_rugi ?>" class="form-control" id="lb_penjualan" readonly>
				</div>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan Penjualan
				</button>
				<a href="<?= base_url("penjualan") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
<div class="container-fluid">
	<h3>Laporan Penyusutan</h3>
	<div class="card shadow">
		<div class="card-header">
			<h5 class="">Pilih Laporan Berdasarkan</h5>
		</div>
		<div class="card-body">
			<form action="<?= base_url("cetak/penyusutan") ?>" class="form-inline" method="GET">
				
				<div class="form-group p-2 mr-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios1" value="all" checked>
						<label class="form-check-label" for="exampleRadios1">
							Semua Data Penyusutan
						</label>
					</div>
				</div>
				<div class="form-group p-2 mr-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios2" value="item" checked>
						<label class="form-check-label" for="exampleRadios2">
							Per Besar Penyusutan
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="mr-2">Nominal</label>
					<input type="number" name="option1" class="form-control col-3">
					<label class="mx-2">s/d</label>
					<input type="number" name="option2" class="form-control col-3">
				</div>
				<div class="form-group p-2 mr-3 mt-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios2" value="barang" checked>
						<label class="form-check-label" for="exampleRadios2">
							Per Barang
						</label>
					</div>
				</div>
				<div class="form-group mt-3">
					<select name="at_lap_penyusutan" class="form-control">
						<?php foreach ($at as $a): ?>
							<option value="<?= $a->id_aktiva_tetap ?>"><?= $a->nama_aktiva_tetap ?></option>
						<?php endforeach ?>
					</select>
				</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary" name="cetak" value="cetak">
				<i class="fas fa-print"></i> Cetak
			</button>
			<button type="submit" class="btn btn-dark" name="preview" value="preview">
				<i class="fas fa-eye"></i> Preview
			</button>
			</form>
		</div>
	</div>
</div>
<div class="container-fluid">
	<h3>Laporan Kategori</h3>
	<div class="card shadow">
		<div class="card-header">
			<h5 class="">Pilih Laporan Berdasarkan</h5>
		</div>
		<div class="card-body">
			<form action="<?= base_url("cetak/kategori") ?>" class="form-inline" method="GET">
				
				<div class="form-group p-2 mr-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios1" value="all" checked>
						<label class="form-check-label" for="exampleRadios1">
							Semua Data Kategori
						</label>
					</div>
				</div>
				<div class="form-group p-2 mr-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios2" value="item" checked>
						<label class="form-check-label" for="exampleRadios2">
							Pilihan Per Umur Ekonomis
						</label>
					</div>
				</div>
				<div class="form-group p-2 mr-3">
					<input type="number" name="option" class="form-control" placeholder="Masukkan Umur Ekonomis">
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
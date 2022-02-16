<link rel="stylesheet" href="<?= base_url('assets/css/laporan.css') ?>">
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


		<div class="card shadow mt-3">
			<div class="card-body">
				
				<div class="c">
					<header>
						<div class="coll" style="margin-right: 100px;">
							<img src="<?= base_url() ?>assets/img/logo_bu.jpg" width="70">
						</div>
						<div class="coll" style="text-align: center;">
							<div class="nm_sekolah">SMK Bina Utama Kendal</div>
							<div class="alamat_sekolah">
								Jl. Kyai Tulus - Jetis, Jetis, Kendal, Jetis, Kec. Kendal, Kabupaten Kendal, Jawa Tengah 51315
							</div>
						</div>
					</header>
					<?php if($jenis == "barang"): ?>
						<div class="body-header">
							<div class="body-text" style="margin-right: 95px; text-align: center;">
								Laporan Tabel Depresiasi Metode Garis Lurus <br> Per Barang
							</div>
						</div>
					<?php else : ?>
						<div class="body-header">
							<div class="body-text">
								Laporan Penyusutan
							</div>
						</div>
					<?php endif ?>
					<div class="body">
						
						<?php if ($jenis == "barang"): ?>
						
						<table cellspacing="0" cellpadding="10" class="mb-3">
							
							<tr>
								<td><b>Id Barang</b></td>
								<td><b><?= $barang->id_aktiva_tetap ?></b></td>
							</tr>
							<tr>
								<td><b>Nama Barang</b></td>
								<td><b><?= $barang->nama_aktiva_tetap ?></b></td>
							</tr>
						</table>

						<table border="1" cellpadding="10" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Beban Penyusutan</th>
									<th>Akumulasi Penyusutan</th>
									<th>Nilai Buku Penyusutan</th>
								</tr>
								
							</thead>
							<tbody>
								<?php for($x = 0; $x < count($lap_barang); $x++): ?>
									<?php if ($x == 0): ?>
										<tr>
											<td></td>
											<td>0</td>
											<td>0</td>
											<td><?= number_format($lap_barang[0]->harga_perolehan) ?></td>
										</tr>
									<?php else: ?>
										<tr>
											<td><?= substr($lap_barang[$x]->tgl_penyusutan, 0, 4) ?></td>
											<td><?= number_format($lap_barang[$x]->besar_penyusutan) ?></td>
											<td><?= number_format($lap_barang[$x]->besar_penyusutan * $x) ?></td>
											<td><?= number_format($lap_barang[$x]->harga_perolehan - ($lap_barang[$x]->besar_penyusutan * $x)) ?></td>
										</tr>
									<?php endif ?>
								<?php endfor ?>
										<tr>
											<td></td>
											<td>
<?= number_format($lap_barang[0]->besar_penyusutan * (count($lap_barang) - 1)) ?>
	
</td>
											<td></td>
											<td></td>
										</tr>
							</tbody>
						</table>
						<div class="ttd">
							<div class="content">
								<?= $waktu ?> <br><br><br><br><br> <?= $this->session->userdata('nama_user'); ?>
							</div>
						</div>
						

						<?php else: ?>

						<?php if ($jenis == "all"): ?>
							
									<table border="1" cellpadding="10" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Id Penyusutan</th>
												<th>Nama Aktiva Tetap</th>
												<th>Nama Kategori</th>
												<th>Besar Penyusutan</th>
											</tr>
										</thead>
										<tbody>
						<?php $no = 1; foreach ($penyusutan as $p): ?>
							
											<tr>
												<td><?= $no ?></td>
												<td><?= $p->id_penyusutan ?></td>
												<td><?= $p->nama_aktiva_tetap ?></td>
												<td><?= $p->nama_kategori ?></td>
												<td><?= $p->besar_penyusutan ?></td>
											</tr>
						<?php $no++; endforeach ?>
										</tbody>
									</table>
									<div class="ttd">
										<div class="content">
											<?= $waktu ?> <br><br><br><br><br> <?= $this->session->userdata('nama_user'); ?>
										</div>
									</div>
						<?php else: ?>
									<table border="1" cellpadding="10" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Id Penyusutan</th>
												<th>Id Aktiva Tetap</th>
												<th>Id Kategori</th>
												<th>Besar Penyusutan</th>
											</tr>
										</thead>
										<tbody>
						<?php $no = 1; foreach ($bp as $p): ?>	
											<tr>
												<td><?= $no ?></td>
												<td><?= $p->id_penyusutan ?></td>
												<td><?= $p->id_aktiva_tetap ?></td>
												<td><?= $p->id_kategori ?></td>
												<td><?= $p->besar_penyusutan ?></td>
											</tr>
						<?php $no++; endforeach ?>
										</tbody>
									</table>
									<div class="ttd">
										<div class="content">
											<?= $waktu ?> <br><br><br><br><br> <?= $this->session->userdata('nama_user'); ?>
										</div>
									</div>
						<?php endif ?>

						<?php endif ?>
					</div>
				</div>

			</div>
		</div>


</div>
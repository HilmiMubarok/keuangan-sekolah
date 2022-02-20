<link rel="stylesheet" href="<?= base_url('assets/css/laporan.css') ?>">
<div class="container-fluid">
	<h3>Laporan Aktiva Tetap</h3>
	<div class="card shadow">
		<div class="card-header">
			<h5 class="">Pilih Laporan Berdasarkan</h5>
		</div>
		<div class="card-body">
			<form action="<?= base_url("cetak/aktiva_tetap") ?>" class="form-inline" method="GET">
				
				<div class="form-group p-2 mr-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios1" value="all" checked>
						<label class="form-check-label" for="exampleRadios1">
							Semua Data Aktiva Tetap
						</label>
					</div>
				</div>
				<div class="form-group p-2 mr-3" style="border: 1px solid grey; border-radius: 10px;">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="jenis" id="exampleRadios2" value="item" checked>
						<label class="form-check-label" for="exampleRadios2">
							Pilihan Per Tahun Perolehan
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="mr-2">Periode</label>
					<input type="text" name="tahun1" class="form-control col-3 datepicker">
					<label class="mx-2">s/d</label>
					<input type="text" name="tahun2" class="form-control col-3 datepicker">
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
				<div class="body-header">
					<div class="body-text">
						Laporan Aktiva Tetap
					</div>
				</div>
				<div class="body">
		<?php if ($jenis == "all"): ?>
	
			<table border="1" cellpadding="10" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Aktiva Tetap</th>
						<th>Nama Aktiva Tetap </th>
						<th>Tanggal Perolehan</th>
						<th>Harga Perolehan</th>
						<th>Nilai Residu</th>
					</tr>
				</thead>
				<tbody>
<?php $no = 1; foreach ($at as $p): ?>
	
					<tr>
						<td><?= $no ?></td>
						<td><?= $p->id_aktiva_tetap ?></td>
						<td><?= $p->nama_aktiva_tetap ?></td>
						<td><?= formatHariTanggal($p->tgl_perolehan) ?></td>
						<td><?= number_format($p->harga_perolehan) ?></td>
						<td><?= number_format($p->nilai_residu) ?></td>
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
						<th>Id Aktiva Tetap</th>
						<th>Nama Aktiva Tetap </th>
						<th>Tanggal Perolehan</th>
						<th>Harga Perolehan</th>
						<th>Nilai Residu</th>
					</tr>
				</thead>
				<tbody>
<?php $no = 1; foreach ($atw as $p): ?>	
					<tr>
						<td><?= $no ?></td>
						<td><?= $p->id_aktiva_tetap ?></td>
						<td><?= $p->nama_aktiva_tetap ?></td>
						<td><?= formatHariTanggal($p->tgl_perolehan) ?></td>
						<td><?= number_format($p->harga_perolehan) ?></td>
						<td><?= number_format($p->nilai_residu) ?></td>
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
				</div>
			</div>

		</div>
	</div>




</div>
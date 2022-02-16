<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<style>
		.container {
			border: 2px solid;
		}
		.body {
			padding: 10px;
		}
		.body-header {
			border-bottom: 2px solid;
		}
		.body-text {
			padding: 10px;
			font-weight: bold;
			font-size: 22px;
		}
		header {
			border-bottom: 2px solid;
			padding: 10px;
		}
		.col {
			display: inline-block;
			vertical-align:middle;
		}
		.nm_sekolah {
			font-weight: bold;
			font-size: 20px;
			margin-right: 120px;
		}
		.alamat_sekolah {
			width: 70%;
			text-align: center;
			margin-left: 40px;
		}
		.ttd {
			
			margin-top: 40px;
			margin-left: 450px;
		}
		.content {
			text-align: center;
		}


	</style>
</head>
<body>

	<div class="container">
		<header>
			<div class="col">
				<img src="assets/img/logo_bu.jpg" width="70">
			</div>
			<div class="col" style="text-align: center;">
				<div class="nm_sekolah">SMK Bina Utama Kendal</div>
				<div class="alamat_sekolah">
					Jl. Kyai Tulus - Jetis, Jetis, Kendal, Jetis, Kec. Kendal, Kabupaten Kendal, Jawa Tengah 51315
				</div>
			</div>
		</header>
		<div class="body-header">
			<div class="body-text">
				Laporan Aktiva Tetap Dihentikan
			</div>
		</div>
		<div class="body">
<?php if ($jenis == "all"): ?>
	
			<table border="1" cellpadding="10" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Id AT Dihentikan</th>
						<th>Tanggal Dihentikan </th>
						<th>Id Penyusutan</th>
						<th>Nama Aktiva Tetap</th>
						<th>Besar Penyusutan</th>
						<th>Nilai Jual</th>
						<th>Nilai Buku</th>
					</tr>
				</thead>
				<tbody>
<?php $no = 1; foreach ($atd as $p): ?>
	
					<tr>
						<td><?= $no ?></td>
						<td><?= $p->id_at_dihentikan ?></td>
						<td><?= formatHariTanggal($p->tgl_dihentikan) ?></td>
						<td><?= $p->id_penyusutan ?></td>
						<td><?= $p->nama_aktiva_tetap ?></td>
						<td><?= number_format($p->besar_penyusutan) ?></td>
						<td><?= number_format($p->nilai_jual) ?></td>
						<td><?= number_format($p->nilai_buku) ?></td>
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
						<th>Id AT Dihentikan</th>
						<th>Tanggal Dihentikan </th>
						<th>Id Penyusutan</th>
						<th>Besar Penyusutan</th>
						<th>Nilai Jual</th>
						<th>Nilai Buku</th>
					</tr>
				</thead>
				<tbody>
<?php $no = 1; foreach ($atw as $p): ?>	
					<tr>
						<td><?= $no ?></td>
						<td><?= $p->id_at_dihentikan ?></td>
						<td><?= formatHariTanggal($p->tgl_dihentikan) ?></td>
						<td><?= $p->id_penyusutan ?></td>
						<td><?= number_format($p->besar_penyusutan) ?></td>
						<td><?= number_format($p->nilai_jual) ?></td>
						<td><?= number_format($p->nilai_buku) ?></td>
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
</body>
</html>
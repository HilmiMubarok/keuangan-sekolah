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
		<?php if($jenis == "barang"): ?>
			<div class="body-header">
				<div class="body-text" style="margin-right: 10px; text-align: center;">
					Laporan Tabel Depresiasi Metode Garis Lurus <br> Per Barang
				</div>
			</div>
			<?php else: ?>
			<div class="body-header">
				<div class="body-text">
					Laporan Penyusutan
				</div>
			</div>

		<?php endif ?>
		<div class="body">

			<?php if ($jenis == "barang"): ?>
			
			<table cellspacing="0" cellpadding="10">
				
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
								<td><?= substr($lap_barang[0]->tgl_penyusutan, 0, 4) ?></td>
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
</body>
</html>
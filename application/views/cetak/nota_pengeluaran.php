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
			margin-top: 5px;
		}

		.ttd {
			margin-top: 40px;
            width: 100%;
		}
        .ttd-item {
            display: inline-block;
            vertical-align:middle;
            width: 49%;
        }
        .ttd-item-1 {
            display: inline-block;
            vertical-align:middle;
            width: 100%;
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
				<img src="assets/img/logo_sekolah.jpg" width="70">
			</div>
			<div class="col" style="text-align: center;">
				<div class="nm_sekolah">SMK NU 02 ROWOSARI</div>
				<div class="alamat_sekolah">
					Kampus 1 : Jl. Bahari Utara No.39 Telp. (0294)641702 <br> Kampus 2 : Jl. Teruna, Wonotenggang, Rowosari, Kendal Telp.(0294)3641306
				</div>
			</div>
		</header>
		<div class="body-header">
			<div class="body-text">
				Nota Pengeluaran
			</div>
		</div>
		<div class="body">
			<table border="1" cellpadding="10" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Kategori</th>
						<th>Tanggal</th>
						<th>Nominal</th>
						<th>Keterangan</th>
						<th>Diinput oleh</th>
					</tr>
				</thead>
				<tbody>
                    <tr>
                        <td><?= $pengeluaran->nama_jenis_pengeluaran ?></td>
                        <td><?= formatHariTanggal($pengeluaran->tanggal) ?></td>
                        <td><?= $pengeluaran->nominal ?></td>
                        <td><?= $pengeluaran->keterangan ?></td>
                        <td><?= $pengeluaran->user_name ?></td>
                    </tr>
				</tbody>
			</table>
			<div class="ttd">
				<div class="content ttd-item">
					<?= $waktu ?> <br><br><br><br><br> <?= $this->session->userdata('name'); ?>
				</div>
                <div class="content ttd-item">
					<?= $waktu ?> <br><br><br><br><br> <?= $this->session->userdata('name'); ?>
				</div>
			</div>
            <div class="ttd">
				<div class="content ttd-item-1">
					<?= $waktu ?> <br><br><br><br><br> <?= $this->session->userdata('name'); ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
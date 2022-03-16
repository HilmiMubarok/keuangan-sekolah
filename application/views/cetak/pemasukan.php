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
					Kampus 1 : Jl. Bahari Utara No.39 Telp. (0294)641702 - Kampus 2 : Jl. Teruna, Wonotenggang, Rowosari, Kendal Telp.(0294)3641306
				</div>
			</div>
		</header>
		<div class="body-header">
			<div class="body-text">
				<?= $title ?>
			</div>
		</div>
		<div class="body">
			<table border="1" cellpadding="10" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Kategori</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Diinput oleh</th>
						<th>Nominal</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach($pemasukan as $p): ?>
                        <tr>
                            <td><?= $p->nama_jenis_pemasukan ?></td>
                            <td><?= formatHariTanggal($p->tanggal) ?></td>
                            <td><?= $p->keterangan ?></td>
                            <td><?= $p->user_name ?></td>
                            <td><?= "Rp. ". number_format($p->nominal) ?></td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="4">Total pemasukan</th>
                        <td><?= "Rp.". number_format($total_pemasukan) ?></td>
                    </tr>
				</tbody>
			</table>
			<table border="0" style="margin-top: 20px; width:100%">
				<tr>
					<td colspan="3" align="center"><?= $waktu ?></td>
				</tr>
				<tr>
					<td align="center" style="width:33%;height: 150px; vertical-align:bottom">
						<?= $this->session->userdata('name'); ?>
					</td>
					<td align="center" style="width:33%;height: 150px; vertical-align:bottom">
						<?= $this->session->userdata('name'); ?>
					</td>
					<td align="center" style="width:33%;height: 150px; vertical-align:bottom">
						<?= $this->session->userdata('name'); ?>
					</td>
				</tr>

			</table>
		</div>
	</div>
</body>
</html>
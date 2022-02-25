<div class="container-fluid">

	<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('pemasukan') ?>">Kategori Pemasukan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit <?= $pemasukan->nama_jenis_pemasukan ?></li>
        </ol>
    </nav>


	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Kategori Pemasukan <?= $pemasukan->nama_jenis_pemasukan ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("pemasukan/update") ?>" method="POST">
				<input type="hidden" name="id_jenis_pemasukan" class="form-control" value="<?= $pemasukan->id_jenis_pemasukan ?>">
				<div class="form-group">
					<label for="">Nama Kategori Pemasukan</label>
					<input type="text" name="nama_jenis_pemasukan" class="form-control" value="<?= $pemasukan->nama_jenis_pemasukan ?>">
				</div>
				<div class="form-group">
					<label>Periode</label>
					<select name="periode_pemasukan" class="form-control">
						<option value="11" <?= ($pemasukan->periode_pemasukan == "11") ? "selected" : null ?>>Satu Kali</option>
						<option value="1" <?= ($pemasukan->periode_pemasukan == "1") ? "selected" : null ?>>Setiap 1 Bulan</option>
						<option value="6" <?= ($pemasukan->periode_pemasukan == "6") ? "selected" : null ?>>Setiap 6 Bulan</option>
						<option value="12" <?= ($pemasukan->periode_pemasukan == "12") ? "selected" : null ?>>Setiap 1 Tahun</option>
					</select>
				</div>
				<div class="form-group">
					<label>Nominal</label>
					<input type="number" name="nominal" class="form-control" value="<?= $pemasukan->nominal ?>">
				</div>
				
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan pemasukan
				</button>
				<a href="<?= base_url("pemasukan") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
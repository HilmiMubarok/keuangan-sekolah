<div class="container-fluid">

	<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('pengeluaran') ?>">Kategori Pengeluaran</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $pengeluaran->nama_jenis_pengeluaran ?></li>
        </ol>
    </nav>

	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Kategori Pengeluaran <?= $pengeluaran->nama_jenis_pengeluaran ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("pengeluaran/update") ?>" method="POST">
				<input type="hidden" name="id_jenis_pengeluaran" class="form-control" value="<?= $pengeluaran->id_jenis_pengeluaran ?>">
				<div class="form-group">
					<label for="">Nama Kategori pengeluaran</label>
					<input type="text" name="nama_jenis_pengeluaran" class="form-control" value="<?= $pengeluaran->nama_jenis_pengeluaran ?>">
				</div>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan pengeluaran
				</button>
				<a href="<?= base_url("pengeluaran") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
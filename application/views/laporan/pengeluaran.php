<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Pengeluaran</li>
        </ol>
    </nav>
	
	<?php if ($this->session->flashdata()): ?>
		<div class="alert alert-dismissible fade show alert-<?= $this->session->flashdata('icon') ?> bg-<?= $this->session->flashdata('icon') ?> text-white">
			<?= $this->session->flashdata('pesan') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
		</div>
	<?php endif ?>

    
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title">Laporan Pengeluaran</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url("kelas/simpan") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div> <!-- End Card -->
        </div>

    </div>
	
	
</div>
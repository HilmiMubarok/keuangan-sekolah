<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
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

    
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Data Siswa</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-hover table-striped dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($siswa as $s): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $s->nama ?></td>
                            <td><?= $s->nama_kelas ?></td>
                            <td><?= $s->alamat ?></td>
                            <td><?= $s->telp ?></td>
                            <td>
                                <a href="" class="btn btn-success text-white">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-warning text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
	
	
</div>
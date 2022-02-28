<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaksi Pemasukan</li>
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
                <div class="card-header text-white bg-primary">
                    <h5 class="card-title">Daftar Transaksi Pemasukan</h5>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddPemasukan">
                        <i class="fas fa-plus"></i> Tambah Pemasukan
                    </button>
                    <table class="table table-bordered table-hover table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($data_pemasukan as $d): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= formatHariTanggal($d->tanggal) ?></td>
                                    <td><?= $d->nama_jenis_pemasukan ?></td>
                                    <td><?= "Rp. ". number_format($d->nominal) ?></td>
                                    <td><?= $d->user_name ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>transaksi/detail/pemasukan/<?= $d->id_pemasukan ?>" class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url() ?>transaksi/edit/pemasukan/<?= $d->id_pemasukan ?>" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url() ?>transaksi/hapus/pemasukan/<?= $d->id_pemasukan ?>" class="btn btn-danger">
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
    </div>

    <!-- Modal Add -->

    <div class="modal fade" id="modalAddPemasukan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        Tambah Pemasukan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url("transaksi/simpan/pemasukan") ?>" method="POST">
                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
                        <div class="form-group">
                            <label for="">Nama Kategori Pemasukan</label>
                            <select name="jenis_pemasukan_id" class="form-control">
                                <?php foreach($pemasukan as $p) :?>
                                    <option value="<?= $p->id_jenis_pemasukan ?>"><?= $p->nama_jenis_pemasukan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="number" class="form-control" name="nominal" placeholder="Masukkan Nominal">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
	
	
</div>

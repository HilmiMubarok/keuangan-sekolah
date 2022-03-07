<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $siswa->nama ?></li>
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

    <!-- card informasi kelas -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Detail Siswa</h5>
        </div>
        <div class="card-body">
            <button data-toggle="modal" data-target="#modalAddBayarSiswa" class="btn btn-primary text-white mb-3">
                <i class="fas fa-plus"></i> Tambah Pembayaran Siswa
            </button>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Nama</th>
                    <td><?= $siswa->nama ?></td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td><?= $siswa->nama_kelas ?></td>
                </tr>
                <tr>
                    <th>NIS</th>
                    <td><?= $siswa->nis ?></td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td><?= $siswa->nisn ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $siswa->alamat ?></td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td><?= $siswa->telp ?></td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td><?= $siswa->tempat_lahir.", ".$siswa->tgl_lahir ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= ($siswa->jenkel == "L" ? "Laki-Laki" : "Perempuan") ?></td>
                </tr>
                <tr>
                    <th>Nama Ayah</th>
                    <td><?= $siswa->nama_ayah ?></td>
                </tr>
                <tr>
                    <th>Nama Ibu</th>
                    <td><?= $siswa->nama_ibu ?></td>
                </tr>
                <tr>
                    <th>Pekerjaan Orang Tua</th>
                    <td><?= $siswa->pekerjaan_ortu ?></td>
                </tr>
                <tr>
                    <th>Asal Sekolah</th>
                    <td><?= $siswa->asal_sekolah ?></td>
                </tr>
                
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white">
            <h5 class="card-title">Riwayat Pembayaran</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach ($pembayaran as $p) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= formatHariTanggal($p->tanggal) ?></td>
                            <td><?= "Rp. ". number_format($p->nominal) ?></td>
                            <td><?= $p->keterangan ?></td>
                            <td>
                                <a href="" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add -->
    
    <div class="modal fade" id="modalAddBayarSiswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        Tambah Pembayaran Siswa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url("transaksi/simpan/pemasukan") ?>" method="POST">
                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
                        <input type="hidden" name="siswa_id" value="<?= $siswa->id_siswa ?>">
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
                            <input type="text" id="datepicker" name="tanggal" class="form-control">
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
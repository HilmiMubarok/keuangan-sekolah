<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kelas') ?>">Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $kelas->nama_kelas ?></li>
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
            <h5 class="card-title">Informasi Kelas</h5>
        </div>
        <div class="card-body">
            <ul>
                <li>Nama Kelas : <b><?= $kelas->nama_kelas ?></b></li>
                <li>Jumlah Siswa Laki-Laki : <b><?= $siswa_laki ?></b></li>
                <li>Jumlah Siswa Perempuan : <b><?= $siswa_perempuan ?></b></li>
                <li>Total Siswa : <b><?= $total_siswa ?></b></li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white">
            <h5>Data Siswa Kelas <?= $kelas->nama_kelas ?></h5>
        </div>
        <div class="card-body">

            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddSiswa">
                <i class="fas fa-plus"></i> Tambah Siswa
            </button>
            <button class="btn btn-danger mb-3" data-toggle="modal" data-target="#modalImportSiswa">
                <i class="fas fa-download"></i> Import Siswa
            </button>
            <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalnaikKelas">
                <i class="fas fa-upload"></i> Naik Kelas
            </button>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($siswa as $s) :?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s->nama ?></td>
                                <td><?= ($s->jenkel == "L" ? "Laki-Laki" : "Perempuan") ?></td>
                                <td><?= $s->tempat_lahir.", ". $s->tgl_lahir ?></td>
                                <td><?= $s->alamat ?></td>
                                <td><?= $s->telp ?></td>
                                <td>
                                    <a href="<?= base_url() ?>siswa/detail/<?= $s->id_siswa ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url() ?>siswa/edit/<?= $s->id_siswa ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url() ?>siswa/hapus/<?= $s->id_siswa ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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

    <!-- Modal Add Siswa -->
    <div class="modal fade" id="modalAddSiswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        Tambah Siswa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>siswa/save/kelas" method="POST">
                        <input type="hidden" name="kelas_id" value="<?= $kelas->id_kelas ?>">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="number" name="nis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="number" name="nisn" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenkel" class="form-control">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan_ortu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="number" name="telp" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
    <!-- End Modal -->

    <!-- Modal Import Siswa -->
    <div class="modal fade" id="modalImportSiswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        Import Siswa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>import" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="kelas_id" value="<?= $kelas->id_kelas ?>">
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Siswa</label>
                            <input type="number" name="jml" class="form-control" required placeholder="Masukkan jumlah siswa yang ingin di import">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
    <!-- End Modal -->

    <!-- Modal Import Siswa -->
    <div class="modal fade" id="modalnaikKelas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">
                        Naik Kelas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>kelas/naik" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="kelas_id_sekarang" value="<?= $kelas->id_kelas ?>">
                        <div class="form-group">
                            <label>Pilih Kelas</label>
                            <select name="kelas_id" class="form-control">
                                <?php foreach($data_kelas as $kls): ?>
                                    <option value="<?= $kls->id_kelas ?>"><?= $kls->nama_kelas ?></option>
                                <?php endforeach; ?>
                                    <option value="0">Lulus</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Naik Kelas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
    <!-- End Modal -->
</div>



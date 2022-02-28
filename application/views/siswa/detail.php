<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Siswa</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $siswa->nama ?></li>
        </ol>
    </nav>

    <!-- card informasi kelas -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Detail Siswa</h5>
        </div>
        <div class="card-body">
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
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
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
            </table>
        </div>
    </div>

</div>
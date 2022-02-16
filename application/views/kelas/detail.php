<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kelas') ?>">Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelas <?= $kelas->nama_kelas ?></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

            <h3>Data Siswa Kelas <?= $kelas->nama_kelas ?></h3>
            <hr>
            <a href="" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Siswa</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
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
                        <tr>
                            <td>1</td>
                            <td>Hilmi Mubarok</td>
                            <td>Laki-Laki</td>
                            <td>Kendal, 19 Mei 1998</td>
                            <td>Tambaksari, RT 02 RW 03 Rowosari Kendal</td>
                            <td>083127903672</td>
                            <td>
                                <a href="" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
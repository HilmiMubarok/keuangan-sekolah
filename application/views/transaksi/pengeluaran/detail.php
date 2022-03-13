<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kelas') ?>">Pengeluaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengeluaran <?= formatHariTanggal($data_pengeluaran->tanggal) ?></li>
        </ol>
    </nav>

    <!-- card informasi kelas -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Pengeluaran <?= formatHariTanggal($data_pengeluaran->tanggal) ?></h5>
        </div>
        <div class="card-body">
            <ul>
                <li>Kategori : <b><?= $data_pengeluaran->nama_jenis_pengeluaran ?></b></li>
                <li>Tanggal : <b><?= formatHariTanggal($data_pengeluaran->tanggal) ?></b></li>
                <li>Nominal : <b>Rp. <?= number_format($data_pengeluaran->nominal) ?></b></li>
                <li>Keterangan : <b><?= $data_pengeluaran->keterangan ?></b></li>
                <li>Diinput oleh : <b><?= $data_pengeluaran->user_name ?></b></li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="<?= base_url() ?>cetak/notapengeluaran/<?= $data_pengeluaran->id_pengeluaran ?>" target="_blank" class="btn btn-primary">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
            <a href="<?= base_url('transaksi/pengeluaran') ?>" class="btn btn-success">
                Kembali
            </a>
        </div>
    </div>

</div>



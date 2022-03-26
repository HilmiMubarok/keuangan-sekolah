<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('transaksi/pemasukan') ?>">Pemasukan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemasukan <?= formatHariTanggal($data_pemasukan->tanggal) ?></li>
        </ol>
    </nav>

    <!-- card informasi kelas -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Pemasukan <?= formatHariTanggal($data_pemasukan->tanggal) ?></h5>
        </div>
        <div class="card-body">
            <ul>
                <li>Kategori : <b><?= $data_pemasukan->nama_jenis_pemasukan ?></b></li>
                <li>Tanggal : <b><?= formatHariTanggal($data_pemasukan->tanggal) ?></b></li>
                <li>Nominal : <b>Rp. <?= number_format($data_pemasukan->nominal) ?></b></li>
                <li>Keterangan : <b><?= $data_pemasukan->keterangan ?></b></li>
                <?php if($data_pemasukan->siswa_id !== "0"):?>
                    <li>Siswa : <b><?= $data_pemasukan->nama ?></b></li>
                <?php endif?>
                <li>Diinput oleh : <b><?= $data_pemasukan->user_name ?></b></li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="<?= base_url() ?>cetak/notapemasukan/<?= $data_pemasukan->id_pemasukan ?>" class="btn btn-primary">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
            <a href="<?= base_url('transaksi/pemasukan') ?>" class="btn btn-success">
                Kembali
            </a>
        </div>
    </div>

</div>



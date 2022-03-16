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
                    <form action="<?= base_url("cetak/aktiva_tetap") ?>" method="GET">

                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-group p-2 mr-3" style="width:100%; border: 1px solid grey; border-radius: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="exampleRadios1" value="all">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Semua Data
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group p-2 mr-3" style="width:100%; border: 1px solid grey; border-radius: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="exampleRadios2" value="bulan">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Per Bulan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="bulan" class="form-control">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group p-2" style="width:100%; border: 1px solid grey; border-radius: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="exampleRadios3" value="periode">
                                        <label class="form-check-label" for="exampleRadios3">
                                            Per Periode
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_start" placeholder="Dari">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_end" placeholder="Sampai">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="cetak" value="cetak">
                            <i class="fas fa-print"></i> Cetak
                        </button>
                    </form>
                </div>
            </div> <!-- End Card -->
        </div>

    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Data Pengeluaran</h5>
                </div>
                <div class="card-body">
                    <a href="" class="mb-3 btn btn-primary text-white">
                        <i class="fas fa-print"></i> Cetak Semua
                    </a>
                    <table id="dataTable" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Penginput</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($pengeluaran as $p): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= formatHariTanggal($p->tanggal) ?></td>
                                    <td><?= $p->nama_jenis_pengeluaran ?></td>
                                    <td><?= $p->nominal ?></td>
                                    <td><?= $p->keterangan ?></td>
                                    <td><?= $p->user_name ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- End Card -->
        </div>

    </div>
	
	
</div>
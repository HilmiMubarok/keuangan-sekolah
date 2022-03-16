<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header bg-primary text-white">
			<h4>Edit Siswa <?= $siswa->nama ?></h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url("siswa/update") ?>" method="POST">
				<input type="hidden" name="id_siswa" class="form-control" value="<?= $siswa->id_siswa ?>">
				<div class="form-group">
					<label>Kelas</label>
					<select name="kelas_id" class="form-control">
						<?php foreach($kelas as $k): ?>
							<option value="<?= $k->id_kelas ?>" <?= ($siswa->kelas_id == $k->id_kelas) ? "selected" : null ?>><?= $k->nama_kelas ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>NIS</label>
					<input type="number" name="nis" class="form-control" value="<?= $siswa->nis ?>">
				</div>
				<div class="form-group">
					<label>NISN</label>
					<input type="number" name="nisn" class="form-control" value="<?= $siswa->nisn ?>">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" value="<?= $siswa->nama ?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenkel" class="form-control">
						<option value="L" <?= ($siswa->jenkel == "L") ? "selected" : null ?>>Laki-Laki</option>
						<option value="P" <?= ($siswa->jenkel == "P") ? "selected" : null ?>>Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" value="<?= $siswa->tempat_lahir ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" id="datepicker" name="tgl_lahir" class="form-control" value="<?= $siswa->tgl_lahir ?>">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control" cols="30" rows="5"><?= $siswa->alamat ?></textarea>
				</div>
				<div class="form-group">
					<label>Nama Ayah</label>
					<input type="text" name="nama_ayah" class="form-control" value="<?= $siswa->nama_ayah ?>">
				</div>
				<div class="form-group">
					<label>Nama Ibu</label>
					<input type="text" name="nama_ibu" class="form-control" value="<?= $siswa->nama_ibu ?>">
				</div>
				<div class="form-group">
					<label>Pekerjaan</label>
					<input type="text" name="pekerjaan_ortu" class="form-control" value="<?= $siswa->pekerjaan_ortu ?>">
				</div>
				<div class="form-group">
					<label>Asal Sekolah</label>
					<input type="text" name="asal_sekolah" class="form-control" value="<?= $siswa->asal_sekolah ?>">
				</div>
				<div class="form-group">
					<label>No. Telepon</label>
					<input type="number" name="telp" class="form-control" value="<?= $siswa->telp ?>">
				</div>
				
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Simpan siswa
				</button>
				<a href="<?= base_url("siswa") ?>">
					<button class="btn btn-success" type="button">
						Kembali
					</button>
				</a>
			</form>
		</div>
	</div>
</div>
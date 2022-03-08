<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Setting</li>
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
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">Ganti Password</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('setting/changepassword') ?>" method="POST">
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="password" name="pass_lama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="password" name="pass_baru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password Baru</label>
                            <input type="password" name="pass_baru_confirm" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save"></i> Ganti Password
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php if($this->session->userdata('role') == 'Admin'): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="card-title">Tambah User</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('setting/saveuser') ?>" method="POST">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="user_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="user_username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select name="role_id" class="form-control">
                                    <?php foreach($roles as $r): ?>
                                        <option value="<?= $r->id_role ?>"><?= $r->name ?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-plus"></i> Tambah User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
	
</div>
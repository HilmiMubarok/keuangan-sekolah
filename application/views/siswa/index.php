<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
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

    
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Data Siswa</h5>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-hover table-striped dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>sadasd</th>
                        <th>laksd</th>
                        <th>sadjahsjd</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>asddddajkshd</td>
                        <td>aksjaaaksd</td>
                        <td>asdadghasd</td>
                    </tr>
                    <tr>
                        <td>asdadajkshd</td>
                        <td>aksjdhaksd</td>
                        <td>asdjhasdghasd</td>
                    </tr>
                    <tr>
                        <td>asdjasdajkshd</td>
                        <td>aksjdhaksd</td>
                        <td>asdjhasdghasd</td>
                    </tr>
                    <tr>
                        <td>asdjasdajkshd</td>
                        <td>aksjdhaksd</td>
                        <td>asdjhasdghasd</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
	
	
</div>
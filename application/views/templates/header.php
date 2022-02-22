<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title><?= $title ?></title>

		<!-- Custom fonts for this template-->
		<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/datepicker.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

		<!-- DataTable -->
		<!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css
https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css
https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css -->

		<link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.bootstrap4.min.css">

	</head>

	<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("dashboard") ?>">
				<div class="sidebar-brand-text mx-3">KEUANGAN SEKOLAH</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li class="nav-item text-center my-3">
				<img src="https://i.pravatar.cc/70" style="border-radius: 100%; display:block; margin:auto" alt="avatar">
				<p class="mt-3 text-white font-weight-bold"><?= $nama_user ?> <br><?= $jabatan ?></p>
			</li>

			<hr class="sidebar-divider my-0">


			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url("dashboard") ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span class="font-weight-bold">Dashboard</span>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="#!" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
					<i class="fas fa-fw fa-book"></i>
					<span class="font-weight-bold">Data</span>
				</a>
				<div id="collapseData" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				  <div class="bg-white py-2 collapse-inner rounded">
				    <h6 class="collapse-header">Data</h6>
				    <a class="collapse-item" href="<?= base_url("jurusan") ?>">Jurusan</a>
				    <a class="collapse-item" href="<?= base_url("kelas") ?>">Kelas</a>
				    <a class="collapse-item" href="<?= base_url("siswa") ?>">Siswa</a>
				    <a class="collapse-item" href="<?= base_url("pengeluaran") ?>">Pengeluaran</a>
				    <a class="collapse-item" href="<?= base_url("pemasukan") ?>">Pemasukan</a>
				    
				  </div>
				</div>
				
			</li>

			<!-- Menu Kategori -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url("pengeluaran") ?>">
					<i class="fas fa-fw fa-money-check-alt"></i>
					<span class="font-weight-bold">Pengeluaran</span>
				</a>
			</li>

			<!-- Menu User -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url("pemasukan") ?>">
					<i class="fas fa-fw fa-wallet"></i>
					<span class="font-weight-bold">Pemasukan</span>
				</a>
			</li>



			<!-- Menu User -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#!" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-book-open"></i>
					<span class="font-weight-bold">Laporan</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				  <div class="bg-white py-2 collapse-inner rounded">
				    <h6 class="collapse-header">Laporan</h6>
				    <a class="collapse-item" href="<?= base_url("laporan/admin") ?>">Admin</a>
				    <a class="collapse-item" href="<?= base_url("laporan/kategori") ?>">Kategori</a>
				    <a class="collapse-item" href="<?= base_url("laporan/aktiva_tetap") ?>">Aktiva Tetap</a>
				    <a class="collapse-item" href="<?= base_url("laporan/penyusutan") ?>">Penyusutan</a>
				    <a class="collapse-item" href="<?= base_url("laporan/at_dihentikan") ?>">AT Dihentikan</a>
				    <a class="collapse-item" href="<?= base_url("laporan/penjualan") ?>">Penjualan</a>
				    
				  </div>
				</div>
				
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline mt-3">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->
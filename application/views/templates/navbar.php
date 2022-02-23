<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

	<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<img src="<?= base_url('assets/img/logo_sekolah.jpg') ?>" width="45">
				</li>
			</ul>

			<ul class="navbar-nav mx-auto">
				<li class="nav-item text-center">
					<h5 class="text-dark d-inline font-weight-bold">SMK NU 02 ROWOSARI</h5>
					<br>
					<small>Tahun Ajaran 2020/2021</small>
				</li>
			</ul>

		<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="<?= base_url('auth/logout') ?>" class="nav-link">
						<button class="btn btn-danger">
							<i class="fas fa-sign-out-alt"></i>
							Logout
						</button>
					</a>
				</li>

			</ul>

		</nav>
	<!-- End of Topbar -->
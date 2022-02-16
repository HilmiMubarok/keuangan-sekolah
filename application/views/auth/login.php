<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $title ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>
<body class="bg-gradient-success">

	<div class="container">

	<!-- Outer Row -->
		<h3 class="text-center mt-5	text-white">
			Selamat Datang di Aplikasi <br> 
			<b> Sistem Informasi Pengelolaan Keuangan </b> <br>
			Pada <b> SMK NU 02 ROWOSARI </b>
		</h3>
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden shadow-lg my-3">
					<div class="card-body p-0">

					<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">
											Silahkan Login
										</h1>
<?php if ($this->session->flashdata()): ?>
										<div class="alert alert-danger">
											<?= $this->session->flashdata('pesan'); ?>
										</div>
<?php endif ?>
									</div>
									<form class="user" action="<?= base_url('auth/login') ?>" method="POST">
										<div class="form-group">
											<input type="text" name="username" class="form-control form-control-user" autofocus placeholder="Masukkan Username">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password">
										</div>
										<button type="submit" class="btn btn-success btn-user btn-block">
											Login
										</button>
									</form>
									<hr>
								</div> <!-- p-5  -->
							</div> <!-- col-lg-6 -->
						</div> <!-- row -->
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
	
</body>
</html>


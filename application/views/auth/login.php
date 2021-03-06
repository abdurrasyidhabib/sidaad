<?php
// var_dump($_SESSION['login']);die;
if (isset($_POST['masuk']) && !isset($_SESSION['login'])) { 
	echo "<script>
		alert(\"Username Atau Password Salah\")
	</script>"; }
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIDAAD| Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/adminlte') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/adminlte') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/') ?>css/adminlte.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="pic-box-hold">
			<h2>SISTEM INFORMASI DAN APLIKASI ADMINISTRASI</h2><br>
			<h5>DESA JATIMULYO</h5>
			<div class="anon-dev-logo">
				<img src="<?= base_url('assets/vendor/img/anon-dev-white.png') ?>" alt="" height="50px">
			</div>
		</div>
		<div class="login-box-hold">
			<div class="login-logo">
				<img src="<?= base_url('assets/vendor/img/logo-lampsel-1.png') ?>" alt="" height="200px">
				<br>
				<br>
			</div>
			<!-- /.login-logo -->

			<div class="card-body login-card-body">

				<form action="<?= base_url('auth') ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Username" name="username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block" name="masuk">Masuk</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
			<div class="row fixed-bottom position-relative mt-5 pt-5">
				<div class="col-12 justify-content-between px-2 py-1 d-flex">
					<p>Built With Love by <strong>Anon Dev</strong></p>
					<p> </p>
					<p><strong>v07042020</strong></p>
				</div>
			</div>
		</div>

	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>

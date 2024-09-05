<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Halaman Login - SIT Istiqamah YPAIT Balikpapan</title>

	<!-- Global stylesheets -->
	<link href="<?= base_url() ?>assets/backend/assets/fonts/inter/inter.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/backend/assets/icons/phosphor/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/backend/assets/one/css/ltr/all.min.css" rel="stylesheet">
	<!-- /global stylesheets -->

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<style>
		body {
			background-color: #e6f3ff;
			font-family: 'Poppins', sans-serif;
			background-image: url('<?= base_url("assets/img/background.jpg") ?>');
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
		}

		.card {
			border-radius: 15px;
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
			width: 100%;
			max-width: 500px;
			margin: 20px auto;
			/* tambahkan margin top dan bottom */
			background-color: rgba(255, 255, 255, 0.9);
		}

		.card-body {
			padding: 2.5rem;
		}

		.form-label {
			font-weight: 500;
			color: #333;
		}

		.btn-primary {
			background-color: #007bff;
			border-color: #007bff;
			color: #fff;
			font-weight: 600;
			transition: all 0.3s ease;
		}

		.btn-primary:hover {
			background-color: #0056b3;
			border-color: #0056b3;
		}

		.form-control {
			border-radius: 10px;
			padding: 0.75rem 1rem;
		}

		.logo {
			max-height: 80px;
			margin-bottom: 1.5rem;
		}

		@media (max-width: 767px) {
			.card {
				max-width: 95%;
				/* Increased from 90% to 95% for mobile */
			}

			.card-body {
				padding: 2rem;
			}
		}

		@media (max-width: 480px) {
			.card {
				max-width: 90%;
				margin: 0 auto;
			}

			.card-body {
				padding: 1.5rem;
			}

			.form-label {
				font-size: 14px;
			}

			.form-control {
				font-size: 14px;
			}

			.btn-primary {
				font-size: 14px;
			}
		}

		/* Untuk device smartphone dengan ukuran layar 320px ke bawah */
		@media (max-width: 320px) {
			.card {
				max-width: 95%;
				margin: 0 auto;
			}

			.card-body {
				padding: 1rem;
			}

			.form-label {
				font-size: 12px;
			}

			.form-control {
				font-size: 12px;
			}

			.btn-primary {
				font-size: 12px;
			}
		}
	</style>
</head>

<body>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content-inner">
				<div class="content d-flex justify-content-center align-items-center" style="min-height: 100vh;">
					<form class="login-form w-100" autocomplete="off" method="post" action="proses">
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-4">
									<img src="<?= base_url('assets/img/logosekolah.png'); ?>" class="logo img-fluid" alt="Logo Sekolah">
									<h2 class="mb-1 text-primary">Login</h2>
									<p class="text-muted">Selamat datang kembali</p>
								</div>

								<div class="mb-3">
									<label class="form-label">Email / Username</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
										<input type="text" name="username" class="form-control" placeholder="Masukkan email atau username" required>
									</div>
								</div>

								<div class="mb-4">
									<label class="form-label">Password</label>
									<div class="input-group">
										<span class="input-group-text"><i class="fas fa-lock"></i></span>
										<input name="password" type="password" class="form-control" placeholder="Masukkan password" required>
									</div>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-primary btn-lg w-100">
										<i class="fas fa-sign-in-alt me-2"></i>
										Masuk
									</button>
									<p><small class="text-danger mt-3 fw-bold"><?= $this->session->userdata('gagal'); ?></small></p>
									<p class="mt-3"><a href="<?= base_url('daftar') ?>" class="text-primary">Daftar akun</a></p>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $title; ?></title>

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
			max-width: 800px;
			/* Increased from 500px to 800px */
			margin: 0 auto;
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
			}

			.card-body {
				padding: 2rem;
			}
		}

		.text-center-1 {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.btn-secondary {
			margin-right: 10px;
		}

		.btn-primary {
			margin-left: 10px;
		}
	</style>
</head>

<body>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content-inner">
				<div class="content d-flex justify-content-center align-items-center">
					<?php
					if (($daftar == 'ON') && $proses_jum > 0) : ?>
						<form action="kirimdaftar" class="flex-fill" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-8 offset-lg-2"> <!-- Changed from col-lg-6 to col-lg-8 -->
									<div class="card mb-0">
										<div class="card-body">
											<div class="text-center mb-4">
												<img src="<?= base_url('assets/img/logosekolah.png'); ?>" class="logo img-fluid" alt="Logo Sekolah">
												<h2 class="mb-0 text-primary" style="color: blue;">Pendaftaran</h2>
												<p class="text-muted">Lengkapi form di bawah ini</p>
											</div>
											<?php
											$flashdata = $this->session->flashdata();
											if ($flashdata) {
												foreach ($flashdata as $key => $value) {
													// Display a Bootstrap alert component with a dynamic class based on the value of $key
													echo '<div class="alert alert-' . ($key == 'success' ? 'success' : 'danger') . ' alert-dismissible fade show" role="alert">';
													echo $value; // Output the alert message
													echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display=\'none\'"></button>';
													echo '</div>';
												}
											}
											?>
											<div id="alert-container-20"></div>
											<div class="mb-3">
												<label class="form-label text-center d-block">Pilih Jalur Penerimaan</label>
												<select class="form-select" name="jalur">
													<?php foreach ($proses as $p) : ?>
														<?php if (sisaKuota($p->replid) != 0) : ?>
															<option value="<?= $p->replid ?>"><?= $p->nama ?> - <?= $p->keterangan ?> (Kuota: <?= sisaKuota($p->replid) ?>)</option>
														<?php endif; ?>
													<?php endforeach; ?>
												</select>
											</div>

											<div class="mb-3">
												<label class="form-label">Nama Lengkap</label>
												<input type="text" class="form-control" name="nama">
												<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Tempat Lahir</label>
														<input type="text" class="form-control" name="tempat">
														<?= form_error('tempat', '<small class="text-danger">', '</small>'); ?>
													</div>
												</div>

												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label">Tanggal Lahir</label>
														<input type="date" class="form-control" name="tanggal">
														<?= form_error('date', '<small class="text-danger">', '</small>'); ?>
													</div>
												</div>
											</div>

											<div class="mb-3">
												<label class="form-label">Jenis Kelamin</label>
												<select class="form-select" name="kelamin">
													<option value="">-</option>
													<option value="Perempuan">Perempuan</option>
													<option value="Laki-laki">Laki-laki</option>
												</select>
												<?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
											</div>

											<div class="mb-3">
												<label class="form-label">Asal Sekolah</label>
												<input type="text" class="form-control" name="asal_sekolah">
												<?= form_error('asal_sekolah', '<small class="text-danger">', '</small>'); ?>
											</div>

											<div class="mb-3">
												<label class="form-label">Nomor Whatsapp (WA)</label>
												<input type="text" class="form-control" name="nowa">
												<?= form_error('nowa', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="mb-3">
												<label class="form-label">Apakah orang tua ananda, adalah alumni SIT ISTIQAMAH?</label>
												<input type="hidden" name="is_alumni" value="0">
												<input type="checkbox" id="alumni-checkbox" name="is_alumni" value="1">
												<div id="tahun-lulus-container" style="display: none;">
													<div class="mb-3">
														<label class="form-label">Tahun Lulus</label>
														<select class="form-select" name="tahun_lulus">
															<?php for ($i = 1997; $i <= 2020; $i++) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php } ?>
														</select>
														<div class="mb-3">
															<label class="form-label">Upload Bukti Ijazah</label>
															<input type="file" class="form-control" name="image">
															<?= form_error('dokumen', '<small class="text-danger">', '</small>'); ?>
														</div>
													</div>

												</div>
											</div>



											<div class="mb-3">
												<label class="form-label">Email (User)</label>
												<input type="email" class="form-control" name="email">
												<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
											</div>


											<div class="mb-3">
												<label class="form-label">Password</label>
												<input type="password" class="form-control" name="password1" minlength="8">
												<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
												<small class="text-muted">Password digunakan untuk masuk ke sistem PPDB online</small>
											</div>

											<div class="mb-4">
												<label class="form-label">Ulangi Password</label>
												<input type="password" class="form-control" name="password2" minlength="5">
												<?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
											</div>

											<div class="text-center-1">
												<a href="<?php echo base_url('login'); ?>" class="btn btn-secondary btn-lg w-50 me-2">
													<i class="fas fa-arrow-left me-2"></i>
													Kembali
												</a>
												<button type="submit" class="btn btn-primary btn-lg w-50">
													<i class="fas fa-user-plus me-2"></i>
													Daftar
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					<?php endif;
					if (($daftar == 'OFF') || $proses_jum == 0) : ?>
						<div class="card">
							<div class="card-body text-center">
								<img src="<?= base_url('assets/img/logosekolah.png'); ?>" class="logo img-fluid" alt="Logo Sekolah">
								<h1 class="text-uppercase">Pendaftaran belum dibuka.</h1>
							</div>
						</div>
					<?php endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		// Pastikan elemen HTML sudah siap sebelum diakses
		document.addEventListener('DOMContentLoaded', function() {
			const alumniCheckbox = document.getElementById('alumni-checkbox');
			const tahunLulusContainer = document.getElementById('tahun-lulus-container');

			// Tambahkan event listener pada checkbox
			alumniCheckbox.addEventListener('change', function() {
				if (this.checked) {
					tahunLulusContainer.style.display = 'block';
				} else {
					tahunLulusContainer.style.display = 'none';
				}
			});
		});
	</script>
</body>



</html>
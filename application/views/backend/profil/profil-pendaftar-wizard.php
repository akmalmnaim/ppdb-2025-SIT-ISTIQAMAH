	<?php if ($profil['status_data'] == 0) : ?>

		<article class="card">
			<header class="card-header bg-light">
				<h6 class="mb-0 text-uppercase text-muted text-center">
					<i class="ph-student me-2"></i> Form Profil Biodata Peserta Didik
				</h6>
			</header>
			<form id="wizard-form" class="px-3 py-3">
				<ul class="nav nav-tabs flex-column flex-sm-row" id="wizardTabs" role="tablist">
					<?php
					$steps = [
						'Informasi Pendaftaran' => 'profil-pendaftar-informasi.php',
						'Data Pribadi' => 'profil-pendaftar-pribadi.php',
						'Data Sekolah Asal' => 'profil-pendaftar-asal.php',
						'Riwayat Kesehatan' => 'profil-pendaftar-kesehatan.php',
						'Data Orang Tua' => 'profil-pendaftar-ortu.php',
						'Data Wali' => 'profil-pendaftar-wali.php',
						'Data Tambahan Ayah' => 'profil-pendaftar-ayah-wawancara.php',
						'Data Tambahan Ibu' => 'profil-pendaftar-ibu-wawancara.php',
						'Data Saudara' => 'profil-pendaftar-saudara.php',
						'Informasi Tambahan' => 'profil-pendaftar-tambah.php',
						'Latar Belakang' => 'profil-latarbelakang.php'
					];

					$i = 0;
					foreach ($steps as $title => $file) :
						$i++;
					?>
						<li class="nav-item flex-sm-fill" role="presentation">
							<a class="nav-link text-center <?= $i === 1 ? 'active' : '' ?>" id="step<?= $i ?>-tab" data-bs-toggle="tab" href="#step<?= $i ?>" role="tab" aria-controls="step<?= $i ?>" aria-selected="<?= $i === 1 ? 'true' : 'false' ?>">
								<?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="tab-content mt-3" id="wizardTabContent">
					<?php
					$i = 0;
					foreach ($steps as $title => $file) :
						$i++;
					?>
						<div class="tab-pane fade <?= $i === 1 ? 'show active' : '' ?>" id="step<?= $i ?>" role="tabpanel" aria-labelledby="step<?= $i ?>-tab">
							<?php if ($title != 'Data Saudara') : ?>
								<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
									<span class="fw-semibold">Perhatian!</span>
									Sebelum beralih ke tahapan selanjutnya mohon data disimpan terlebih dahulu dengan menekan tombol
									<strong class="text-info text-uppercase">
										<i class="ph-floppy-disk me-2"></i>Simpan
									</strong>
									di bagian bawah.
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
							<?php endif; ?>
							<?php require_once $file; ?>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="mt-3 d-flex justify-content-between flex-wrap">
					<button type="button" class="btn btn-secondary mb-2" id="prevBtn">Kembali</button>
					<button type="button" class="btn btn-primary mb-2" id="nextBtn">Lanjut</button>
					<button type="button" class="btn btn-success mb-2" id="finishBtn" style="display: none;">Selesai</button>
				</div>
			</form>
		</article>

		<!-- Modal -->
		<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<header class="modal-header">
						<h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</header>
					<div class="modal-body">
						Setelah disimpan data ini akan menjadi permanen dan tidak bisa diubah lagi. Apakah Anda yakin?
					</div>
					<footer class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" id="confirmSave">Ya, Simpan</button>
					</footer>
				</div>
			</div>
		</div>

		<!-- Modal untuk peringatan field kosong -->
		<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<header class="modal-header">
						<h5 class="modal-title" id="warningModalLabel">Peringatan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</header>
					<div class="modal-body">
						Mohon lengkapi semua field yang wajib diisi sebelum menyimpan.
					</div>
					<footer class="modal-footer">
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
					</footer>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				let currentStep = 1;
				const totalSteps = <?= count($steps) ?>;

				function updateButtons() {
					$('#prevBtn').prop('disabled', currentStep === 1);
					if (currentStep === totalSteps) {
						$('#nextBtn').hide();
						$('#finishBtn').show();
					} else {
						$('#nextBtn').show();
						$('#finishBtn').hide();
					}
				}

				function showTab(step) {
					$('.tab-pane').removeClass('show active');
					$(`#step${step}`).addClass('show active');
					$('.nav-link').removeClass('active');
					$(`#step${step}-tab`).addClass('active');
					currentStep = step;
					updateButtons();
				}

				function navigateStep(direction) {
					let newStep = currentStep + direction;
					if (newStep >= 1 && newStep <= totalSteps) {
						showTab(newStep);
					}
				}

				// Initialize buttons
				updateButtons();

				// Handle navigation buttons
				$('#prevBtn').on('click', function() {
					navigateStep(-1);
				});

				$('#nextBtn').on('click', function() {
					navigateStep(1);
				});

				$('#finishBtn').on('click', function() {
					$('#confirmModal').modal('show');
				});

				// Allow clicking on any step
				$('.nav-link').on('click', function() {
					let stepIndex = $(this).attr('id').replace('step', '').replace('-tab', '');
					showTab(parseInt(stepIndex));
				});

				// Handle the confirmation
				$('#confirmSave').on('click', function() {
					// Check if all required fields are filled
					var allFieldsFilled = true;
					$('input[required], select[required], textarea[required]').each(function() {
						if ($(this).val() === '') {
							allFieldsFilled = false;
							return false; // Exit the loop early if an empty field is found
						}
					});

					if (!allFieldsFilled) {
						$('#confirmModal').modal('hide');
						$('#warningModal').modal('show');
						return;
					}

					let replid = $('[name="replid"]').val();
					$.get('<?= base_url("dashboard/profilpermanen/") ?>' + replid, function(data, status) {
						if (data > 0) {
							$('#confirmModal').modal('hide');
							$('#alert-container').html(`
								<div class="alert alert-success border-0 alert-dismissible mt-3 fade show">
									Data berhasil disimpan.
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
							`);
							// Scroll to the top of the page to show the alert
							$('html, body').animate({
								scrollTop: 0
							}, 'slow');
							setTimeout(function() {
								window.location.href = '<?= base_url("dashboard") ?>';
							}, 2000);
						} else {
							$('#confirmModal').modal('hide');
							$('#alert-container').html(`
								<div class="alert alert-danger border-0 alert-dismissible mt-3 fade show">
									Terjadi kesalahan saat menyimpan data. Silakan coba lagi.
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
							`);
							// Scroll to the top of the page to show the alert
							$('html, body').animate({
								scrollTop: 0
							}, 'slow');
						}
					});
				});

				// Responsive adjustments
				function adjustLayout() {
					if ($(window).width() < 576) {
						$('#wizardTabs').addClass('flex-column').removeClass('flex-sm-row');
						$('.nav-item').removeClass('flex-sm-fill');
					} else {
						$('#wizardTabs').removeClass('flex-column').addClass('flex-sm-row');
						$('.nav-item').addClass('flex-sm-fill');
					}
				}

				$(window).resize(adjustLayout);
				adjustLayout(); // Call on page load
			});
		</script>

	<?php else : ?>

		<article class="card">
			<header class="card-header text-uppercase">
				<i class="ph-info me-2"></i>
				Informasi
			</header>
			<div class="card-body">
				<h1 class="h3">Status profil data Anda sudah <strong class="text-uppercase text-success">Permanen</strong></h1>
				<p>Anda dapat menunggu jadwal Wawancara dan Tes di bagian menu jadwal.</p>
			</div>
		</article>

	<?php endif; ?>
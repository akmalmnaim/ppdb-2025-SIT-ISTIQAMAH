<?php
defined('BASEPATH') or exit('No direct script access allowed');
if ($status == '9') :
	$nama = $info['nama'];
	$userStatus = 'Administrator';
	$bg = 'bg-primary';
	$foto = base_url() . 'assets/img/user.png';
	$ver = '';
endif;
if ($status == '1') :
	$nama = $info['nama'];
	$userStatus = 'Keuangan';
	$bg = 'bg-success';
	$foto = base_url() . 'assets/img/uang.png';
	$ver = '';
endif;
if ($status == '2') :
	$nama = $info['nama'];
	$userStatus = $info['nopendaftaran'];
	$statusData = $info['status_data'];
	$isProses = $info['is_proses'];
	$bg = 'bg-info';
	if ($info['foto'] == '') {
		$foto = 'assets/img/student.png';
	} else {
		$foto = 'upload/foto/' . $info['foto'];
	}
	$ver = '<i class="ms-2 ph-check-circle" title="Terverifikasi"></i>';
endif;
?>
<div class="card">
	<div class="card-header bg-light">
		<div class="d-flex justify-content-between align-items-center flex-wrap">
			<img src="<?= base_url('assets/img/logo.png') ?>" height="40" class="mb-2 mb-md-0">
			<img src="<?= base_url('assets/img/logosekolah.png') ?>" height="40">
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-md-4 col-lg-3 mb-4">
				<div class="card">
					<div class="card-body <?= $bg ?> text-white text-center card-img-top">
						<div class="card-img-actions d-inline-block mb-3">
							<img class="img-fluid rounded-circle" src="<?= $foto; ?>" width="170" height="170" alt="">
						</div>

						<h6 class="mb-0 text-uppercase">
							<?= $nama . $ver; ?>
						</h6>
						<span class="badge bg-success text-white text-uppercase"><?= $userStatus; ?></span>

						<ul class="list-inline list-inline-condensed mt-3 mb-0">
							<li class="list-inline-item">
								<a href="javascript:logout()" class="btn btn-outline-white btn-icon rounded-pill" title="Keluar Aplikasi">
									<i class="ph-sign-out"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="list-group list-group-borderless py-2">
						<a href="<?= base_url('dashboard'); ?>" class="list-group-item list-group-item-action">
							<i class="ph-house me-3"></i>
							Beranda
						</a>
						<?php if ($status == '9') : ?>
							<a href="#" class="list-group-item list-group-item-action menuku" data-nama="pendaftar">
								<i class="ph-identification-badge me-3"></i>
								Pendaftar
							</a>
							<a href="#" class="list-group-item list-group-item-action menuku" data-nama="prosespenerimaan">
								<i class="ph-chart-pie me-3"></i>
								Proses Penerimaan
							</a>
						<?php endif; ?>
						<?php if ($status == '1') : ?>
							<a href="#" class="list-group-item list-group-item-action">
								<i class="ph-identification-badge me-3"></i>
								Pendaftar
							</a>
							<a href="#" class="list-group-item list-group-item-action">
								<i class="ph-check-circle me-3"></i>
								Konfirmasi Pendaftar
							</a>
						<?php endif; ?>
						<?php if ($status == '2') : ?>
							<?php if ($info['is_proses'] > 2) : ?>
								<a href="#" class="list-group-item list-group-item-action menuku" data-nama="dashboard/ubahpassword">
									<i class="ph-key me-3"></i>
									Ubah Password
								</a>
								<a href="#" class="list-group-item list-group-item-action menuku" data-nama="dashboard/profil">
									<i class="ph-student me-3"></i>
									Profil
								</a>
								<a href="#" class="list-group-item list-group-item-action menuku" data-nama="dashboard/jadwal">
									<i class="ph-calendar me-3"></i>
									Jadwal
								</a>
								<a href="#" class="list-group-item list-group-item-action menuku" data-nama="dashboard/pengumuman">
									<i class="ph-info me-3"></i>
									Pengumuman
								</a>
							<?php endif; ?>
						<?php endif; ?>
						<a href="javascript:logout()" class="list-group-item list-group-item-action">
							<i class="ph-sign-out me-3"></i>
							Keluar
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-8 col-lg-9">
				<div class="halaman">
					<?php
					if ($status == '9') :
						$alert = '<div class="alert alert-success alert-dismissible px-0 py-0">
						<div class="alert-heading bg-primary text-white text-uppercase fw-semibold text-center px-3 py-3">Penerimaan Peserta Didik Baru Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</div>
						<div class="px-4 py-4">
						<h2>Hi Administrator PPDB</h2>
						<p>
						Selamat Datang di sistem Penerimaan Peserta Didik Baru (PPDB) SIT Istiqamah Balikpapan. Apabila anda menemukan kesulitan dan permasalahan dalam penggunaan aplikasi ini anda dapat menghubungi kami melalui WA.

						</p>
						<p><code class="text-info">Ka. Unit Data dan Informasi</code></p>
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						</div>
						</div>';
						echo $alert;
						require 'quickstat.php';
						require 'quickproses.php';
					endif;
					if ($status == '1') :
						$alert = '<div class="alert alert-success alert-dismissible px-0 py-0">
						<div class="alert-heading bg-success text-white text-uppercase fw-semibold text-center px-3 py-3">Penerimaan Peserta Didik Baru Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</div>
						<div class="px-4 py-4">
						<h2>Hi Keuangan PPDB</h2>
						<p>
						Selamat Datang di sistem Penerimaan Peserta Didik Baru (PPDB) SIT Istiqamah Balikpapan. Apabila anda menemukan kesulitan dan permasalahan dalam penggunaan aplikasi ini anda dapat menghubungi kami melalui WA.

						</p>
						<p><code class="text-info">Ka. Unit Data dan Informasi</code></p>
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						</div>
						</div>';
						echo $alert;
					endif;
					if ($status == '2') :
						if ($statusData == 0) {
							if ($isProses == 4 || $isProses == 3) {
								$alert = '<div class="alert alert-success alert-dismissible px-0 py-0">
                    <div class="alert-heading bg-info text-white text-uppercase fw-semibold text-center px-3 py-3">Penerimaan Peserta Didik Baru Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</div>
                    <div class="px-4 py-4">
                    <h2>Hi ' . $nama . '</h2>
                    <p>
                    Selamat datang di Sistem Penerimaan Peserta Didik Baru SIT Istiqamah YPAITB. <strong>Silahkan isi biodata di menu Profil, untuk mendapatkan jadwal tes.</strong>  Bila anda menemui kesulitan dapat langsung menghubungi kami di 081298781997



                    </p>
                    <p><code class="text-info">Tim IT PPDB</code></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    </div>';
							} else {
								$alert = '<div class="alert alert-success alert-dismissible px-0 py-0">
								<div class="alert-heading bg-info text-white text-uppercase fw-semibold text-center px-3 py-3">Penerimaan Peserta Didik Baru Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</div>
								<div class="px-4 py-4">
								<h2>Hi ' . $nama . '</h2>
								<p>
								Selamat datang di Sistem Penerimaan Peserta Didik Baru SIT Istiqamah YPAITB. <strong>Silahkan Upload Slip Bayar</strong>,  Bila anda menemui kesulitan dapat langsung menghubungi kami di 081298781997
			
			
			
								</p>
								<p><code class="text-info">Tim IT PPDB</code></p>
								<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								</div>
								</div>';
							}
						} elseif ($statusData == 1) {
							if ($isProses == 10 || $isProses == 11 || $isProses == 12) {
								$alert = '<div class="alert alert-success alert-dismissible px-0 py-0">
									<div class="alert-heading bg-info text-white text-uppercase fw-semibold text-center px-3 py-3">Penerimaan Peserta Didik Baru Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</div>
									<div class="px-4 py-4">
									<h2>Hi ' . $nama . '</h2>
									<p>
									Selamat datang di Sistem Penerimaan Peserta Didik Baru SIT Istiqamah YPAITB. <strong>Hasil telah diumumkan, Silahkan buka menu pengumuman.</strong>  Bila anda menemui kesulitan dapat langsung menghubungi kami di 081298781997
									</p>
									</div>
									</div>';
							} else {
								$alert = '<div class="alert alert-success alert-dismissible px-0 py-0">
                    <div class="alert-heading bg-info text-white text-uppercase fw-semibold text-center px-3 py-3">Penerimaan Peserta Didik Baru Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</div>
                    <div class="px-4 py-4">
                    <h2>Hi ' . $nama . '</h2>
                    <p>
                    Selamat datang di Sistem Penerimaan Peserta Didik Baru SIT Istiqamah YPAITB. <strong>Anda telah mengisi profil, silahkan menunggu jadwal tes.</strong>  Bila anda menemui kesulitan dapat langsung menghubungi kami di 081298781997



                    </p>
                    <p><code class="text-info">Tim IT PPDB</code></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    </div>';
							}
						}

						echo $alert;
						if ($info['is_proses'] < 3) :
							require_once 'pduploadbayar.php';
						endif;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Yakin akan keluar aplikasi?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<a href="<?= base_url('logout') ?>" class="btn btn-primary">Keluar</a>
			</div>
		</div>
	</div>
</div>


</form>
<div class="msg_error text-danger mt-2"></div>
</div>
<script type="text/javascript">
	$('.menuku').click(function() {
		let submodul = $(this).data('nama');
		$('.halaman').html('<i class="ph-spinner spinner me-2"></i>');
		$('.halaman').load(submodul);
	});

	function logout() {
		$('#logoutModal').modal('show');
	}
</script>
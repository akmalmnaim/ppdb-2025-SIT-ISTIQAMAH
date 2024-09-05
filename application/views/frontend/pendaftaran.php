<div class="dz-bnr-inr dz-bnr-inr-sm text-center" style="background-image: url(assets/img/bnr1.jpg);">
	<div class="container">
		<div class="dz-bnr-inr-entry">
			<h1 class="text-uppercase">Pendaftaran</h1>
		</div>
	</div>
</div>
<!-- Banner End -->

<!-- Map Iframe -->
<section class="content-inner">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header bg-white text-center">
						<h4 class="card-title">Lengkapi data dibawah ini!</h4>
					</div>
					<div class="card-body">
						<div class="basic-form">
							<form action="proses/daftar" method="post">
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label">Nama Lengkap</label>
									<div class="col-sm-8">
										<input type="text" name="nama" class="form-control" placeholder="wajib diisi">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
									<div class="col-sm-4">
										<input type="text" name="tempat" class="form-control" placeholder="wajib diisi">
									</div>
									<div class="col-sm-4">
										<input type="date" name="tanggal" class="form-control" value="">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label">Asal Sekolah</label>
									<div class="col-sm-8">
										<input type="text" name="asal" class="form-control" placeholder="wajib diisi">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-4 col-form-label">Alamat Email (Verifikasi)</label>
									<div class="col-sm-8">
										<input type="email" name="email" class="form-control" placeholder="wajib diisi" >
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary">Daftar</button>
							<div>
								<?= $this->session->userdata('pesan');?>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- <div class="col-lg-6">
				<img src="https://scontent.fbpn2-1.fna.fbcdn.net/v/t39.30808-6/302442010_507371298058917_7972078269249167884_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=e3f864&_nc_ohc=jxyvw23i0EMAX_qsAOV&_nc_ht=scontent.fbpn2-1.fna&oh=00_AfAv2zm3Y-JCCq5obnBakf-fd4MbPG1OvsLIKcIEcJs1bQ&oe=64BEB6BE">
			</div> -->
		</div>
	</div>
</section>
<header class="site-header mo-left header header-transparent" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000;">
	<!-- Main Header -->
	<div class="sticky-header main-bar-wraper navbar-expand-lg">
		<div class="main-bar clearfix">
			<div class="container">
				<div class="row align-items-center">
					<!-- Website Logo -->
					<div class="col-6 col-md-3">
						<div class="logo-header mt-0">
							<a href="https://istiqamahypaitb.sch.id" class="logo-dark">
								<img src="<?= base_url() ?>assets/img/Logo-YAYASAN.png" alt="" class="img-fluid">
							</a>
						</div>
					</div>

					<!-- Extra Nav -->
					<div class="col-6 col-md-9 text-end">
						<div class="d-flex flex-row justify-content-end">
							<button class="btn btn-primary btn-sm btn-shadow me-2 d-none d-sm-inline-block" onclick="pendaftaran()">Daftar</button>
							<a class="btn btn-success btn-sm btn-shadow d-none d-sm-inline-block" href="<?= base_url('login') ?>">Masuk</a>
							<div class="dropdown d-inline-block d-sm-none">
								<button class="btn btn-secondary btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fas fa-bars"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
									<li><a class="dropdown-item" href="javascript:void(0);" onclick="pendaftaran()">Daftar</a></li>
									<li><a class="dropdown-item" href="<?= base_url('login') ?>">Masuk</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header End -->
</header>
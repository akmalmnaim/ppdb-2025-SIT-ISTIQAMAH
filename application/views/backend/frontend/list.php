<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-muted text-uppercase"><i class="la la-cloud-upload-alt me-2"></i>Upload Gambar Untuk FrontEnd</h4>
			</div>
			<div class="card-body">
				<!-- Nav tabs -->
				<div class="default-tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-bs-toggle="tab" href="#syarat1"><i class="la la-home me-2"></i> Persyaratan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="tab" href="#alur1"><i class="la la-bezier-curve me-2"></i> Alur</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="tab" href="#jadwal1"><i class="la la-calendar-check me-2"></i> Jadwal</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="tab" href="#biaya1"><i class="la la-comment-dollar me-2"></i> Biaya</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="syarat1" role="tabpanel">
							<div class="pt-4">
								<div class="row">
									<div class="col-xl-4 col-lg-4">
										<form enctype="multipart/form-data">
										<input type="file" name="gbsyarat" id="syarat" class="form-control" accept=".jpg, .png" onchange="previewImagesyarat(event)">
										<input type="hidden" name="nmfile">
									</form>
									</div>
									<div class="col-xl-1 col-lg-1">
										<button class="btn btn-primary" onclick="simpan('syarat')">Simpan</button>
									</div>
								</div>
								<div class="row">
									<div id="imgsyaratpreview" class="mt-3">
										<img src="upload/<?= getImgFrontend('syarat')?>">
									</div>
								</div>								
							</div>
						</div>
						<div class="tab-pane fade" id="alur1">
							<div class="pt-4">
								<div class="row">
									<div class="col-xl-4 col-lg-4">
										<form enctype="multipart/form-data">
										<input type="file" name="gbalur" id="alur" class="form-control" accept=".jpg, .png" onchange="previewImagealur(event)">
									</form>
									</div>
									<div class="col-xl-1 col-lg-1">
										<button class="btn btn-primary" onclick="simpan('alur')">Simpan</button>
									</div>
								</div>
								<div class="row">
									<div id="imgalurpreview" class="mt-3">
										<img src="upload/<?= getImgFrontend('alur')?>">
									</div>
							</div>
						</div>
					</div>
						<div class="tab-pane fade" id="jadwal1">
							<div class="pt-4">
								<div class="row">
									<div class="col-xl-4 col-lg-4">
										<form enctype="multipart/form-data">
										<input type="file" id="jadwal" class="form-control" accept=".jpg, .png" onchange="previewImagejadwal(event)">
									</form>
									</div>
									<div class="col-xl-1 col-lg-1">
										<button class="btn btn-primary" onclick="simpan('jadwal')">Simpan</button>
									</div>
								</div>
								<div class="row">
									<div id="imgjadwalpreview" class="mt-3">
										<img src="upload/<?= getImgFrontend('jadwal')?>">
									</div>
							</div>
							</div>
						</div>
						<div class="tab-pane fade" id="biaya1">
							<div class="pt-4">
								<div class="row">
									<div class="col-xl-4 col-lg-4">
										<form enctype="multipart/form-data">
										<input type="file" id="biaya" class="form-control" accept=".jpg, .png" onchange="previewImagebiaya(event)">
										<input type="hidden" name="dt-biaya">
									</form>
									</div>
									<div class="col-xl-1 col-lg-1">
										<button class="btn btn-primary" onclick="simpan('biaya')">Simpan</button>
									</div>
								</div>
								<div class="row">
									<div id="imgbiayapreview" class="mt-3">
										<img src="upload/<?= getImgFrontend('biaya')?>">
									</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	require_once 'listjs.php';
 ?>
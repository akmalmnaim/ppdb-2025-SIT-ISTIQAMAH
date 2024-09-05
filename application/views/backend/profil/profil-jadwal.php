<?php if(isset($jadwal)) { ?>
	<?php
	if($jadwal['is_perlu'] == 0): ?>
		<div class="card">
			<div class="card-header"></div>
			<div class="card-body">
				<h2>Pendaftar ini tidak diperlukan wawancara dan tes.</h2>
			</div>
		</div>
	<?php endif;
	if($jadwal['is_perlu'] == 1): ?>
		<div class="card">
			<div class="card-header text-uppercase bg-light"><i class="ph-calendar"></i> Jadwal Wawancara dan Tes</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<div class="row mb-1">
							<label class="form-label col-lg-4 text-lg-end">Jadwal Wawancara :</label>
							<div class="col-lg-8 col-sm-12">
								<?= tanggal_lengkap($jadwal['tglwawancara']);?>
							</div>
						</div>
						<div class="row mb-3">
							<label class="form-label col-lg-4 text-lg-end">Waktu Wawancara :</label>
							<div class="col-lg-8 col-sm-12">
								<?= $jadwal['wktwawancara'];?> WITA
							</div>
						</div>
						<div class="row border-top mb-3"></div>
						<div class="row mb-1">
							<label class="form-label col-lg-4 text-lg-end">Jadwal Tes :</label>
							<div class="col-lg-8 col-sm-12">
								<?= tanggal_lengkap($jadwal['tglujian']);?>
							</div>
						</div>
						<div class="row mb-1">
							<label class="form-label col-lg-4 text-lg-end">Waktu Tes :</label>
							<div class="col-lg-8 col-sm-12">
								<?= $jadwal['wktujian'];?> WITA
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif;
	if($jadwal['is_perlu'] == 2): ?>
		<div class="card">
			<div class="card-header">
				<i class="ph-info me-2"></i>
				Informasi
			</div>
			<div class="card-body">
				<h2>Jadwal wawancara dan tes belum di publish.</h2>
			</div>
		</div>
	<?php endif;?>



<?php } else { ?>
	
	<div class="card">
		<div class="card-header">
			<i class="ph-info me-2"></i>
			Informasi
		</div>
		<div class="card-body">
			<h2>Jadwal Wawancara dan Tes belum ada.</h2>
		</div>
	</div>

<?php }
?>
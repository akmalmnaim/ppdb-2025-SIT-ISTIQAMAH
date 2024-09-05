

<div class="row">
	<div class="card">
		<div class="col-xl-12 col-xxl-12">
			<div class="card-header">
				<h4 class="fs-20 mb-0 text-uppercase text-muted">
					<i class="fa fa-calendar me-2"></i>
					Jadwal Wawancara dan Ujian
				</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12 border-start border-end border-top border-bottom">
						<!-- <div class="card-header text-uppercase">Jadwal Wawancara</div> -->
						<div class="card-body">
							<form class="wawancara">
								<legend class="fs-16 text-uppercase border-bottom fw-bold text-muted">Wawancara</legend>
								<div class="row mb-3">
									<label class="col-4 text-end">Tanggal Wawancara : </label>
									<div class="col-8">
										<input type="date" name="tgl_w" class="form-control tgl_w" value="<?php if(!$jadwal =='') { echo $jadwal['tglwawancara']; }; ?>">
										<input type="hidden" name="idcalon" value="<?= $idcalon?>">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-4 text-end">Waktu Wawancara :</label>
									<div class="col-3">
										<input type="time" class="form-control" name="wkt_w" value="<?php if(!$jadwal =='') { echo $jadwal['wktwawancara']; }; ?>">
									</div>
									<label class="col-1"></label>
								</div>
								<legend class="fs-16 text-uppercase border-bottom fw-bold text-muted">Ujian</legend>
								<div class="row mb-3">
									<label class="col-4 text-end">Tanggal Ujian :</label>
									<div class="col-8">
										<input type="date" name="tgl_u" class="form-control" value="<?php if(!$jadwal =='') { echo $jadwal['tglujian']; }; ?>">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-4 text-end">Waktu Ujian :</label>
									<div class="col-3">
										<input type="time" class="form-control" name="wkt_u" value="<?php if(!$jadwal =='') { echo $jadwal['wktujian']; }; ?>">
									</div>
									<label class="col-1"></label>
								</div>
								<div class="row mb-3">
									<label class="col-5 text-end">Terakhir Diperbarui :</label>
									<label class="col-7 text-primary"><?php if(!$jadwal =='') { echo $jadwal['ts']; }; ?></label>
								</div>
								<div class="mb-3 mb-0">
									<label class="col-5 text-end">Perlu Wawancara dan Ujian : &emsp;</label>
									<?php
									if($jadwal !='')
									{
										if($jadwal['is_perlu']==1)
											{ ?>
												<label class="radio-inline me-3"><input type="radio" name="is_perlu" class="form-check-input" value="1" checked> Perlu</label>
												<label class="radio-inline me-3"><input type="radio" name="is_perlu" class="form-check-input" value="0"> Tidak Perlu </label>
											<?php } else { ?>
												<label class="radio-inline me-3"><input type="radio" name="is_perlu" class="form-check-input" value="1"> Perlu</label>
												<label class="radio-inline me-3"><input type="radio" name="is_perlu" class="form-check-input" value="0" checked> Tidak Perlu </label>
											<?php }
										} else {
											?>
											<label class="radio-inline me-3"><input type="radio" name="is_perlu" class="form-check-input" value="1" checked> Perlu</label>
												<label class="radio-inline me-3"><input type="radio" name="is_perlu" class="form-check-input" value="0"> Tidak Perlu </label>
											<?php
										}
										?>

									</div>
									<div class="card-footer text-center">
										<button type="button" onclick="simpanwaktu()" class="btn btn-outline-success">Simpan Jadwal</button>
									</div>
								</form>
							</div>
						</div>				
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function simpanwaktu()
		{
			let form = $('.wawancara').serialize();
			$.ajax({
				type: "POST",
				url: "dashboard/simpanwawancara",
				data: form+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
				success: function(response) {
					if(response > 0)
						alert('Jadwal berhasil disimpan.');
				},
				error: function(xhr, status, error) {
					console.error("POST request failed:", error);
				}
			});

		}
	</script>
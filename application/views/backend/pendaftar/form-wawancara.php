<div class="content py-0 px-0 mx-0 my-0">
	<div class="card border-bottom border-top border-start border-end">
		<div class="card-header border-bottom text-uppercase text-center bg-light">
			<?= $title; ?>
		</div>
		<form class="form-wawancara">
			<div class="card-body">
				<legend class="border-bottom">Wawancara Orang Tua</legend>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Tanggal Wawancara</label>
					<div class="col-sm-8">
						<input type="date" name="tw" class="form-control" value="<?= $tw; ?>" >
						<input type="hidden" name="replid" class="form-control" value="<?= $replid; ?>">
						<input type="hidden" name="idcalon" class="form-control" value="<?= $idcalon; ?>">
						<div class="form-text text-muted msg_nama"></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Waktu Wawancara</label>
					<div class="col-sm-8">
						<input type="time" name="ww" class="form-control" value="<?= $ww; ?>">
						<div class="form-text text-muted msg_nama"></div>
					</div>
				</div>
				<legend class="border-bottom">Tes Calon Peserta Didik</legend>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end mt-3">Tanggal Tes</label>
					<div class="col-sm-8 mt-3">
						<input type="date" name="tt" class="form-control" value="<?= $tt; ?>">
						<div class="form-text text-muted msg_nama"></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Waktu Tes</label>
					<div class="col-sm-8">
						<input type="time" name="wt" class="form-control" value="<?= $wt; ?>">
						<div class="form-text text-muted msg_nama"></div>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-4 col-form-label text-sm-end">Status</label>
					<div class="col-sm-8">
						<select class="form-select" name="is_perlu">
							<option value="0">Tidak Perlu Tes dan Wawancara</option>
							<option value="1">Perlu Tes dan Wawancara</option>
							<option value="2">Pending Publish Jadwal</option>
						</select>
					</div>
				</div>			
			</div>
			</form>
				<div class="card-footer text-center">
					<button class="btn btn-success" onclick="simpanproses()"><i class="ph-windows-logo me-2"></i>Simpan</button>
				</div>
			
		</div>
	</div>

	<script type="text/javascript">
		function simpanproses()
		{
			let form = $('.form-wawancara').serialize();
			$.ajax({
				type : 'POST',
				url : '<?= base_url("pendaftar/simpan")?>',
				data : form,
				dataType : 'JSON',
				success: function(response) {
					if(response.sukses > 0)
					{
						opener.cari(0);
						window.close();
					}				
				}
			});
		}
	</script>
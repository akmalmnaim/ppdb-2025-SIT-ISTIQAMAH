<div class="content py-0 px-0 mx-0 my-0">
	<div class="card border-bottom border-top border-start border-end">
		<div class="card-header border-bottom text-uppercase text-center bg-light">
			<?= $title; ?>
		</div>
		<form class="form-wawancara">
			<div class="card-body">
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Hasil Wawancara</label>
					<div class="col-sm-8">
						<input type="file" name="hslwawancara" id="wawancara" class="form-control" accept=".pdf" onchange="uploadfile(`wawancara`)" >
						<input type="hidden" name="old_w" class="form-control" value="<?= $old_w; ?>">
<!-- 						<input type="hidden" name="replid" class="form-control" value="<?= $replid; ?>"> -->
						<input type="hidden" name="idcalon" class="form-control" value="<?= $idcalon; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Hasil Tes</label>
					<div class="col-sm-8">
						<input type="hidden" name="old_t" class="form-control" value="<?= $old_t; ?>">
						<input type="file" name="hslwawancara" id="tes" class="form-control" accept=".pdf" onchange="uploadfile(`tes`)" >
						<div class="form-text text-muted msg_nama"></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Hasil Psikotes</label>
					<div class="col-sm-8">
						<input type="hidden" name="old_p" class="form-control" value="<?= $old_p; ?>">
						<input type="file" name="hslwawancara" id="psikotes" class="form-control" accept=".pdf" onchange="uploadfile(`psikotes`)">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Keterangan</label>
					<div class="col-sm-8">
						<textarea name="keterangan" class="form-control" rows="5"><?= $keterangan; ?></textarea>
					</div>
				</div>	
			</div>
			</form>
				<div class="card-footer text-center">
					<button class="btn btn-success" onclick="simpan()"><i class="ph-windows-logo me-2"></i>Simpan</button>
				</div>
			
		</div>
	</div>

<script type="text/javascript">
	function uploadfile(upload)
	{ 
		var fileInput = document.getElementById(upload);
		var file = fileInput.files[0];

		if (file) {
			var formData = new FormData();
			formData.append('image', file);
			formData.append('petunjuk', upload);
			formData.append('idcalon', $('[name="idcalon"]').val());
			formData.append('old_w', $('[name="old_w"]').val());
			formData.append('old_t', $('[name="old_t"]').val());
			formData.append('old_p', $('[name="old_p"]').val());
			formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			$.ajax({
				url: '<?=base_url()?>pendaftar/uploadhasil/', 
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'JSON',
				async:false,
				success: function(response) {
					switch(upload)
					{
						case 'psikotes':
							$('[name="old_p"]').val(response.success);
							break;
						case 'wawancara':
							$('[name="old_w"]').val(response.success);
							break;
						case 'tes':
							$('[name="old_t"]').val(response.success);
							break;
						default:
							break;
					}
				},
				error: function(xhr, status, error) {
					console.error('Ajax Error:', status, error);
				}
			});
		} else {
			alert('file belum dipilih');
		}
	}

	function simpan()
	{
		let keterangan = $('[name="keterangan"]').val();
		let idcalon = $('[name="idcalon"]').val();
		 $.ajax({
                type: 'POST',
                url: '<?=base_url()?>pendaftar/simpanketerangan',
                data: 'idcalon='+idcalon+'&keterangan='+keterangan+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
                success: function(response) {
                   opener.cari(0)
                   window.close();
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengirim permintaan AJAX');
                }
            });
	}
</script>
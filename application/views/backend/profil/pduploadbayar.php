<div class="card">
	<div class="card-header" style="background-image: url(<?= base_url(); ?>assets/backend/assets/images/backgrounds/panel_bg.png); background-size: contain;">
		<i class="ph-upload me-2"></i>
		Unggah Slip Pembayaran PPDB
	</div>
	<div class="card-body">
		<div class="row">
			<p>Untuk dapat melanjutkan mengisi profil biodata pendaftar dan lainnya silahkan unggah (slip/screen capture) atau anda dapat menghubungi langsung kami di <a href="https://wa.me/6281298781997" class="text-muted fw-bold"> <i class="ph-whatsapp-logo ms-2 me-2 text-success fw-semibold"></i>081298781997 </a></p>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="card-body">
					<div class="row">
						<div class="col-md-9 col-sm-8 col-7">
							<input type="file" class="form-control" id="slip" name="slip" accept=".jpg,.jpeg,.png,.pdf">
							<input type="hidden" class="form-control" name="replid" value="<?= $info['replid']; ?>">
						</div>
						<div class="col-md-3 col-sm-4 col-5">
							<button type="button" class="btn btn-outline-success" onclick="slipupload()">
								<i class="ph-upload me-2"></i> Unggah
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="fileNotSelectedModal" tabindex="-1" aria-labelledby="fileNotSelectedModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fileNotSelectedModalLabel">Error</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				File belum dipilih
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="uploadSuccessModal" tabindex="-1" aria-labelledby="uploadSuccessModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="uploadSuccessModalLabel">Success</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Slip pembayaran berhasil diunggah. Kami akan mengecek, kemudian akan memberikan informasi lewat email dan nomor WA yang sudah terdaftar. Maksimal dalam 2 hari kerja.

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="uploadErrorModal" tabindex="-1" aria-labelledby="uploadErrorModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="uploadErrorModalLabel">Error</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Error uploading slip.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function slipupload() {
		var fileInput = document.getElementById('slip');
		var file = fileInput.files[0];
		var replid = $('[name="replid"]').val();

		if (file) {
			var formData = new FormData();
			formData.append('image', file);
			formData.append('replid', replid);
			formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			$.ajax({
				url: 'dashboard/uploadslip/',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'JSON',
				async: false,
				success: function(response) {
					if (response.success == true) {
						$('#uploadSuccessModal').modal('show');
					}
				},
				error: function() {
					$('#uploadErrorModal').modal('show');
				}
			});
		} else {
			$('#fileNotSelectedModal').modal('show');
		}
	}
</script>
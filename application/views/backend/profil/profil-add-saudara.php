<div class="content py-0 px-0 mx-0 my-0">
	<div class="card">
		<div class="card-header bg-light">
			<h5 class="mb-0 text-center">Data Saudara</h5>
		</div>
		<form class="form-saudara">
			<div class="card-body">
				<div class="row mb-3">
					<label class="col-lg-4 col-form-label">Nama Saudara:</label>
					<div class="col-lg-8">
						<input type="text" name="nama" class="form-control" value="<?= $nama; ?>" required>
						<input type="hidden" name="replid" value="<?= $replid; ?>">
						<input type="hidden" name="idcalon" value="<?= $idcalon; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-lg-4 col-form-label">Masih Sekolah:</label>
					<div class="col-lg-8">
						<select class="form-select" name="is_sekolah">
							<option value="0" <?= $masih == '0' ? 'selected' : ''; ?>>TIDAK</option>
							<option value="1" <?= $masih == '1' ? 'selected' : ''; ?>>IYA</option>
						</select>
						<div class="form-text">Jika iya, isi nama sekolah dan kelas dibawahnya</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-lg-4 col-form-label">Nama Sekolah:</label>
					<div class="col-lg-8">
						<input type="text" name="namasekolah" class="form-control" value="<?= $namasek; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-lg-4 col-form-label">Kelas:</label>
					<div class="col-lg-8">
						<input type="text" name="kelassekolah" class="form-control" value="<?= $kls; ?>">
					</div>
				</div>
			</div>
			<div class="card-footer text-end">
				<button type="button" class="btn btn-primary" onclick="simpansaudara()">
					<i class="ph-floppy-disk me-2"></i>
					Simpan
				</button>
			</div>
		</form>
		<div class="msg_error text-danger mt-2"></div>
	</div>
</div>

<script type="text/javascript">
	function simpansaudara() {
		let form = $('.form-saudara').serialize();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("dashboard/saudarasimpan") ?>',
			data: form,
			dataType: 'JSON',
			success: function(response) {
				if (response.sukses > 0) {
					opener.list();
					window.close();
				} else if (response.gagal) {
					$('.msg_error').html(response.gagal);
				}
			}
		});
	}
</script>
<div class="row mt-3">
	<div class="col-lg-4">
		<div class="mb-3">
			<label class="form-label">Golongan Darah:</label>
			<select class="form-select" name="golongandarah">
				<option value="" <?php if ($profil['golongandarah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Belum Ada</option>
				<option value="A" <?php if ($profil['golongandarah'] == 'A') {
										echo 'selected';
									} else {
										echo '';
									} ?>>A</option>
				<option value="B" <?php if ($profil['golongandarah'] == 'B') {
										echo 'selected';
									} else {
										echo '';
									} ?>>B</option>
				<option value="AB" <?php if ($profil['golongandarah'] == 'AB') {
										echo 'selected';
									} else {
										echo '';
									} ?>>AB</option>
				<option value="O" <?php if ($profil['golongandarah'] == 'O') {
										echo 'selected';
									} else {
										echo '';
									} ?>>O</option>
			</select>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="mb-3">
			<label class="form-label">Berat Badan:</label>
			<div class="form-control-feedback form-control-feedback-end">
				<input type="text" name="beratbadan" class="form-control" value="<?= $profil['bb'] ?>">
				<div class="form-control-feedback-icon form-control-feedback-icon-lg">
					kg
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="mb-3">
			<label class="form-label">Tinggi Badan:</label>
			<div class="form-control-feedback form-control-feedback-end">
				<input type="text" name="tinggibadan" class="form-control" value="<?= $profil['tb'] ?>">
				<div class="form-control-feedback-icon form-control-feedback-icon-lg">
					cm
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Kelainan Jasmani:</label>
			<textarea class="form-control" name="kelainanjasmani"><?= $profil['kelainanjasmani'] ?></textarea>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Riwayat Penyakit:</label>
			<textarea class="form-control" name="riwayatsakit"><?= $profil['riwayatsakit'] ?></textarea>
		</div>
	</div>

	<div class="mb-b-3 text-center">
		<button type="button" class="btn btn-sm btn-info" onclick="simpan4()">
			<i class="ph-floppy-disk me-2"></i>
			Simpan
		</button>
		<div id="alert-container-4"></div>

	</div>
</div>

<script type="text/javascript">
	function simpan4() {
		$('.is-invalid').removeClass('is-invalid');

		let isValid = true;

		const requiredFields = [
			'golongandarah', 'beratbadan', 'tinggibadan', 'kelainanjasmani', 'riwayatsakit'
		];

		requiredFields.forEach(field => {
			if (!$(`[name="${field}"]`).val()) {
				$(`[name="${field}"]`).addClass('is-invalid');
				isValid = false;
			}
		});

		if (!isValid) {
			$('#alert-container-4').html(`
		<div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
			Mohon lengkapi semua field yang wajib diisi.
		</div>
	`);
			return;
		}

		let data = {
			replid: $('[name="replid"]').val(),
			golongandarah: $('[name="golongandarah"]').val(),
			bb: $('[name="beratbadan"]').val(),
			tb: $('[name="tinggibadan"]').val(),
			kelainanjasmani: $('[name="kelainanjasmani"]').val(),
			riwayatsakit: $('[name="riwayatsakit"]').val(),
		};
		$.ajax({
			type: "POST",
			url: "<?php base_url() ?>dashboard/simpan4",
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-4').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
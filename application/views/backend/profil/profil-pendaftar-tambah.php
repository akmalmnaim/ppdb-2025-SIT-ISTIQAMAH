<div class="row mt-3">
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Kesenian:</label>
			<textarea class="form-control" name="seni"><?= $profil['seni']; ?></textarea>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Olahraga:</label>
			<textarea class="form-control" name="olahraga"><?= $profil['olahraga']; ?></textarea>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Organisasi:</label>
			<textarea class="form-control" name="organisasi"><?= $profil['organisasi']; ?></textarea>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Hobi:</label>
			<textarea class="form-control" name="hobi"><?= $profil['hobi']; ?></textarea>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Cita-cita:</label>
			<textarea class="form-control" name="cita"><?= $profil['cita']; ?></textarea>
		</div>
	</div>

</div>
<div class="mb-b-3 text-center">
	<button type="button" class="btn btn-sm btn-info" onclick="simpan9()">
		<i class="ph-floppy-disk me-2"></i>
		Simpan
	</button>
	<div id="alert-container-9"></div>
</div>

<script type="text/javascript">
	function simpan9() {
		let isValid = true;

		const requiredFields = ['seni', 'olahraga', 'organisasi', 'hobi', 'cita'];
		requiredFields.forEach(field => {
			if (!$(`[name="${field}"]`).val()) {
				$(`[name="${field}"]`).addClass('is-invalid');
				isValid = false;
			} else {
				$(`[name="${field}"]`).removeClass('is-invalid');
			}
		});
		if (!isValid) {
			$('#alert-container-9').html(`
	<div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
	  Mohon lengkapi semua field yang wajib diisi.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
  `);

			return;
		}
		let data = {
			replid: $('[name="replid"]').val(),
			seni: $('[name="seni"]').val(),
			olahraga: $('[name="olahraga"]').val(),
			organisasi: $('[name="organisasi"]').val(),
			hobi: $('[name="hobi"]').val(),
			cita: $('[name="cita"]').val(),
		};
		$.ajax({
			type: 'POST',
			url: '<?php base_url() ?>dashboard/simpan9',
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-9').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
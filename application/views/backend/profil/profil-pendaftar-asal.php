<div class="row mt-3">
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Lulusan Sekolah Sebelumnya:</label>
			<input type="text" name="sekolahasal" class="form-control required bg-light text-uppercase" value="<?= $profil['asal_sekolah']; ?>">
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Lama Belajar:</label>
			<input type="text" name="lamabelajar" class="form-control required bg-light text-uppercase" value="<?= $profil['lamabelajar']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nomer Ijazah:</label>
			<input type="text" name="nomorijazah" class="form-control" value="<?= $profil['noijazah']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Tanggal Ijazah:</label>
			<?php
			if ($profil['tglijazah'] == '0000-00-00' || $profil['tglijazah'] == '') {
				$tglijazah = '';
			} else {
				$tglijazah = $profil['tglijazah'];
			}
			?>
			<input type="date" name="tanggalijazah" class="form-control" value="<?= $tglijazah; ?>">
		</div>
	</div>
	<div class="text-center mb-3">
		<small class="text-muted">Jika Ananda belum memiliki ijazah, maka langsung tekan tombol Simpan.</small>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Pindahan Sekolah Sebelumnya::</label>
			<input type="text" name="sekolahsebelumnya" class="form-control" value="<?= $profil['sekolahsebelumnya']; ?>">
		</div>
	</div>
	<div class="text-center mb-3">
		<small class="text-muted">Abaikan isian ini jika ananda bukan siswa pindahan.</small>
	</div>
</div>

<div class="mb-b-3 text-center">
	<button type="button" class="btn btn-sm btn-info" onclick="simpan3()">
		<i class="ph-floppy-disk me-2"></i>
		Simpan
	</button>
	<div id="alert-container-3"></div>
</div>
<script type="text/javascript">
	function simpan3() {
		var currentDate = new Date();
		var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate();

		if (!$('[name="nomorijazah"]').val()) {
			$('[name="nomorijazah"]').val('-');
		}

		if (!$('[name="tanggalijazah"]').val()) {
			$('[name="tanggalijazah"]').val(formattedDate);
		}

		let data = {
			replid: $('[name="replid"]').val(),
			asal: $('[name="sekolahasal"]').val(),
			noijazah: $('[name="nomorijazah"]').val(),
			tglijazah: $('[name="tanggalijazah"]').val(),
			lamabelajar: $('[name="lamabelajar"]').val(),
			sekolahsebelumnya: $('[name="sekolahsebelumnya"]').val(),
		};
		$.ajax({
			type: "POST",
			url: "<?php base_url() ?>dashboard/simpan3",
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-3').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
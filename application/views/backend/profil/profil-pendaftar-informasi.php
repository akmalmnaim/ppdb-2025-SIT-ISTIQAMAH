<div class="row mt-3">
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Proses Penerimaan:</label>
			<input type="text" name="name" class="form-control text-uppercase fw-bold bg-light" value="<?= $proses; ?>" readonly>
			<input type="hidden" name="replid" class="form-control" value="<?= $profil['replid']; ?>">
		</div>
	</div>

	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">No. Pendaftaran:</label>
			<input type="text" name="name" class="form-control text-uppercase fw-bold bg-light" value="<?= $profil['nopendaftaran'] ?>" readonly>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Mendaftar di:</label>
			<select name="departemen" class="form-select" id="departemen" required>
				<option value="">Pilih Departemen</option>
				<option value="sdit" <?= ($profil['departemen'] == 'sdit') ? 'selected' : ''; ?>>SDIT</option>
				<option value="smpit" <?= $profil['departemen'] == 'smpit' ? 'selected' : ''; ?>>SMPIT</option>
				<option value="smait" <?= $profil['departemen'] == 'smait' ? 'selected' : ''; ?>>SMAIT</option>
			</select>
			<div class="invalid-feedback">Silakan pilih departemen.</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Status Mendaftar:</label>
			<select name="is_baru" class="form-select" id="is_baru" required>
				<option value="">Pilih Status</option>
				<option value="0" <?= ($profil['is_baru'] == 0) ? 'selected' : ''; ?>>Calon Peserta Didik Baru</option>
				<option value="1" <?= $profil['is_baru'] == 1 ? 'selected' : ''; ?>>Calon Peserta Didik Pindahan</option>
			</select>
			<div class="invalid-feedback">Silakan pilih status mendaftar.</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Masuk Di Kelas:</label>
			<select class="form-select" name="kelas" id="kelas" required>
				<option value="">Pilih Kelas</option>
				<!-- Options will be dynamically populated by JavaScript -->
			</select>
			<div class="invalid-feedback">Silakan pilih kelas.</div>
		</div>
	</div>

	<div class="col-lg-6" id="alasan_pindah_container" style="display: none;">
		<div class="mb-3">
			<label class="form-label">Alasan Pindah:</label>
			<textarea class="form-control" name="alasan_pindah" id="alasan_pindah" rows="3"><?= $profil['alasan_pindah']; ?></textarea>
			<div class="invalid-feedback">Silakan isi alasan pindah.</div>
		</div>
	</div>
</div>



<div class="mb-b-3 text-center">
	<button type="button" class="btn btn-sm btn-info smp_1" onclick="simpan1()" id="simpanBtn">
		<i class="ph-floppy-disk me-2"></i>
		Simpan
	</button>
	<div id="alert-container-1"></div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
		$('#is_alumni').change(function() {
			if ($(this).is(':checked')) {
				$('#alumni_upload_container').show();
				$('#alumni_upload').prop('required', true);
			} else {
				$('#alumni_upload_container').hide();
				$('#alumni_upload').prop('required', false);
			}
		});
	});

	function updateKelasOptions() {
		var departemen = $('#departemen').val();
		var kelasSelect = $('#kelas');
		kelasSelect.empty();
		kelasSelect.append($('<option>', {
			value: '',
			text: 'Pilih Kelas'
		}));

		if (departemen === 'sdit') {
			for (var i = 1; i <= 6; i++) {
				kelasSelect.append($('<option>', {
					value: i,
					text: 'Kelas ' + i
				}));
			}
		} else if (departemen === 'smpit') {
			for (var i = 7; i <= 9; i++) {
				kelasSelect.append($('<option>', {
					value: i,
					text: 'Kelas ' + i
				}));
			}
		} else if (departemen === 'smait') {
			for (var i = 10; i <= 12; i++) {
				kelasSelect.append($('<option>', {
					value: i,
					text: 'Kelas ' + i
				}));
			}
		}

		// Set the selected option based on the profile data or default to the first option
		var selectedKelas = '<?= isset($profil['kelas']) ? $profil['kelas'] : '' ?>';
		if (selectedKelas && kelasSelect.find('option[value="' + selectedKelas + '"]').length > 0) {
			kelasSelect.val(selectedKelas);
		} else {
			kelasSelect.val('');
		}
	}

	$(document).ready(function() {
		$('#departemen').change(updateKelasOptions);
		updateKelasOptions(); // Call once on page load

		$('#is_baru').change(function() {
			if ($(this).val() == '1') {
				$('#alasan_pindah_container').show();
				$('#alasan_pindah').prop('required', true);
			} else {
				$('#alasan_pindah_container').hide();
				$('#alasan_pindah').prop('required', false);
			}
		});

		// Trigger change event on page load to set initial state
		$('#is_baru').trigger('change');
	});

	function simpan1() {

		// Reset previous error states
		$('.is-invalid').removeClass('is-invalid');

		let isValid = true;

		if (!$('#departemen').val()) {
			$('#departemen').addClass('is-invalid');
			isValid = false;
		}

		if (!$('#is_baru').val()) {
			$('#is_baru').addClass('is-invalid');
			isValid = false;
		}

		if (!$('#kelas').val()) {
			$('#kelas').addClass('is-invalid');
			isValid = false;
		}

		if ($('#is_baru').val() == '1' && !$('#alasan_pindah').val()) {
			$('#alasan_pindah').addClass('is-invalid');
			isValid = false;
		}

		if (!isValid) {
			$('#alert-container-1').html(`
				<div class="alert alert-danger border-0 alert-dismissible mt-3 fade show">
					Mohon lengkapi semua field yang wajib diisi.
					
				</div>
			`);
			return;
		}

		let data = {
			replid: $('[name="replid"]').val(),
			departemen: $('[name="departemen"]').val(),
			is_baru: $('[name="is_baru"]').val(),
			kelas: $('[name="kelas"]').val(),
			alasan_pindah: $('[name="alasan_pindah"]').val()
		};
		$.ajax({
			type: "POST",
			url: "<?php base_url() ?>dashboard/simpan1",
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-1').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show text-center">
    Data berhasil disimpan.
</div>
					`);
				}
			}
		});
	}
</script>
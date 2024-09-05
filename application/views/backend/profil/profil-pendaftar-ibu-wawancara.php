<legend class="border-bottom mt-3 mb-3">
	<h6 class="title text-uppercase">Data Tambahan ibu</h6>
</legend>
<div class="row mt-3">
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Status Rumah:</label>
			<select class="form-select" name="statusrumahibu">
				<option value="" <?php if ($profil['statusrumahibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Milik Sendiri" <?php if ($profil['statusrumahibu'] == 'Milik Sendiri') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Milik Sendiri</option>
				<option value="Kontrak/Sewa" <?php if ($profil['statusrumahibu'] == 'Kontarak/Sewa') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Kontrak/Sewa</option>
				<option value="Rumah Dinas" <?php if ($profil['statusrumahibu'] == 'Rumah Dinas') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Rumah Dinas</option>
				<option value="Lainnya" <?php if ($profil['statusrumahibu'] == 'Lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Pernah haji/Umrah</label>
			<input type="text" class="form-control" name="jumlahhajiibu" value="<?= $profil['jumlahhajiibu'] ?>" placeholder="Jumlah Haji/Umrah yang dikerjakan" required>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Sholat di:</label>
			<select class="form-select" name="sholatdiibu" required>
				<option value="" <?php if ($profil['sholatdiibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Masjid" <?php if ($profil['sholatdiibu'] == 'Masjid') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Masjid</option>
				<option value="Musholla" <?php if ($profil['sholatdiibu'] == 'Musholla') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Musholla</option>
				<option value="Rumah" <?php if ($profil['sholatdiibu'] == 'Rumah') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Rumah</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Organisasi:</label>
			<select class="form-select" name="organisasiibu" required>
				<option value="" <?php if ($profil['organisasiibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Organisasi Keislaman" <?php if ($profil['organisasiibu'] == 'Organisasi Keislaman') {
															echo 'selected';
														} else {
															echo '';
														} ?>>Organisasi Keislaman</option>
				<option value="Majelis Taklim" <?php if ($profil['organisasiibu'] == 'Majelis Taklim') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Majelis Taklim</option>
				<option value="Masjid" <?php if ($profil['organisasiibu'] == 'Masjid') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Masjid</option>
				<option value="Lainnya" <?php if ($profil['organisasiibu'] == 'Lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Bacaan Islam:</label>
			<select class="form-select" name="bacaanibu" required>
				<option value="" <?php if ($profil['bacaanibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Buku" <?php if ($profil['bacaanibu'] == 'Buku') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Buku</option>
				<option value="Majalah" <?php if ($profil['bacaanibu'] == 'Majalah') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Majalah</option>
				<option value="Surat Kabar" <?php if ($profil['bacaanibu'] == 'Surat Kabar') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Surat Kabar</option>
				<option value="Internet" <?php if ($profil['bacaanibu'] == 'Internet') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Internet</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Kursus Peningkatan Alquran Beserta Artinya:</label>
			<select class="form-select" name="kursusmauibu" required>
				<option value="" <?php if ($profil['kursusmauibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Bersedia" <?php if ($profil['kursusmauibu'] == 'Bersedia') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Bersedia</option>
				<option value="Tidak Bersedia" <?php if ($profil['kursusmauibu'] == 'Tidak Bersedia') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Tidak Bersedia</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Status Membaca Alquran</label>
			<select class="form-select" name="statusbacaquranibu" required>
				<option value="" <?php if ($profil['statusbacaquranibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Lancar Dengan Tajwid" <?php if ($profil['statusbacaquranibu'] == 'Lancar Dengan Tajwid') {
															echo 'selected';
														} else {
															echo '';
														} ?>>Lancar Dengan Tajwid</option>
				<option value="Lancar Tanpa Tajwid" <?php if ($profil['statusbacaquranibu'] == 'Lancar Tanpa Tajwid') {
														echo 'selected';
													} else {
														echo '';
													} ?>>Lancar Tanpa Tajwid</option>
				<option value="Biasa" <?php if ($profil['statusbacaquranibu'] == 'Biasa') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Biasa</option>
				<option value="Terbata-bata" <?php if ($profil['statusbacaquranibu'] == 'Terbata-bata') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Terbata-bata</option>
				<option value="Belum Lancar" <?php if ($profil['statusbacaquranibu'] == 'Belum Lancar') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Belum Lancar</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Pendidikan Agama Yang Ditempuh:</label>
			<select class="form-select" name="pendidikanagamaibu" required>
				<option value="" <?php if ($profil['pendidikanagamaibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Madrasah" <?php if ($profil['pendidikanagamaibu'] == 'Madrasah') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Madrasah</option>
				<option value="Masjid" <?php if ($profil['pendidikanagamaibu'] == 'Masjid') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Masjid</option>
				<option value="Lainnya" <?php if ($profil['pendidikanagamaibu'] == 'Lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Bahasa Asing Yang Dikuasai:</label>
			<input type="text" class="form-control" name="bahasaasingibu" value="<?= $profil['bahasaasingibu'] ?>" placeholder="Boleh lebih dari satu">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Asal Daerah / Suku:</label>
			<input type="text" class="form-control" name="asaldaerahibu" value="<?= $profil['asaldaerahibu'] ?>">
		</div>
	</div>

	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jarak dari rumah ke tempat kerja:</label>
			<div class="form-control-feedback form-control-feedback-end">
				<input type="text" name="jaraktempatkerjaibu" class="form-control" value="<?= $profil['jaraktempatkerjaibu'] ?>">
				<div class="form-control-feedback-icon form-control-feedback-icon-lg">
					km
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Moda Transportasi Ke Kantor:</label>
			<select class="form-select" name="modakerjaibu" required>
				<option value="" <?php if ($profil['modakerjaibu'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Berjalan Kaki" <?php if ($profil['modakerjaibu'] == 'Berjalan Kaki') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Berjalan Kaki</option>
				<option value="Kendaraan Umum" <?php if ($profil['modakerjaibu'] == 'Kendaraan Umum') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Kendaraan Umum</option>
				<option value="Kendaraan Pribadi" <?php if ($profil['modakerjaibu'] == 'Kendaraan Pribadi') {
														echo 'selected';
													} else {
														echo '';
													} ?>>Kendaraan Pribadi</option>
			</select>
		</div>
	</div>

</div>
<div class="mb-b-3 text-center">
	<button type="button" class="btn btn-sm btn-info" onclick="simpan8()">
		<i class="ph-floppy-disk me-2"></i>
		Simpan
	</button>
	<div id="alert-container-8"></div>
</div>

<script type="text/javascript">
	function simpan8() {
		let isValid = true;

		const requiredFields = [
			'statusrumahibu', 'jumlahhajiibu', 'sholatdiibu', 'organisasiibu', 'bacaanibu',
			'kursusmauibu', 'statusbacaquranibu', 'pendidikanagamaibu', 'bahasaasingibu',
			'asaldaerahibu', 'jaraktempatkerjaibu', 'modakerjaibu',

		];

		requiredFields.forEach(field => {
			if (!$(`[name="${field}"]`).val()) {
				$(`[name="${field}"]`).addClass('is-invalid');
				isValid = false;
			} else {
				$(`[name="${field}"]`).removeClass('is-invalid');
			}
		});

		if (!isValid) {
			$('#alert-container-8').html(`
	<div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
	  Mohon lengkapi semua field yang wajib diisi.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
  `);

			return;
		}

		let data = {
			replid: $('[name="replid"]').val(),
			statusrumahibu: $('[name="statusrumahibu"]').val(),
			jumlahhajiibu: $('[name="jumlahhajiibu"]').val(),
			sholatdiibu: $('[name="sholatdiibu"]').val(),
			organisasiibu: $('[name="organisasiibu"]').val(),
			bacaanibu: $('[name="bacaanibu"]').val(),
			kursusmauibu: $('[name="kursusmauibu"]').val(),
			statusbacaquranibu: $('[name="statusbacaquranibu"]').val(),
			pendidikanagamaibu: $('[name="pendidikanagamaibu"]').val(),
			bahasaasingibu: $('[name="bahasaasingibu"]').val(),
			asaldaerahibu: $('[name="asaldaerahibu"]').val(),
			jaraktempatkerjaibu: $('[name="jaraktempatkerjaibu"]').val(),
			modakerjaibu: $('[name="modakerjaibu"]').val(),
		};
		$.ajax({
			type: 'POST',
			url: '<?php base_url() ?>dashboard/simpan8',
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-8').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
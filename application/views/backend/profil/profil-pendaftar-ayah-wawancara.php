<legend class="border-bottom mt-3 mb-3">
	<h6 class="title text-uppercase">Data Tambahan Ayah</h6>
</legend>
<div class="row mt-3">
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Status Rumah:</label>
			<select class="form-select" name="statusrumahayah" required>
				<option value="" <?php if ($profil['statusrumahayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Milik Sendiri" <?php if ($profil['statusrumahayah'] == 'Milik Sendiri') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Milik Sendiri</option>
				<option value="Kontrak/Sewa" <?php if ($profil['statusrumahayah'] == 'Kontarak/Sewa') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Kontrak/Sewa</option>
				<option value="Rumah Dinas" <?php if ($profil['statusrumahayah'] == 'Rumah Dinas') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Rumah Dinas</option>
				<option value="Lainnya" <?php if ($profil['statusrumahayah'] == 'Lainnya') {
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
			<input type="text" class="form-control" name="jumlahhajiayah" value="<?= $profil['jumlahhajiayah'] ?>" placeholder="Jumlah Haji/Umrah yang dikerjakan" required>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Sholat di:</label>
			<select class="form-select" name="sholatdiayah" required>
				<option value="" <?php if ($profil['sholatdiayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Masjid" <?php if ($profil['sholatdiayah'] == 'Masjid') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Masjid</option>
				<option value="Musholla" <?php if ($profil['sholatdiayah'] == 'Musholla') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Musholla</option>
				<option value="Rumah" <?php if ($profil['sholatdiayah'] == 'Rumah') {
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
			<select class="form-select" name="organisasiayah" required>
				<option value="" <?php if ($profil['organisasiayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Organisasi Keislaman" <?php if ($profil['organisasiayah'] == 'Organisasi Keislaman') {
															echo 'selected';
														} else {
															echo '';
														} ?>>Organisasi Keislaman</option>
				<option value="Majelis Taklim" <?php if ($profil['organisasiayah'] == 'Majelis Taklim') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Majelis Taklim</option>
				<option value="Masjid" <?php if ($profil['organisasiayah'] == 'Masjid') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Masjid</option>
				<option value="Lainnya" <?php if ($profil['organisasiayah'] == 'Lainnya') {
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
			<select class="form-select" name="bacaanayah" required>
				<option value="" <?php if ($profil['bacaanayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Buku" <?php if ($profil['bacaanayah'] == 'Buku') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Buku</option>
				<option value="Majalah" <?php if ($profil['bacaanayah'] == 'Majalah') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Majalah</option>
				<option value="Surat Kabar" <?php if ($profil['bacaanayah'] == 'Surat Kabar') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Surat Kabar</option>
				<option value="Internet" <?php if ($profil['bacaanayah'] == 'Internet') {
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
			<select class="form-select" name="kursusmauayah" required>
				<option value="" <?php if ($profil['kursusmauayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Bersedia" <?php if ($profil['kursusmauayah'] == 'Bersedia') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Bersedia</option>
				<option value="Tidak Bersedia" <?php if ($profil['kursusmauayah'] == 'Tidak Bersedia') {
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
			<select class="form-select" name="statusbacaquranayah" required>
				<option value="" <?php if ($profil['statusbacaquranayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Lancar Dengan Tajwid" <?php if ($profil['statusbacaquranayah'] == 'Lancar Dengan Tajwid') {
															echo 'selected';
														} else {
															echo '';
														} ?>>Lancar Dengan Tajwid</option>
				<option value="Lancar Tanpa Tajwid" <?php if ($profil['statusbacaquranayah'] == 'Lancar Tanpa Tajwid') {
														echo 'selected';
													} else {
														echo '';
													} ?>>Lancar Tanpa Tajwid</option>
				<option value="Biasa" <?php if ($profil['statusbacaquranayah'] == 'Biasa') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Biasa</option>
				<option value="Terbata-bata" <?php if ($profil['statusbacaquranayah'] == 'Terbata-bata') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Terbata-bata</option>
				<option value="Belum Lancar" <?php if ($profil['statusbacaquranayah'] == 'Belum Lancar') {
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
			<select class="form-select" name="pendidikanagamaayah" required>
				<option value="" <?php if ($profil['pendidikanagamaayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Madrasah" <?php if ($profil['pendidikanagamaayah'] == 'Madrasah') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Madrasah</option>
				<option value="Masjid" <?php if ($profil['pendidikanagamaayah'] == 'Masjid') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Masjid</option>
				<option value="Lainnya" <?php if ($profil['pendidikanagamaayah'] == 'Lainnya') {
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
			<input type="text" class="form-control" name="bahasaasingayah" value="<?= $profil['bahasaasingayah'] ?>" placeholder="Boleh lebih dari satu">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Asal Daerah / Suku:</label>
			<input type="text" class="form-control" name="asaldaerahayah" value="<?= $profil['asaldaerahayah'] ?>">
		</div>
	</div>

	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jarak dari rumah ke tempat kerja:</label>
			<div class="form-control-feedback form-control-feedback-end">
				<input type="text" name="jaraktempatkerjaayah" class="form-control" value="<?= $profil['jaraktempatkerjaayah'] ?>">
				<div class="form-control-feedback-icon form-control-feedback-icon-lg">
					km
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Moda Transportasi Ke Kantor:</label>
			<select class="form-select" name="modakerjaayah" required>
				<option value="" <?php if ($profil['modakerjaayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Berjalan Kaki" <?php if ($profil['modakerjaayah'] == 'Berjalan Kaki') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Berjalan Kaki</option>
				<option value="Kendaraan Umum" <?php if ($profil['modakerjaayah'] == 'Kendaraan Umum') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Kendaraan Umum</option>
				<option value="Kendaraan Pribadi" <?php if ($profil['modakerjaayah'] == 'Kendaraan Pribadi') {
														echo 'selected';
													} else {
														echo '';
													} ?>>Kendaraan Pribadi</option>
			</select>
		</div>
	</div>

</div>
<div class="mb-b-3 text-center">
	<button type="button" class="btn btn-sm btn-info" onclick="simpan7()">
		<i class="ph-floppy-disk me-2"></i>
		Simpan
	</button>
	<div id="alert-container-7"></div>
</div>

<script type="text/javascript">
	function simpan7() {
		let isValid = true;

		const requiredFields = [
			'statusrumahayah', 'jumlahhajiayah', 'sholatdiayah', 'organisasiayah', 'bacaanayah',
			'kursusmauayah', 'statusbacaquranayah', 'pendidikanagamaayah', 'bahasaasingayah',
			'asaldaerahayah', 'jaraktempatkerjaayah', 'modakerjaayah',

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
			$('#alert-container-7').html(`
	<div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
	  Mohon lengkapi semua field yang wajib diisi.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
  `);

			return;
		}

		let data = {
			replid: $('[name="replid"]').val(),
			statusrumahayah: $('[name="statusrumahayah"]').val(),
			jumlahhajiayah: $('[name="jumlahhajiayah"]').val(),
			sholatdiayah: $('[name="sholatdiayah"]').val(),
			organisasiayah: $('[name="organisasiayah"]').val(),
			bacaanayah: $('[name="bacaanayah"]').val(),
			kursusmauayah: $('[name="kursusmauayah"]').val(),
			statusbacaquranayah: $('[name="statusbacaquranayah"]').val(),
			pendidikanagamaayah: $('[name="pendidikanagamaayah"]').val(),
			bahasaasingayah: $('[name="bahasaasingayah"]').val(),
			asaldaerahayah: $('[name="asaldaerahayah"]').val(),
			jaraktempatkerjaayah: $('[name="jaraktempatkerjaayah"]').val(),
			modakerjaayah: $('[name="modakerjaayah"]').val(),
		};
		$.ajax({
			type: 'POST',
			url: '<?php base_url() ?>dashboard/simpan7',
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-7').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
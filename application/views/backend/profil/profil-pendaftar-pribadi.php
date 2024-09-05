<div class="row mt-3">
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nama Lengkap: <span class="text-danger">*</span></label>
			<input type="text" name="nama" class="form-control required bg-light text-uppercase" value="<?= $profil['nama']; ?>" readonly>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nama Panggilan:</label>
			<input type="text" name="panggilan" class="form-control" value="<?= $profil['panggilan']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nomor Induk Siswa Nasional /NISN:</label>
			<input type="text" name="nisn" class="form-control" value="<?= $profil['nisn']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nomor Induk Kependudukan /NIK:</label>
			<input type="text" name="nik" class="form-control" value="<?= $profil['nik']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jenis Kelamin:</label>
			<select class="form-select" name="kelamin" value=<? $profil['kelamin']; ?>>
				<option value="l">Laki-laki</option>
				<option value="p">Perempuan</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Tempat Lahir:</label>
			<input type="text" name="tmplahir" class="form-control bg-light" value="<?= $profil['tmplahir']; ?>" readonly>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Tanggal Lahir:</label>
			<input type="date" name="tgllahir" class="form-control bg-light" value="<?= $profil['tgllahir']; ?>" readonly>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Agama:</label>
			<input type="text" class="form-control bg-light" value="ISLAM" readonly>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Suku:</label>
			<input type="text" name="suku" class="form-control" value="<?= $profil['suku']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Kewarganegaraan:</label>
			<select class="form-select" name="warga">
				<option value="" <?php if ($profil['warga'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="wni" <?php if ($profil['warga'] == 'wni') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Warga Negara Indonesia</option>
				<option value="wna" <?php if ($profil['warga'] == 'wna') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Warga Negara Asing</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-6">
				<div class="mb-3">
					<label class="form-label">Anak Ke:</label>
					<input type="text" name="anakke" class="form-control" value="<?= $profil['anakke']; ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mb-3">
					<label class="form-label">Dari:</label>
					<input type="text" name="jumlahsaudara" class="form-control" value="<?= $profil['jumlahsaudara']; ?>">
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Status Anak :</label>
			<select class="form-select" name="statusanak">
				<option value="" <?php if ($profil['statusanak'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="kandung" <?php if ($profil['statusanak'] == 'kandung') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Anak Kandung</option>
				<option value="angkat" <?php if ($profil['statusanak'] == 'angkat') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Anak Angkat</option>
				<option value="tiri" <?php if ($profil['statusanak'] == 'tiri') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Anak Tiri</option>
				<option value="lainnya" <?php if ($profil['statusanak'] == 'lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jumlah Saudara Kandung:</label>
			<input type="text" name="jumlahkandung" class="form-control" value="<?= $profil['jumlahkandung']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jumlah Saudara Tiri:</label>
			<input type="text" name="jumlahtiri" class="form-control" value="<?= $profil['jumlahtiri']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jumlah Saudara Angkat:</label>
			<input type="text" name="jumlahangkat" class="form-control" value="<?= $profil['jumlahangkat']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Yatim/Piatu/Yatim Piatu:</label>
			<select class="form-select" name="isyatim">
				<option value="" <?php if ($profil['isyatim'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Tidak" <?php if ($profil['isyatim'] == 'Tidak') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Tidak</option>
				<option value="Yatim" <?php if ($profil['isyatim'] == 'Yatim') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Yatim</option>
				<option value="Piatu" <?php if ($profil['isyatim'] == 'Piatu') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Piatu</option>
				<option value="Yatim Piatu" <?php if ($profil['isyatim'] == 'Yatim Piatu') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Yatim Piatu</option>
			</select>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Bahasa:</label>
			<input type="text" name="bahasa" class="form-control" value="<?= $profil['bahasa']; ?>">
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Jalan / RT / No:</label>
			<textarea class="form-control" name="alamatsiswa"><?= $profil['alamatsiswa'] ?></textarea>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Kelurahan:</label>
			<textarea class="form-control" name="kelurahan"><?= $profil['kelurahan'] ?></textarea>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Kecamatan:</label>
			<textarea class="form-control" name="kecamatan"><?= $profil['kecamatan'] ?></textarea>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Kode Pos:</label>
			<input type="text" name="kodepossiswa" class="form-control" value="<?= $profil['kodepossiswa']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Jarak dari rumah ke sekolah:</label>
			<div class="form-control-feedback form-control-feedback-end">
				<input type="text" name="jarak" class="form-control" value="<?= $profil['jarak']; ?>">
				<div class="form-control-feedback-icon form-control-feedback-icon-lg">
					km
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nomer Telepon:</label>
			<input type="text" name="telponsiswa" class="form-control" value="<?= $profil['telponsiswa']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Nomer Handphone:</label>
			<input type="text" name="hpsiswa" class="form-control" value="<?= $profil['hpsiswa']; ?>">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Alamat Email: <span class="text-danger">*</span></label>
			<input type="email" name="email" class="form-control bg-light required" value="<?= $profil['emailsiswa'] ?>" readonly>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Saat Ini Tinggal Bersama:</label>
			<select class="form-select" name="tinggalbersama">
				<option value="" <?php if ($profil['tinggal'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Orang Tua" <?php if ($profil['tinggal'] == 'Orang Tua') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Orang Tua</option>
				<option value="Wali" <?php if ($profil['tinggal'] == 'Wali') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Wali</option>
				<option value="Lainnya" <?php if ($profil['tinggal'] == 'Lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Moda Transportasi Yang Digunakan:</label>
			<select class="form-select" name="moda">
				<option value="" <?php if ($profil['modatransportasi'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="Jalan Kaki" <?php if ($profil['modatransportasi'] == 'Jalan Kaki') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Jalan Kaki</option>
				<option value="Sepeda Motor" <?php if ($profil['modatransportasi'] == 'Sepeda Motor') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Sepeda Motor</option>
				<option value="Mobil Pribadi" <?php if ($profil['modatransportasi'] == 'Mobil Pribadi') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Mobil Pribadi</option>
				<option value="Mobil/Bus Antar Jemput" <?php if ($profil['modatransportasi'] == 'Mobil/Bus Antar Jemput') {
															echo 'selected';
														} else {
															echo '';
														} ?>>Mobil/Bus Antar Jemput</option>
				<option value="Angkutan Umum" <?php if ($profil['modatransportasi'] == 'Angkutan Umum') {
													echo 'selected';
												} else {
													echo '';
												} ?>>Angkutan Umum</option>
				<option value="Lainnya" <?php if ($profil['modatransportasi'] == 'Lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Unggah Foto (Ket: Foto tampak depan dengan wajah terlihat):</label>
			<input type="file" name="foto" id="foto" class="form-control" onchange="uploadfotomu()">
			<input type="hidden" name="old_foto" class="form-control" value="<?= $profil['foto'] ?>">
		</div>
	</div>

</div>
<div class="mb-b-3 text-center">
	<button type="button" class="btn btn-sm btn-info" onclick="simpan2()">
		<i class="ph-floppy-disk me-2"></i>
		Simpan
	</button>
	<div id="alert-container-2"></div>
</div>

<script type="text/javascript">
	function simpan2() {
		// Reset previous error states
		$('.is-invalid').removeClass('is-invalid');

		let isValid = true;

		const requiredFields = [
			'panggilan', 'nisn', 'nik', 'kelamin', 'suku', 'warga', 'anakke', 'jumlahsaudara',
			'statusanak', 'jumlahkandung', 'jumlahtiri', 'jumlahangkat', 'isyatim', 'bahasa', 'alamatsiswa', 'kelurahan', 'kecamatan', 'kodepossiswa',
			'jarak', 'telponsiswa', 'hpsiswa', 'email', 'tinggalbersama', 'moda', 'foto',
		];

		requiredFields.forEach(field => {
			if (!$(`[name="${field}"]`).val()) {
				$(`[name="${field}"]`).addClass('is-invalid');
				isValid = false;
			}
		});

		if (!isValid) {
			$('#alert-container-2').html(`
				<div class="alert alert-danger border-0 alert-dismissible mt-3 fade show">
					Mohon lengkapi semua field yang wajib diisi.
					<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				</div>
			`);
			return;
		} else if (isValid) {
			$('#alert-container-2').html(`
        <div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
            Data berhasil disimpan.
        </div>
    `);
		}

		let data = {
			replid: $('[name="replid"]').val(),
			panggilan: $('[name="panggilan"]').val(),
			nisn: $('[name="nisn"]').val(),
			nik: $('[name="nik"]').val(),
			kelamin: $('[name="kelamin"]').val(),
			suku: $('[name="suku"]').val(),
			warga: $('[name="warga"]').val(),
			anakke: $('[name="anakke"]').val(),
			jumlahsaudara: $('[name="jumlahsaudara"]').val(),
			statusanak: $('[name="statusanak"]').val(),
			jumlahkandung: $('[name="jumlahkandung"]').val(),
			jumlahtiri: $('[name="jumlahtiri"]').val(),
			jumlahangkat: $('[name="jumlahangkat"]').val(),
			isyatim: $('[name="isyatim"]').val(),
			bahasa: $('[name="bahasa"]').val(),
			alamatsiswa: $('[name="alamatsiswa"]').val(),
			kelurahan: $('[name="kelurahan"]').val(),
			kecamatan: $('[name="kecamatan"]').val(),
			kodepossiswa: $('[name="kodepossiswa"]').val(),
			jarak: $('[name="jarak"]').val(),
			telponsiswa: $('[name="telponsiswa"]').val(),
			hpsiswa: $('[name="hpsiswa"]').val(),
			email: $('[name="email"]').val(),
			tinggalbersama: $('[name="tinggalbersama"]').val(),
			moda: $('[name="moda"]').val(),
			foto: $('[name="foto"]').val(),

		};
		$.ajax({
			type: 'POST',
			url: '<?php base_url() ?>dashboard/simpan2',
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-2').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);

				}
			}
		});
	}

	function uploadfotomu() {
		var fileInput = document.getElementById('foto');
		var file = fileInput.files[0];
		var replid = $('[name="replid"]').val();
		var old = $('[name="old_foto"]').val();

		if (file) {
			var formData = new FormData();
			formData.append('image', file);
			formData.append('replid', replid);
			formData.append('old_foto', old);
			formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			$.ajax({
				url: '<?= base_url() ?>dashboard/upload_foto',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'JSON',
				async: false,
				success: function(response) {
					if (response.success)
						$('[name="old_foto"]').val(response.success);
				},
				error: function() {
					alert('Error');
				}
			});
		} else {
			alert('file belum dipilih');
		}
	}
</script>
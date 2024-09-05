<legend class="border-bottom mt-3 mb-3">
	<h6 class="title text-uppercase">Data wali</h6>
</legend>
<div class="row mt-3">
	<div class="row mt-3">
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nama wali:</label>
				<input type="text" class="form-control" name="namawali" value="<?= $profil['namawali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Tempat Lahir:</label>
				<input type="text" class="form-control" name="tmpwali" value="<?= $profil['tmpwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Tanggal Lahir:</label>
				<?php
				if ($profil['tgllahirwali'] == '0000-00-00' || $profil['tgllahirwali'] == '') {
					$tgllahirwali = '';
				} else {
					$tgllahirwali = $profil['tgllahirwali'];
				}
				?>
				<input type="date" class="form-control" name="tgllahirwali" value="<?= $tgllahirwali; ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Kewarganegaraan:</label>
				<select class="form-select" name="wargawali">
					<option value="" <?php if ($profil['wargawali'] == '') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Pilih</option>
					<option value="wni" <?php if ($profil['wargawali'] == 'wni') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Warga Negara Indonesia</option>
					<option value="wna" <?php if ($profil['wargawali'] == 'wna') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Warga Negara Asing</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No Telepon wali:</label>
				<input type="text" class="form-control" name="teleponwali" value="<?= $profil['teleponwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No HP wali:</label>
				<input type="text" class="form-control" name="wa_wali" value="<?= $profil['wa_wali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Pendidikan Terakhir:</label>
				<select class="form-select" name="pendidikanwali">
					<option value="" <?php if ($profil['pendidikanwali'] == '') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Pilih Pendidikan</option>
					<option value="sd" <?php if ($profil['pendidikanwali'] == 'sd') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SD</option>
					<option value="smp" <?php if ($profil['pendidikanwali'] == 'smp') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SMP / Sederajat</option>
					<option value="sma" <?php if ($profil['pendidikanwali'] == 'sma') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SMA / Sederajat</option>
					<option value="diploma" <?php if ($profil['pendidikanwali'] == 'diploma') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Diploma / Sederajat</option>
					<option value="s1" <?php if ($profil['pendidikanwali'] == 's1') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Sarjana / S1</option>
					<option value="s2" <?php if ($profil['pendidikanwali'] == 's2') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Master / S2</option>
					<option value="s3" <?php if ($profil['pendidikanwali'] == 's3') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Doktor / S3</option>
				</select>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Jurusan:</label>
				<input type="text" class="form-control" name="jurusanwali" value="<?= $profil['jurusanwali'] ?>">
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Nama Sekolah/Universitas</label>
				<input type="text" class="form-control" name="sekolahwali" value="<?= $profil['sekolahwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Pekerjaan</label>
				<input type="text" class="form-control" name="pekerjaanwali" value="<?= $profil['pekerjaanwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nama Perusahaan</label>
				<input type="text" class="form-control" name="namaperusahaanwali" value="<?= $profil['namaperusahaanwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Jabatan dan Bagian (departemen)</label>
				<input type="text" class="form-control" name="jabatanwali" value="<?= $profil['jabatanwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Alamat Perusahaan</label>
				<input type="text" class="form-control" name="alamatperusahaanwali" value="<?= $profil['pekerjaanwali'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Kota Perusahaan/Kantor wali</label>
				<input type="text" class="form-control" name="kotaperusahaanwali" value="<?= $profil['kotaperusahaanwali'] ?>">
			</div>
		</div>

		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Penghasilan</label>
				<select class="form-select" name="penghasilanwali">
					<option value="Pilih" <?php if ($profil['penghasilanwali'] == '') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Pilih Penghasilan</option>
					<option value="Kurang dari Rp.500,000" <?php if ($profil['penghasilanwali'] == 'Kurang dari Rp.500,000') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Kurang dari Rp.500,000</option>
					<option value="Rp.500,000 - Rp.999,999" <?php if ($profil['penghasilanwali'] == 'Rp.500,000 - Rp.999,999') {
																echo 'selected';
																echo '';
															} ?>>Rp.2,000,000 - Rp.4,999,999</option>
					<option value="Rp.5,000,000 - Rp.20,000,000" <?php if ($profil['penghasilanwali'] == 'Rp.5,000,000 - Rp.20,000,000') {
																		echo 'selected';
																	} else {
																		echo '';
																	} ?>>Rp.5,000,000 - Rp.20,000,000</option>
					<option value="Lebih dari Rp.20,000,000" <?php if ($profil['penghasilanwali'] == 'Lebih dari Rp.20,000,000') {
																	echo 'selected';
																} else {
																	echo '';
																} ?>>Lebih dari Rp.20,000,000</option>
					<option value="Tidak Berpenghasilan" <?php if ($profil['penghasilanwali'] == 'Tidak Berpenghasila') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Tidak Berpenghasilan</option>
				</select>
			</div>
		</div>



		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Jalan / RT / No:</label>
				<textarea class="form-control" name="alamatwali"><?= $profil['alamatwali'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kelurahan:</label>
				<textarea class="form-control" name="kelurahanwali"><?= $profil['kelurahanwali'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kecamatan:</label>
				<textarea class="form-control" name="kecamatanwali"><?= $profil['kecamatanwali'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kode Pos:</label>
				<input type="text" name="kodeposwali" class="form-control" value="<?= $profil['kodeposwali']; ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="col-lg-12">
				<div class="mb-3">
					<label class="form-label">Kota:</label>
					<input type="text" name="kodeposwali" class="form-control" value="<?= $profil['kotawali']; ?>">
				</div>
			</div>

		</div>
		<div class="mb-b-3 text-center">
			<button type="button" class="btn btn-sm btn-info" onclick="simpan6()">
				<i class="ph-floppy-disk me-2"></i>
				Simpan
			</button>
			<div id="alert-container-6"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function simpan6() {
		let isValid = true;

		const requiredFields = ['namawali'];

		requiredFields.forEach(field => {
			if (!$(`[name="${field}"]`).val()) {
				$(`[name="${field}"]`).addClass('is-invalid');
				isValid = false;
			} else {
				$(`[name="${field}"]`).removeClass('is-invalid');
			}
		});

		if (!isValid) {
			$('#alert-container-6').html(`
        <div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
            Mohon lengkapi semua field yang wajib diisi.
        </div>
    `);
			return;
		} else if (isValid) {
			$('#alert-container-6').html(`
        <div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
            Data berhasil disimpan.
        </div>
    `);
		}

		let data = {
			replid: $('[name="replid"]').val(),
			namawali: $('[name="namawali"]').val(),
			tmpwali: $('[name="tmpwali"]').val(),
			tgllahirwali: $('[name="tgllahirwali"]').val(),
			wargawali: $('[name="wargawali"]').val(),
			teleponwali: $('[name="teleponwali"]').val(),
			wa_wali: $('[name="wa_wali"]').val(),
			pendidikanwali: $('[name="pendidikanwali"]').val(),
			jurusanwali: $('[name="jurusanwali"]').val(),
			sekolahwali: $('[name="sekolahwali"]').val(),
			pekerjaanwali: $('[name="pekerjaanwali"]').val(),
			namaperusahaanwali: $('[name="namaperusahaanwali"]').val(),
			jabatanwali: $('[name="jabatanwali"]').val(),
			alamatperusahaanwali: $('[name="alamatperusahaanwali"]').val(),
			kotaperusahaanwali: $('[name="kotaperusahaanwali"]').val(),
			penghasilanwali: $('[name="penghasilanwali"]').val(),
			alamatwali: $('[name="alamatwali"]').val(),
			kelurahanwali: $('[name="kelurahanwali"]').val(),
			kecamatanwali: $('[name="kecamatanwali"]').val(),
			kodeposwali: $('[name="kodeposwali"]').val(),
			kotawali: $('[name="kotawali"]').val(),
			keteranganhidupwali: $('[name="keteranganhidupwali"]').val(),
		};
		// Submit the form data

		$.ajax({
			type: 'POST',
			url: '<?php base_url() ?>dashboard/simpan6',
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-6').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
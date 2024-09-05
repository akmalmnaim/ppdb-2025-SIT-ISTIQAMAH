<legend class="border-bottom mt-3 mb-3">
	<h6 class="title text-uppercase">Data Ayah</h6>
</legend>
<div class="row mt-3">
	<div class="col-lg-12">
		<div class="mb-3">
			<label class="form-label">Status:</label>
			<select class="form-select" name="statusayah">
				<option value="" <?php if ($profil['statusayah'] == '') {
										echo 'selected';
									} else {
										echo '';
									} ?>>Pilih</option>
				<option value="kandung" <?php if ($profil['statusayah'] == 'kandung') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Ayah Kandung</option>
				<option value="angkat" <?php if ($profil['statusayah'] == 'angkat') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Ayah Angkat</option>
				<option value="tiri" <?php if ($profil['statusayah'] == 'tiri') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Ayah Tiri</option>
				<option value="lainnya" <?php if ($profil['statusayah'] == 'lainnya') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Lainnya</option>
			</select>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nama Ayah:</label>
				<input type="text" class="form-control" name="namaayah" value="<?= $profil['namaayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Tempat Lahir:</label>
				<input type="text" class="form-control" name="tmpayah" value="<?= $profil['tmpayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Tanggal Lahir:</label>
				<?php
				if ($profil['tgllahirayah'] == '0000-00-00' || $profil['tgllahirayah'] == '') {
					$tgllahirayah = '';
				} else {
					$tgllahirayah = $profil['tgllahirayah'];
				}
				?>
				<input type="date" class="form-control" name="tgllahirayah" value="<?= $tgllahirayah; ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Kewarganegaraan:</label>
				<select class="form-select" name="wargaayah">
					<option value="" <?php if ($profil['wargaayah'] == '') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Pilih</option>
					<option value="wni" <?php if ($profil['wargaayah'] == 'wni') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Warga Negara Indonesia</option>
					<option value="wna" <?php if ($profil['wargaayah'] == 'wna') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Warga Negara Asing</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nomer Telepon:</label>
				<input type="text" name="teleponayah" class="form-control" value="<?= $profil['teleponayah']; ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No HP Ayah:</label>
				<input type="text" class="form-control" name="wa_ayah" value="<?= $profil['wa_ayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Email Ayah:</label>
				<input type="text" class="form-control" name="email_ayah" value="<?= $profil['email_ayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Pendidikan Terakhir:</label>
				<select class="form-select" name="pendidikanayah">
					<option value="" <?php if ($profil['pendidikanayah'] == '') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Pilih Pendidikan</option>
					<option value="sd" <?php if ($profil['pendidikanayah'] == 'sd') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SD</option>
					<option value="smp" <?php if ($profil['pendidikanayah'] == 'smp') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SMP / Sederajat</option>
					<option value="sma" <?php if ($profil['pendidikanayah'] == 'sma') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SMA / Sederajat</option>
					<option value="diploma" <?php if ($profil['pendidikanayah'] == 'diploma') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Diploma / Sederajat</option>
					<option value="s1" <?php if ($profil['pendidikanayah'] == 's1') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Sarjana / S1</option>
					<option value="s2" <?php if ($profil['pendidikanayah'] == 's2') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Master / S2</option>
					<option value="s3" <?php if ($profil['pendidikanayah'] == 's3') {
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
				<input type="text" class="form-control" name="jurusanayah" value="<?= $profil['jurusanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Nama Sekolah/Universitas:</label>
				<input type="text" class="form-control" name="sekolahayah" value="<?= $profil['sekolahayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Pekerjaan:</label>
				<input type="text" class="form-control" name="pekerjaanayah" value="<?= $profil['pekerjaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nama Perusahaan:</label>
				<input type="text" class="form-control" name="namaperusahaanayah" value="<?= $profil['namaperusahaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Jabatan dan Bagian (departemen):</label>
				<input type="text" class="form-control" name="jabatanayah" value="<?= $profil['jabatanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Alamat Kantor:</label>
				<input type="text" class="form-control" name="alamatperusahaanayah" value="<?= $profil['pekerjaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No.Telepon Kantor:</label>
				<input type="text" class="form-control" name="notelpperusahaanayah" value="<?= $profil['notelpperusahaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No.Fax Kantor:</label>
				<input type="text" class="form-control" name="nofaxperusahaanayah" value="<?= $profil['nofaxperusahaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Email Kantor</label>
				<input type="text" class="form-control" name="emailperusahaanayah" value="<?= $profil['emailperusahaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Kota Perusahaan/Kantor Ayah</label>
				<input type="text" class="form-control" name="kotaperusahaanayah" value="<?= $profil['kotaperusahaanayah'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Penghasilan</label>
				<select class="form-select" name="penghasilanayah">
					<option value="Pilih" <?php if ($profil['penghasilanayah'] == '') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Pilih Penghasilan</option>
					<option value="Kurang dari Rp.500,000" <?php if ($profil['penghasilanayah'] == 'Kurang dari Rp.500,000') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Kurang dari Rp.500,000</option>
					<option value="Rp.500,000 - Rp.999,999" <?php if ($profil['penghasilanayah'] == 'Rp.500,000 - Rp.999,999') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Rp.2,000,000 - Rp.4,999,999</option>
					<option value="Rp.5,000,000 - Rp.20,000,000" <?php if ($profil['penghasilanayah'] == 'Rp.5,000,000 - Rp.20,000,000') {
																		echo 'selected';
																	} else {
																		echo '';
																	} ?>>Rp.5,000,000 - Rp.20,000,000</option>
					<option value="Lebih dari Rp.20,000,000" <?php if ($profil['penghasilanayah'] == 'Lebih dari Rp.20,000,000') {
																	echo 'selected';
																} else {
																	echo '';
																} ?>>Lebih dari Rp.20,000,000</option>
					<option value="Tidak Berpenghasilan" <?php if ($profil['penghasilanayah'] == 'Tidak Berpenghasilan') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Tidak Berpenghasilan</option>
				</select>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Alamat Rumah (Jalan / RT / No):</label>
				<textarea class="form-control" name="alamatayah"><?= $profil['alamatayah'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kelurahan:</label>
				<textarea class="form-control" name="kelurahanayah"><?= $profil['kelurahanayah'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kecamatan:</label>
				<textarea class="form-control" name="kecamatanayah"><?= $profil['kecamatanayah'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kode Pos:</label>
				<input type="text" name="kodeposayah" class="form-control" value="<?= $profil['kodeposayah']; ?>">
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kota:</label>
				<input type="text" name="kota_ayah" class="form-control" value="<?= $profil['kota_ayah']; ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Hidup / Meninggal Dunia (Tahun)</label>
				<input type="text" class="form-control" name="keteranganhidupayah" value="<?= $profil['keteranganhidupayah'] ?>">
			</div>
		</div>

		<legend class="border-bottom mt-3 mb-3">
			<h6 class="title text-uppercase">Data Ibu</h6>
		</legend>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Status:</label>
				<select class="form-select" name="statusibu">
					<option value="" <?php if ($profil['statusibu'] == '') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Pilih</option>
					<option value="kandung" <?php if ($profil['statusibu'] == 'kandung') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Ibu Kandung</option>
					<option value="angkat" <?php if ($profil['statusibu'] == 'angkat') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Ibu Angkat</option>
					<option value="tiri" <?php if ($profil['statusibu'] == 'tiri') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Ibu Tiri</option>
					<option value="lainnya" <?php if ($profil['statusibu'] == 'lainnya') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Lainnya</option>
				</select>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-6">
				<div class="mb-3">
					<label class="form-label">Nama Ibu:</label>
					<input type="text" class="form-control" name="namaibu" value="<?= $profil['namaibu'] ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mb-3">
					<label class="form-label">Tempat Lahir:</label>
					<input type="text" class="form-control" name="tmpibu" value="<?= $profil['tmpibu'] ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mb-3">
					<label class="form-label">Tanggal Lahir:</label>
					<?php
					if ($profil['tgllahiribu'] == '0000-00-00' || $profil['tgllahiribu'] == '') {
						$tgllahiribu = '';
					} else {
						$tgllahiribu = $profil['tgllahiribu'];
					}
					?>
					<input type="date" class="form-control" name="tgllahiribu" value="<?= $tgllahiribu; ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mb-3">
					<label class="form-label">Kewarganegaraan:</label>
					<select class="form-select" name="wargaibu">
						<option value="" <?php if ($profil['wargaibu'] == '') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Pilih</option>
						<option value="wni" <?php if ($profil['wargaibu'] == 'wni') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Warga Negara Indonesia</option>
						<option value="wna" <?php if ($profil['wargaibu'] == 'wna') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Warga Negara Asing</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nomer Telepon:</label>
				<input type="text" name="teleponibu" class="form-control" value="<?= $profil['teleponibu']; ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No HP Ibu:</label>
				<input type="text" class="form-control" name="wa_ibu" value="<?= $profil['wa_ibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Email Ibu:</label>
				<input type="text" class="form-control" name="email_ibu" value="<?= $profil['email_ibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Pendidikan Terakhir:</label>
				<select class="form-select" name="pendidikanibu">
					<option value="" <?php if ($profil['pendidikanibu'] == '') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Pilih Pendidikan</option>
					<option value="sd" <?php if ($profil['pendidikanibu'] == 'sd') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SD</option>
					<option value="smp" <?php if ($profil['pendidikanibu'] == 'smp') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SMP / Sederajat</option>
					<option value="sma" <?php if ($profil['pendidikanibu'] == 'sma') {
											echo 'selected';
										} else {
											echo '';
										} ?>>SMA / Sederajat</option>
					<option value="diploma" <?php if ($profil['pendidikanibu'] == 'diploma') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Diploma / Sederajat</option>
					<option value="s1" <?php if ($profil['pendidikanibu'] == 's1') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Sarjana / S1</option>
					<option value="s2" <?php if ($profil['pendidikanibu'] == 's2') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Master / S2</option>
					<option value="s3" <?php if ($profil['pendidikanibu'] == 's3') {
											echo 'selected';
										} else {
											echo '';
										} ?>>Doktor / S3</option>
				</select>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Jurusan Ibu:</label>
				<input type="text" class="form-control" name="jurusanibu" value="<?= $profil['jurusanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Nama Sekolah/Universitas</label>
				<input type="text" class="form-control" name="sekolahibu" value="<?= $profil['sekolahibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Pekerjaan Ibu</label>
				<input type="text" class="form-control" name="pekerjaanibu" value="<?= $profil['pekerjaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Nama Perusahaan/Kantor Ibu</label>
				<input type="text" class="form-control" name="namaperusahaanibu" value="<?= $profil['namaperusahaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Jabatan dan Bagian (departemen) Ibu</label>
				<input type="text" class="form-control" name="jabatanibu" value="<?= $profil['jabatanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Alamat Perusahaan/Kantor Ibu</label>
				<input type="text" class="form-control" name="alamatperusahaanibu" value="<?= $profil['alamatperusahaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No.Telepon Kantor:</label>
				<input type="text" class="form-control" name="notelpperusahaanibu" value="<?= $profil['notelpperusahaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">No.Fax Kantor:</label>
				<input type="text" class="form-control" name="nofaxperusahaanibu" value="<?= $profil['nofaxperusahaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Email Kantor</label>
				<input type="text" class="form-control" name="emailperusahaanibu" value="<?= $profil['emailperusahaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Kota Perusahaan/Kantor Ibu</label>
				<input type="text" class="form-control" name="kotaperusahaanibu" value="<?= $profil['kotaperusahaanibu'] ?>">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="mb-3">
				<label class="form-label">Penghasilan Ibu</label>
				<select class="form-select" name="penghasilanibu">
					<option value="Pilih" <?php if ($profil['penghasilanibu'] == '') {
												echo 'selected';
											} else {
												echo '';
											} ?>>Pilih Penghasilan</option>
					<option value="Kurang dari Rp.500,000" <?php if ($profil['penghasilanibu'] == 'Kurang dari Rp.500,000') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Kurang dari Rp.500,000</option>
					<option value="Rp.500,000 - Rp.999,999" <?php if ($profil['penghasilanibu'] == 'Rp.500,000 - Rp.999,999') {
																echo 'selected';
															} ?>>Rp.2,000,000 - Rp.4,999,999</option>
					<option value="Rp.5,000,000 - Rp.20,000,000" <?php if ($profil['penghasilanibu'] == 'Rp.5,000,000 - Rp.20,000,000') {
																		echo 'selected';
																	} else {
																		echo '';
																	} ?>>Rp.5,000,000 - Rp.20,000,000</option>
					<option value="Lebih dari Rp.20,000,000" <?php if ($profil['penghasilanibu'] == 'Lebih dari Rp.20,000,000') {
																	echo 'selected';
																} else {
																	echo '';
																} ?>>Lebih dari Rp.20,000,000</option>
					<option value="Tidak Berpenghasilan" <?php if ($profil['penghasilanibu'] == 'Tidak Berpenghasilan') {
																echo 'selected';
															} else {
																echo '';
															} ?>>Tidak Berpenghasilan</option>
				</select>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Alamat Rumah Lengkap (Jalan / RT / No):</label>
				<textarea class="form-control" name="alamatibu"><?= ($profil['alamatibu']) ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kelurahan:</label>
				<textarea class="form-control" name="kelurahanibu"><?= $profil['kelurahanibu'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kecamatan:</label>
				<textarea class="form-control" name="kecamatanibu"><?= $profil['kecamatanibu'] ?></textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kode Pos:</label>
				<input type="text" name="kodeposibu" class="form-control" value="<?= $profil['kodeposibu']; ?>">
			</div>
		</div>
		<div class="col-lg-12">
			<div class="mb-3">
				<label class="form-label">Kota:</label>
				<input type="text" name="kota_ibu" class="form-control" value="<?= $profil['kota_ibu']; ?>">
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="mb-3">
			<label class="form-label">Hidup / Meninggal Dunia (Tahun)</label>
			<input type="text" class="form-control" name="keteranganhidupibu" value="<?= $profil['keteranganhidupibu'] ?>">
		</div>
	</div>


	<div class="mb-b-3 text-center">
		<button type="button" class="btn btn-sm btn-info" onclick="simpan5()">
			<i class="ph-floppy-disk me-2"></i>
			Simpan
		</button>
		<div id="alert-container-5"></div>

	</div>
</div>
<script type="text/javascript">
	function simpan5() {
		let isValid = true;

		const requiredFields = [
			'statusayah', 'namaayah', 'tmpayah', 'tgllahirayah', 'wargaayah', 'teleponayah', 'wa_ayah', 'email_ayah', 'pendidikanayah', 'jurusanayah', 'sekolahayah', 'pekerjaanayah', 'namaperusahaanayah', 'jabatanayah', 'alamatperusahaanayah', 'notelpperusahaanayah', 'nofaxperusahaanayah', 'emailperusahaanayah', 'kotaperusahaanayah', 'penghasilanayah', 'alamatayah', 'kelurahanayah', 'kecamatanayah', 'kodeposayah', 'kota_ayah', 'keteranganhidupayah',
			'statusibu', 'namaibu', 'tmpibu', 'tgllahiribu', 'wargaibu', 'teleponibu', 'wa_ibu', 'email_ibu', 'pendidikanibu', 'jurusanibu', 'sekolahibu', 'pekerjaanibu', 'namaperusahaanibu', 'jabatanibu', 'alamatperusahaanibu', 'notelpperusahaanibu', 'nofaxperusahaanibu', 'emailperusahaanibu', 'kotaperusahaanibu', 'penghasilanibu', 'alamatibu', 'kelurahanibu', 'kecamatanibu', 'kodeposibu', 'kota_ibu', 'keteranganhidupibu',
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
			$('#alert-container-5').html(`
		<div class="alert alert-warning border-0 alert-dismissible mt-3 fade show">
			Mohon lengkapi semua field yang wajib diisi.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

			</div>

	`);

			return;
		}
		let data = {
			replid: $('[name="replid"]').val(),
			statusayah: $('[name="statusayah"]').val(),
			namaayah: $('[name="namaayah"]').val(),
			tmpayah: $('[name="tmpayah"]').val(),
			tgllahirayah: $('[name="tgllahirayah"]').val(),
			wargaayah: $('[name="wargaayah"]').val(),
			teleponayah: $('[name="teleponayah"]').val(),
			wa_ayah: $('[name="wa_ayah"]').val(),
			email_ayah: $('[name="email_ayah"]').val(),
			pendidikanayah: $('[name="pendidikanayah"]').val(),
			jurusanayah: $('[name="jurusanayah"]').val(),
			sekolahayah: $('[name="sekolahayah"]').val(),
			pekerjaanayah: $('[name="pekerjaanayah"]').val(),
			namaperusahaanayah: $('[name="namaperusahaanayah"]').val(),
			jabatanayah: $('[name="jabatanayah"]').val(),
			alamatperusahaanayah: $('[name="alamatperusahaanayah"]').val(),
			notelpperusahaanayah: $('[name="notelpperusahaanayah"]').val(),
			nofaxperusahaanayah: $('[name="nofaxperusahaanayah"]').val(),
			emailperusahaanayah: $('[name="emailperusahaanayah"]').val(),
			kotaperusahaanayah: $('[name="kotaperusahaanayah"]').val(),
			penghasilanayah: $('[name="penghasilanayah"]').val(),
			alamatayah: $('[name="alamatayah"]').val(),
			kelurahanayah: $('[name="kelurahanayah"]').val(),
			kecamatanayah: $('[name="kecamatanayah"]').val(),
			kodeposayah: $('[name="kodeposayah"]').val(),
			kota_ayah: $('[name="kota_ayah"]').val(),
			keteranganhidupayah: $('[name="keteranganhidupayah"]').val(),

			statusibu: $('[name="statusibu"]').val(),
			namaibu: $('[name="namaibu"]').val(),
			tmpibu: $('[name="tmpibu"]').val(),
			tgllahiribu: $('[name="tgllahiribu"]').val(),
			wargaibu: $('[name="wargaibu"]').val(),
			teleponibu: $('[name="teleponibu"]').val(),
			wa_ibu: $('[name="wa_ibu"]').val(),
			email_ibu: $('[name="email_ibu"]').val(),
			pendidikanibu: $('[name="pendidikanibu"]').val(),
			jurusanibu: $('[name="jurusanibu"]').val(),
			sekolahibu: $('[name="sekolahibu"]').val(),
			pekerjaanibu: $('[name="pekerjaanibu"]').val(),
			namaperusahaanibu: $('[name="namaperusahaanibu"]').val(),
			jabatanibu: $('[name="jabatanibu"]').val(),
			alamatperusahaanibu: $('[name="alamatperusahaanibu"]').val(),
			notelpperusahaanibu: $('[name="notelpperusahaanibu"]').val(),
			nofaxperusahaanibu: $('[name="nofaxperusahaanibu"]').val(),
			emailperusahaanibu: $('[name="emailperusahaanibu"]').val(),
			kotaperusahaanibu: $('[name="kotaperusahaanibu"]').val(),
			penghasilanibu: $('[name="penghasilanibu"]').val(),
			alamatibu: $('[name="alamatibu"]').val(),
			kelurahanibu: $('[name="kelurahanibu"]').val(),
			kecamatanibu: $('[name="kecamatanibu"]').val(),
			kodeposibu: $('[name="kodeposibu"]').val(),
			kota_ibu: $('[name="kota_ibu"]').val(),
			keteranganhidupibu: $('[name="keteranganhidupibu"]').val()
		};
		$.ajax({
			type: 'POST',
			url: '<?php base_url() ?>dashboard/simpan5',
			data: data,
			success: function(response) {
				if (response > 0) {
					$('#alert-container-5').html(`
						<div class="alert alert-primary border-0 alert-dismissible mt-3 fade show">
							Data berhasil disimpan.
						</div>
					`);
				}
			}
		});
	}
</script>
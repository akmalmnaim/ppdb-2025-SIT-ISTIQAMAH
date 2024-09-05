
<div class="content container">
	<div class="card">
		<div class="card-header d-flex align-items-center text-uppercase text-muted bg-light fw-bold">
			<h6 class="mb-0 text-uppercase text-muted"><i class="ph-student me-2"></i>Profil Pendaftar</h6>
			<div class="ms-auto">
				<button type="button" class="btn btn-success btn_simpan" onclick="simpan()"><i class="ph-windows-logo me-2"></i>Simpan </button>
			</div>
		</div>
		<div class="card-body border-top">
			<form class="form-pendaftaran">
				<fieldset class="mb-3 border-bottom border-end border-start border-top">
					<legend class="fs-base fw-bold border-bottom px-3 py-2 mb-3 bg-light text-uppercase text-muted"><i class="ph-student me-2"></i> Data Pribadi profil Peserta Didik</legend>
					
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Mendaftar ke</label>
						<div class="col-lg-2">
							<select name="departemen" class="form-select bg-light">
								<option value="sdit" <?php if($profil['departemen'] == 'sdit') { echo 'selected';} else { echo '';} ?> >SDIT</option>
								<option value="smpit" <?php if($profil['departemen'] == 'smpit') { echo 'selected';} else { echo '';} ?>>SMPIT</option>
								<option value="smait" <?php if($profil['departemen'] == 'smait') { echo 'selected';} else { echo '';} ?>>SMAIT</option>
							</select>
						</div>
						<div class="col-lg-2">
							<select name="is_baru" class="form-select bg-light">
								<option value="0" <?php if($profil['is_baru'] == '0') { echo 'selected';} else { echo '';} ?> >Baru</option>
								<option value="1" <?php if($profil['is_baru'] == '1') { echo 'selected';} else { echo '';} ?> >Pindahan</option>
							</select>
						</div>
						<label class="col-lg-2 col-form-label fw-bold text-lg-end">No. Pendaftaran</label>
						<div class="col-lg-4">
							<input type="text" class="form-control fw-bold bg-light" value="<?= $profil['nopendaftaran']; ?>" readonly>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">NISN</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="nisn" value="<?= $profil['nisn']; ?>">
							<input type="hidden" class="form-control" name="replid" value="<?= $profil['replid'];?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">NIK</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="nik" value="<?= $profil['nik']; ?>" placeholder="Nomor Induk Kependudukan">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Nama Lengkap</label>
						<div class="col-lg-4">
							<input type="text" class="form-control bg-light fw-bold text-muted" name="nama" value="<?= $profil['nama']?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Panggilan</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="panggilan" value="<?= $profil['panggilan']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Jenis Kelamin</label>
						<div class="col-lg-4">
							<div class="form-check-horizontal">
								<label class="form-check form-check-inline">
									<input type="radio" class="form-check-input" name="jk" value="l" <?php if($profil['kelamin'] == 'l') { echo 'checked';}?>>
									<span class="form-check-label">Laki-laki</span>
								</label>
								<label class="form-check form-check-inline">
									<input type="radio" class="form-check-input" name="jk" value="p" <?php if($profil['kelamin'] == 'p') { echo 'checked';}?>>
									<span class="form-check-label">Perempuan</span>
								</label>
							</div>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Tempat, Tanggal Lahir</label>
						<div class="col-lg-2">
							<input type="text" class="form-control bg-light fw-bold text-muted" name="tmplahirpd" value="<?= $profil['tmplahir']?>">
						</div>
						<div class="col-lg-2">
							<input type="date" class="form-control bg-light fw-bold text-muted" name="tgllahirpd" value="<?= $profil['tgllahir']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Agama</label>
						<div class="col-lg-4">
							<input type="text" class="form-control bg-light" name="agama" value="ISLAM" readonly>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Suku</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="suku" value="<?= $profil['suku']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Status</label>
						<div class="col-lg-4">
							<select class="form-select" name="status">
								<option value="reguler" <?php if($profil['status'] == 'reguler') { echo 'selected';} else { echo '';} ?> >Reguler</option>
								<option value="eksklusif" <?php if($profil['status'] == 'eksklusif') { echo 'selected';} else { echo '';} ?>  >Eksklusif</option>
							</select>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Kondisi</label>
						<div class="col-lg-4">
							<select class="form-select" name="kondisi">
								<option value="cukup" <?php if($profil['status'] == 'cukup') { echo 'selected';} else { echo '';} ?> >Cukup</option>
								<option value="mampu" <?php if($profil['status'] == 'mampu') { echo 'selected';} else { echo '';} ?> >Berkecukupan</option>
							</select>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Kewarganegaraan</label>
						<div class="col-lg-4">
							<div class="form-check-horizontal">
								<label class="form-check form-check-inline">
									<input type="radio" class="form-check-input" name="kw" value="wni" <?php if($profil['warga'] == 'wni') { echo 'checked';}?>>
									<span class="form-check-label">WNI</span>
								</label>
								<label class="form-check form-check-inline">
									<input type="radio" class="form-check-input" name="kw" value="wna" <?php if($profil['warga'] == 'wna') { echo 'checked';}?>>
									<span class="form-check-label">WNA</span>
								</label>
							</div>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Anak Ke</label>
						<div class="col-lg-1">
							<input type="text" class="form-control" name="ankke" value="<?= $profil['anakke']?>">
						</div>
						<label class="col-lg-1 col-form-label text-center">dari</label>
						<div class="col-lg-1">
							<input type="text" class="form-control" name="dari" value="<?= $profil['jumlahsaudara']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Status Anak</label>
						<div class="col-lg-2">
							<select class="form-select" name="statusanak">
								<option value="kandung" <?php if($profil['statusanak'] == 'kandung') { echo 'selected';} else { echo '';} ?> >Anak Kandung</option>
								<option value="angkat" <?php if($profil['statusanak'] == 'angkat') { echo 'selected';} else { echo '';} ?> >Anak Angkat</option>
								<option value="tiri" <?php if($profil['statusanak'] == 'tiri') { echo 'selected';} else { echo '';} ?> >Anak Tiri</option>
								<option value="lainnya" <?php if($profil['statusanak'] == 'lainnya') { echo 'selected';} else { echo '';} ?> >Lainnya</option>
							</select>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Jumlah Saudara Kandung</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="jmlsaudarakandung" value="<?= $profil['jumlahkandung']?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Jumlah Saudara Tiri</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="jmlsaudaratiri" value="<?= $profil['jumlahtiri']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Bahasa</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="bahasa" value="<?= $profil['bahasa']?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Alamat</label>
						<div class="col-lg-4">
							<textarea class="form-control" name="alamatsiswa"><?= $profil['alamatsiswa']?></textarea>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Kode Pos</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="kodepos" value="<?= $profil['kodepossiswa']?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Jarak ke Sekolah</label>
						<div class="col-lg-4 form-control-feedback form-control-feedback-end">
							<input type="text" class="form-control" name="jarak" value="<?= $profil['jarak']?>">
							<div class="form-control-feedback-icon form-control-feedback-icon-lg">
								km
							</div>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">No. Telp</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="telponpd" value="<?= $profil['telponsiswa']?>">
						</div>
						<label class="col-lg-1 col-form-label text-lg-end">No. HP</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="nohppd" value="<?= $profil['hpsiswa']?>">
						</div>
						<label class="col-lg-1 col-form-label text-lg-end">Email</label>
						<div class="col-lg-4">
							<input type="email" class="form-control" name="emailpd" value="<?= $profil['emailsiswa']?>">
						</div>
					</div>
					
				</fieldset>
				<fieldset class="mb-3 border-bottom border-end border-start border-top">
					<legend class="fs-base fw-bold border-bottom px-3 py-2 mb-3 bg-light text-muted"><i class="ph-buildings me-2"></i> Data Sekolah profil Peserta Didik</legend>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Asal Sekolah</label>
						<div class="col-lg-2">
							<select class="form-select" name="tingkatsekolah">
								<option>TK</option>
								<option>SD</option>
								<option>SMP</option>
							</select>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="asalsekolah" value="<?= $profil['asalsekolah']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Nomor Ijazah</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="noijazah" value="<?= $profil['noijasah']?>">
						</div>
						<label class="col-lg-1 col-form-label text-lg-end">Tgl. Ijazah</label>
						<div class="col-lg-2">
							<?php 
							if($profil['tglijasah'] !='0000-00-00')
							{
								$tgl_i = $profil['tglijasah'];
							} else {
								$tgl_i ='';
							}
							?>
							<input type="date" class="form-control" name="tglijazah" value="<?= $tgl_i; ?>">
						</div>
						<!-- <label class="col-lg-1 col-form-label text-lg-end">Keterangan</label>
						<div class="col-lg-3">
							<textarea class="form-control" name="keteranganpd"></textarea>
						</div> -->
					</div>
				</fieldset>
				<fieldset class="mb-3 border-bottom border-end border-start border-top">
					<legend class="fs-base fw-bold border-bottom px-3 py-2 mb-3 bg-light text-muted"><i class="ph-heartbeat me-2"></i> Riwayat Kesehatan</legend>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Golongan Darah</label>
						<div class="col-lg-4">
							<select class="form-select" name="golongandarah">
								<option value="" <?php if($profil['darah'] == '') { echo 'selected';} else { echo '';} ?>  >Belum Ada</option>
								<option value="A" <?php if($profil['darah'] == 'A') { echo 'selected';} else { echo '';} ?>  >A</option>
								<option value="B" <?php if($profil['darah'] == 'B') { echo 'selected';} else { echo '';} ?>  >B</option>
								<option value="AB" <?php if($profil['darah'] == 'AB') { echo 'selected';} else { echo '';} ?>  >AB</option>
								<option value="O" <?php if($profil['darah'] == 'O') { echo 'selected';} else { echo '';} ?>  >O</option>
							</select>
						</div>
						<label class="col-lg-1 col-form-label text-lg-end">Berat</label>
						<div class="col-lg-2 form-control-feedback form-control-feedback-end">
							<input type="text" class="form-control" name="berat" value="<?= $profil['berat']?>">
							<div class="form-control-feedback-icon form-control-feedback-icon-lg">
								Kg.
							</div>
						</div>
						<label class="col-lg-1 col-form-label text-lg-end">Tinggi</label>
						<div class="col-lg-2 form-control-feedback form-control-feedback-end">
							<input type="text" class="form-control" name="tinggi" value="<?= $profil['tinggi']?>">
							<div class="form-control-feedback-icon form-control-feedback-icon-lg">
								cm.
							</div>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Riwayat Penyakit</label>
						<div class="col-lg-10">
							<textarea class="form-control" name="riwayatsakit"><?= $profil['kesehatan']?></textarea>
						</div>
					</div>
				</fieldset>
				<fieldset class="mb-3 border-bottom border-end border-start border-top">
					<legend class="fs-base fw-bold border-bottom px-3 py-2 mb-3 bg-light text-muted"><i class="ph-buildings me-2"></i> Data Orang Tua profil Peserta Didik</legend>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Nama Ayah</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="namaayah" value="<?= $profil['namaayah']?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Nama Ibu</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="namaibu" value="<?= $profil['namaibu']?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Status Orang Tua</label>
						<div class="col-lg-4">
							<select class="form-select" name="statusayah">
								<option value="kandung" <?php if($profil['statusayah'] == 'kandung') { echo 'selected';} else { echo '';} ?> >Ayah Kandung</option>
								<option value="angkat" <?php if($profil['statusayah'] == 'angkat') { echo 'selected';} else { echo '';} ?> >Ayah Angkat</option>
								<option value="tiri" <?php if($profil['statusayah'] == 'tiri') { echo 'selected';} else { echo '';} ?> >Ayah Tiri</option>
								<option value="lainnya" <?php if($profil['statusayah'] == 'lainnya') { echo 'selected';} else { echo '';} ?> >Lainnya</option>
							</select>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Status Orang Tua</label>
						<div class="col-lg-4">
							<select class="form-select" name="statusibu">
								<option value="kandung" <?php if($profil['statusibu'] == 'kandung') { echo 'selected';} else { echo '';} ?> >Ibu Kandung</option>
								<option value="angkat" <?php if($profil['statusibu'] == 'angkat') { echo 'selected';} else { echo '';} ?> >Ibu Angkat</option>
								<option value="tiri" <?php if($profil['statusibu'] == 'tiri') { echo 'selected';} else { echo '';} ?> >Ibu Tiri</option>
								<option value="lainnya" <?php if($profil['statusibu'] == 'lainnya') { echo 'selected';} else { echo '';} ?> >Lainnya</option>
							</select>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Tempat, Tgl. Lahir</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="tmpayah" value="<?= $profil['tmplahirayah']?>">
						</div>
						<div class="col-lg-2">
							<?php 
							if($profil['tgllahirayah'] !='0000-00-00')
							{
								$tgl_ayah = $profil['tgllahirayah'];
							} else {
								$tgl_ayah ='';
							}
							?>
							<input type="date" class="form-control" name="tglayah" value="<?= $tgl_ayah?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Tempat, Tgl. Lahir</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="tmpibu" value="<?= $profil['tmplahiribu']?>">
						</div>
						<div class="col-lg-2">
							<?php 
							if($profil['tgllahiribu'] !='0000-00-00')
							{
								$tgl_ibu = $profil['tgllahiribu'];
							} else {
								$tgl_ibu ='';
							}
							?>
							<input type="date" class="form-control" name="tglibu" value="<?= $tgl_ibu; ?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Pendidikan</label>
						<div class="col-lg-2">
							<select class="form-select" name="pendidikanayah">
								<option value="" <?php if($profil['pendidikanayah'] == '') { echo 'selected';} else { echo '';} ?> >Pilih Pendidikan</option>
								<option value="sd" <?php if($profil['pendidikanayah'] == 'sd') { echo 'selected';} else { echo '';} ?> >SD</option>
								<option value="smp" <?php if($profil['pendidikanayah'] == 'smp') { echo 'selected';} else { echo '';} ?> >SMP / Sederajat</option>
								<option value="sma" <?php if($profil['pendidikanayah'] == 'sma') { echo 'selected';} else { echo '';} ?> >SMA / Sederajat</option>
								<option value="diploma" <?php if($profil['pendidikanayah'] == 'diploma') { echo 'selected';} else { echo '';} ?> >Diploma / Sederajat</option>
								<option value="s1" <?php if($profil['pendidikanayah'] == 's1') { echo 'selected';} else { echo '';} ?> >Sarjana / S1</option>
								<option value="s2" <?php if($profil['pendidikanayah'] == 's2') { echo 'selected';} else { echo '';} ?> >Master / S2</option>
								<option value="s3" <?php if($profil['pendidikanayah'] == 's3') { echo 'selected';} else { echo '';} ?> >Doktor / S3</option>
							</select>
						</div>
						<label class="col-lg-4 col-form-label text-lg-end">Pendidikan</label>
						<div class="col-lg-2">
							<select class="form-select" name="pendidikanibu">
								<option value="" <?php if($profil['pendidikanibu'] == '') { echo 'selected';} else { echo '';} ?> >Pilih Pendidikan</option>
								<option value="sd" <?php if($profil['pendidikanibu'] == 'sd') { echo 'selected';} else { echo '';} ?> >SD</option>
								<option value="smp" <?php if($profil['pendidikanibu'] == 'smp') { echo 'selected';} else { echo '';} ?> >SMP / Sederajat</option>
								<option value="sma" <?php if($profil['pendidikanibu'] == 'sma') { echo 'selected';} else { echo '';} ?> >SMA / Sederajat</option>
								<option value="diploma" <?php if($profil['pendidikanibu'] == 'diploma') { echo 'selected';} else { echo '';} ?> >Diploma / Sederajat</option>
								<option value="s1" <?php if($profil['pendidikanibu'] == 's1') { echo 'selected';} else { echo '';} ?> >Sarjana / S1</option>
								<option value="s2" <?php if($profil['pendidikanibu'] == 's2') { echo 'selected';} else { echo '';} ?> >Master / S2</option>
								<option value="s3" <?php if($profil['pendidikanibu'] == 's3') { echo 'selected';} else { echo '';} ?> >Doktor / S3</option>
							</select>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Pekerjaan</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="pekerjaanayah" value="<?= $profil['pekerjaanayah']; ?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Pekerjaan</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="pekerjaanibu" value="<?= $profil['pekerjaanibu']; ?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Penghasilan</label>
						<div class="col-lg-4">
							<select class="form-select" name="penghasilanayah">
								<option value="0" <?php if($profil['penghasilanayah'] == '0') { echo 'selected';} else { echo '';} ?> >Pilih Penghasilan</option>
								<option value="1000000" <?php if($profil['penghasilanayah'] == '1000000') { echo 'selected';} else { echo '';} ?> >dibawah Rp.1.000.000</option>
								<option value="2000000" <?php if($profil['penghasilanayah'] == '2000000') { echo 'selected';} else { echo '';} ?> >Rp.1.000.000 - Rp.1.999.999</option>
								<option value="3000000" <?php if($profil['penghasilanayah'] == '3000000') { echo 'selected';} else { echo '';} ?> >Rp.2.000.000 - Rp.2.999.999</option>
								<option value="5000000" <?php if($profil['penghasilanayah'] == '5000000') { echo 'selected';} else { echo '';} ?> >Rp.3.000.000 - Rp.4.999.999</option>
								<option value="10000000" <?php if($profil['penghasilanayah'] == '10000000') { echo 'selected';} else { echo '';} ?> >Rp.5.000.000 - Rp.9.999.999</option>
								<option value="10000001" <?php if($profil['penghasilanayah'] == '10000001') { echo 'selected';} else { echo '';} ?> >diatas Rp.10.000.000</option>
							</select>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Penghasilan</label>
						<div class="col-lg-4">
							<select class="form-select" name="penghasilanibu">
								<option value="0" <?php if($profil['penghasilanibu'] == '0') { echo 'selected';} else { echo '';} ?> >Pilih Penghasilan</option>
								<option value="1000000" <?php if($profil['penghasilanibu'] == '1000000') { echo 'selected';} else { echo '';} ?> >dibawah Rp.1.000.000</option>
								<option value="2000000" <?php if($profil['penghasilanibu'] == '2000000') { echo 'selected';} else { echo '';} ?> >Rp.1.000.000 - Rp.1.999.999</option>
								<option value="3000000" <?php if($profil['penghasilanibu'] == '3000000') { echo 'selected';} else { echo '';} ?> >Rp.2.000.000 - Rp.2.999.999</option>
								<option value="5000000" <?php if($profil['penghasilanibu'] == '5000000') { echo 'selected';} else { echo '';} ?> >Rp.3.000.000 - Rp.4.999.999</option>
								<option value="10000000" <?php if($profil['penghasilanibu'] == '10000000') { echo 'selected';} else { echo '';} ?> >Rp.5.000.000 - Rp.9.999.999</option>
								<option value="10000001" <?php if($profil['penghasilanibu'] == '10000001') { echo 'selected';} else { echo '';} ?> >diatas Rp.10.000.000</option>
							</select>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Email</label>
						<div class="col-lg-4">
							<input type="email" class="form-control" name="emailayah" value="<?= $profil['emailayah']; ?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Email</label>
						<div class="col-lg-4">
							<input type="email" class="form-control" name="emailibu" value="<?= $profil['emailibu']; ?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">No. HP</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="hpayah" value="<?= $profil['hpayah']; ?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">No. HP</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="hpibu" value="<?= $profil['hpibu']; ?>">
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Alamat Orang Tua</label>
						<div class="col-lg-10">
							<textarea class="form-control" name="alamatortu" value="<?= $profil['alamatortu']; ?>"></textarea>
						</div>
					</div>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Nama Wali</label>
						<div class="col-lg-10 mb-3">
							<input type="text" class="form-control" name="namawali" value="<?= $profil['namawali']; ?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Tempat, Tanggal Lahir</label>
						<div class="col-lg-2 mb-3">
							<input type="text" class="form-control" name="tmpwali" value="<?= $profil['tmplahirwali']; ?>">
						</div>
						<div class="col-lg-2 mb-3">
							<?php 
							if($profil['tgllahirwali'] !='0000-00-00')
							{
								$tgl_wali = $profil['tgllahirwali'];
							} else {
								$tgl_wali ='';
							}
							?>
							<input type="date" class="form-control" name="tglwali" value="<?= $tgl_wali; ?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Pekerjaan</label>
						<div class="col-lg-4 mb-3">
							<input type="text" class="form-control" name="pekerjaanwali" value="<?= $profil['pekerjaanwali']?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Penghasilan</label>
						<div class="col-lg-4 mb-3">
							<select class="form-select" name="penghasilanwali">
								<option value="0" <?php if($profil['penghasilanwali'] == '0') { echo 'selected';} else { echo '';} ?> >Pilih Penghasilan</option>
								<option value="1000000" <?php if($profil['penghasilanwali'] == '1000000') { echo 'selected';} else { echo '';} ?> >dibawah Rp.1.000.000</option>
								<option value="2000000" <?php if($profil['penghasilanwali'] == '2000000') { echo 'selected';} else { echo '';} ?> >Rp.1.000.000 - Rp.1.999.999</option>
								<option value="3000000" <?php if($profil['penghasilanwali'] == '3000000') { echo 'selected';} else { echo '';} ?> >Rp.2.000.000 - Rp.2.999.999</option>
								<option value="5000000" <?php if($profil['penghasilanwali'] == '5000000') { echo 'selected';} else { echo '';} ?> >Rp.3.000.000 - Rp.4.999.999</option>
								<option value="10000000" <?php if($profil['penghasilanwali'] == '10000000') { echo 'selected';} else { echo '';} ?> >Rp.5.000.000 - Rp.9.999.999</option>
								<option value="10000001" <?php if($profil['penghasilanwali'] == '10000001') { echo 'selected';} else { echo '';} ?> >diatas Rp.10.000.000</option>
							</select>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Email</label>
						<div class="col-lg-4 mb-3">
							<input type="text" class="form-control" name="emailwali" value="<?= $profil['emailwali']; ?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">No. HP</label>
						<div class="col-lg-4 mb-3">
							<input type="text" class="form-control" name="hpwali" value="<?= $profil['hpwali'];?>">
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Alamat Wali</label>
						<div class="col-lg-4 mb-3">
							<textarea class="form-control" name="alamatwali"><?= $profil['alamatwali']; ?></textarea>
						</div>
					</div>
				</fieldset>
				<fieldset class="mb-3 border-bottom border-end border-start border-top">
					<legend class="fs-base fw-bold border-bottom px-3 py-2 mb-3 bg-light text-muted"><i class="ph-info me-2"></i> Informasi Tambahan</legend>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Hobi</label>
						<div class="col-lg-10 mb-3">
							<textarea class="form-control" name="hobi"></textarea>
						</div>
						<label class="col-lg-2 col-form-label text-lg-end">Keterangan</label>
						<div class="col-lg-10">
							<textarea class="form-control" name="keterangantbh"></textarea>
						</div>
					</div>
				</fieldset>
				<fieldset class="mb-3 border-bottom border-end border-start border-top">
					<legend class="fs-base fw-bold border-bottom px-3 py-2 mb-3 bg-light text-muted"><i class="ph-camera me-2"></i> Upload Foto</legend>
					<div class="row px-2 mx-2 mb-3">
						<label class="col-lg-2 col-form-label text-lg-end">Upload Foto</label>
						<div class="col-lg-10">
							<input type="hidden" name="old_foto" value="<?= $profil['foto']; ?>">
							<input type="file" class="form-control" id="foto" accept=".jpg,.jpeg,.png" onchange="uploadFoto()">
						</div>
					</div>
				</fieldset>
				<div class="text-center">
					<button type="button" class="btn btn-success btn_simpan" onclick="simpan()"><i class="ph-windows-logo me-2"></i>Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function uploadFoto()
	{ 
		getOld();
		var fileInput = document.getElementById('foto');
		var file = fileInput.files[0];

		if (file) {
			var formData = new FormData();
			formData.append('image', file);
			formData.append('old_file', $('[name="old_foto"]').val());
			formData.append('replid', $('[name="replid"]').val());
			formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			$.ajax({
				url: 'dashboard/upload_foto/', 
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'JSON',
				async:false,
				success: function(response) {
					if(response.success == true)
						alert('Foto berhasil di simpan simpan');
				},
				error: function() {
					alert('Error');
				}
			});
		} else {
			alert('file belum dipilih');
		}
	}

	function getOld()
	{
		let replid = $('[name="replid"]').val();
		$.ajax({
			url: 'dashboard/old_img/'+replid,
			type: 'GET',
			async:false,
			success: function(data) {
				$('[name="old_foto"]').val(data);
			}
		});
	}

	function simpan()
	{
		let form = $('.form-pendaftaran').serialize();
		$.ajax({
			url: '<?= base_url()?>dashboard/simpan',
			type: 'POST',
			data: form+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
			beforeSend: function() {
				$('.btn_simpan').html('<i class="ph-spinner spinner me-2"></i> proses mengirim ...');
			},
			success: function(response) {
				if(response > 0)
					alert('Data berhasil diperbarui');
			},
			error: function(xhr, status, error) {
				console.log(error);
			},
			complete: function() {
				$('.btn_simpan').html('<i class="ph-windows-logo me-2"></i>Simpan');
			}
		});
	}
</script>
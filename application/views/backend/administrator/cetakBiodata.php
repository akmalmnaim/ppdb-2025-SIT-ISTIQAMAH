<div class="col-12">
	<div class="row">
		<h4 class="fs-20 mb-0 text-uppercase text-muted text-center">
			Profil Calon Peserta Didik Baru
		</h4>
		<div class="col-10">
			<div class="pt-2">
				<div class="card-header border-0 pb-0 mb-3">
					<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
						<i class="fa-regular fa-square-check me-2"></i>
						Data Pribadi Peserta Didik
					</h4>
				</div>
				<div class="row">
					<label class="col-4 text-end">Nama Lengkap :</label>
					<label class="col-8"><?= $bio['nama']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Panggilan :</label>
					<label class="col-8"><?= $bio['panggilan']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Tempat, Tanggal Lahir :</label>
					<label class="col-8"><?= $bio['tmplahir'] . ', ' . tanggal_indo($bio['tgllahir']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">NISN :</label>
					<label class="col-8"><?= $bio['nisn']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">NIK :</label>
					<label class="col-8"><?= $bio['nik']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Suku :</label>
					<label class="col-8"><?= $bio['suku']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Agama :</label>
					<label class="col-8"><?= ucfirst($bio['agama']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Status :</label>
					<label class="col-8"><?= $bio['status']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Kondisi :</label>
					<?php
					if ($bio['kondisi'] == 'cukup') {
						$kondisi = 'Cukup';
					} else {
						$kondisi = 'Berkecukupan';
					}
					?>
					<label class="col-8"><?= $kondisi; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Kewarganegaraan :</label>
					<?php
					if ($bio['warga'] == 'wni') {
						$wn = 'Warga Negara Indonesia (WNI)';
					} else {
						$wn = 'Warga Negara Asing (WNA)';
					}
					?>
					<label class="col-8"><?= $wn; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Anak Ke :</label>
					<label class="col-1"><?= $bio['anakke']; ?></label>
					<label class="col-3 text-end">Dari :</label>
					<label class="col-1"><?= $bio['jumlahsaudara']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Status Anak :</label>
					<label class="col-8">Anak <?= ucfirst($bio['statusanak']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Jumlah Saudara Kandung :</label>
					<label class="col-8"><?= $bio['jumlahkandung']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Jumlah Saudara Tiri :</label>
					<label class="col-8"><?= $bio['jumlahtiri']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Bahasa :</label>
					<label class="col-8"><?= $bio['bahasa']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Alamat :</label>
					<label class="col-8"><?= $bio['alamatsiswa']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Kodepos :</label>
					<label class="col-8"><?= $bio['kodepossiswa']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Jarak Ke Sekolah :</label>
					<label class="col-8"><?= $bio['jarak']; ?> Km.</label>
				</div>
				<div class="row">
					<label class="col-4 text-end">No. HP :</label>
					<label class="col-8"><?= $bio['hpsiswa']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">No. Telpon :</label>
					<label class="col-8"><?= $bio['telponsiswa']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Email :</label>
					<label class="col-8"><?= $bio['emailsiswa']; ?></label>
				</div>

				<div class="card-header border-0 pb-0 mb-3">
					<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
						<i class="fa-regular fa-square-check me-2"></i>
						Data Sekolah Calon Peserta Didik
					</h4>
				</div>
				<div class="row">
					<label class="col-4 text-end">Asal Sekolah :</label>
					<label class="col-8"><?= $bio['asalsekolah']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Nomor Ijazah :</label>
					<label class="col-2"><?= $bio['noijasah']; ?></label>
					<label class="col-2 text-end">Tanggal Ijazah :</label>
					<?php
					if ($bio['tglijasah'] != '0000-00-00') {
						$tgl_i = tanggal_indo($bio['tglijasah']);
					} else {
						$tgl_i = '';
					}
					?>
					<label class="col-4"><?= $tgl_i; ?></label>
				</div>

				<div class="card-header border-0 pb-0 mb-3">
					<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
						<i class="fa-regular fa-square-check me-2"></i>
						Riwayat Kesehatan
					</h4>
				</div>
				<div class="row">
					<label class="col-4 text-end">Golongan Darah :</label>
					<label class="col-8"><?= $bio['darah']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Berat :</label>
					<label class="col-8"><?= $bio['berat']; ?> Kg.</label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Tinggi :</label>
					<label class="col-8"><?= $bio['tinggi']; ?> Cm.</label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Riwayat Penyakit :</label>
					<label class="col-8"><?= $bio['kesehatan']; ?></label>
				</div>

				<div class="card-header border-0 pb-0 mb-3">
					<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
						<i class="fa-regular fa-square-check me-2"></i>
						Data Orang Tua/Wali
					</h4>
				</div>
				<div class="row">
					<label class="col-4 text-end">Nama Ayah :</label>
					<label class="col-8"><?= $bio['namaayah']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Tempat, Tanggal Lahir :</label>
					<?php
					if ($bio['tgllahirayah'] != '0000-00-00') {
						$tgl_a = tanggal_indo($bio['tgllahirayah']);
					} else {
						$tgl_a = '';
					}
					?>
					<label class="col-8"><?= $bio['tmplahirayah'] . ', ' . $tgl_a; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Status Ayah :</label>
					<label class="col-8">Ayah <?= ucfirst($bio['statusayah']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Pendidikan :</label>
					<label class="col-8"><?= strtoupper($bio['pendidikanayah']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Penghasilan Ayah :</label>
					<?php
					switch ($bio['penghasilanayah']) {
						case '1000000':
							$penghasilan = 'dibawah Rp.1.000.000';
							break;
						case '2000000':
							$penghasilan = 'Rp.1.000.000 - Rp.1.999.999';
							break;
						case '3000000':
							$penghasilan = 'Rp.2.000.000 - Rp.2.999.999';
							break;
						case '5000000':
							$penghasilan = 'Rp.3.000.000 - Rp.4.999.999';
							break;
						case '1000000':
							$penghasilan = 'Rp.5.000.000 - Rp.9.999.999';
							break;
						case '1000001':
							$penghasilan = 'diatas Rp.10.000.000';
							break;
						default:
							$penghasilan = '';
							break;
					}
					?>
					<label class="col-8"><?= $penghasilan; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Email Ayah :</label>
					<label class="col-8"><?= $bio['emailayah']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">HP Ayah :</label>
					<label class="col-8"><?= $bio['hpayah']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Nama Ibu :</label>
					<label class="col-8"><?= $bio['namaibu']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Tempat, Tanggal Lahir :</label>
					<?php
					if ($bio['tgllahiribu'] != '0000-00-00') {
						$tgl_ib = tanggal_indo($bio['tgllahiribu']);
					} else {
						$tgl_ib = '';
					}
					?>
					<label class="col-8"><?= $bio['tmplahiribu'] . ', ' . $tgl_ib; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Status Ibu :</label>
					<label class="col-8">Ibu <?= ucfirst($bio['statusibu']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Pendidikan :</label>
					<label class="col-8"><?= strtoupper($bio['pendidikanibu']); ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Penghasilan Ibu :</label>
					<?php
					switch ($bio['penghasilanayah']) {
						case '1000000':
							$penghasilan_i = 'dibawah Rp.1.000.000';
							break;
						case '2000000':
							$penghasilan_i = 'Rp.1.000.000 - Rp.1.999.999';
							break;
						case '3000000':
							$penghasilan_i = 'Rp.2.000.000 - Rp.2.999.999';
							break;
						case '5000000':
							$penghasilan_i = 'Rp.3.000.000 - Rp.4.999.999';
							break;
						case '1000000':
							$penghasilan_i = 'Rp.5.000.000 - Rp.9.999.999';
							break;
						case '1000001':
							$penghasilan_i = 'diatas Rp.10.000.000';
							break;
					}
					?>
					<label class="col-8"><?= $penghasilan_i; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Email Ibu :</label>
					<label class="col-8"><?= $bio['emailibu']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">HP Ibu :</label>
					<label class="col-8"><?= $bio['hpibu']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Alamat Orang Tua :</label>
					<label class="col-8"><?= $bio['alamatortu']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Nama Wali :</label>
					<label class="col-8"><?= $bio['namawali']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Tempat, Tanggal Lahir :</label>
					<?php
					if ($bio['tgllahirwali'] != '0000-00-00') {
						$tgl_w = tanggal_indo($bio['tgllahirwali']);
					} else {
						$tgl_w = '';
					}
					?>
					<label class="col-8"><?= $tgl_w; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Alamat :</label>
					<label class="col-8"><?= $bio['alamatwali']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Pekerjaan :</label>
					<label class="col-8"><?= $bio['pekerjaanwali']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Penghasilan :</label>
					<?php
					switch ($bio['penghasilanayah']) {
						case '1000000':
							$penghasilan_w = 'dibawah Rp.1.000.000';
							break;
						case '2000000':
							$penghasilan_w = 'Rp.1.000.000 - Rp.1.999.999';
							break;
						case '3000000':
							$penghasilan_w = 'Rp.2.000.000 - Rp.2.999.999';
							break;
						case '5000000':
							$penghasilan_w = 'Rp.3.000.000 - Rp.4.999.999';
							break;
						case '1000000':
							$penghasilan_w = 'Rp.5.000.000 - Rp.9.999.999';
							break;
						case '1000001':
							$penghasilan_w = 'diatas Rp.10.000.000';
							break;
					}
					?>
					<label class="col-8"><?= $penghasilan_w; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Email :</label>
					<label class="col-8"><?= $bio['emailwali']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">No. HP :</label>
					<label class="col-8"><?= $bio['hpwali']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Alamat :</label>
					<label class="col-8"><?= $bio['alamatwali']; ?></label>
				</div>

				<div class="card-header border-0 pb-0 mb-3">
					<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
						<i class="fa-regular fa-square-check me-2"></i>
						Informasi Tambahan
					</h4>
				</div>
				<div class="row">
					<label class="col-4 text-end">Hobi :</label>
					<label class="col-8"><?= $bio['hobi']; ?></label>
				</div>
				<div class="row">
					<label class="col-4 text-end">Keterangan :</label>
					<label class="col-8"><?= $bio['keterangan']; ?></label>
				</div>
			</div>
		</div>
		<div class="col-2">
			<div class="row">
				<?php
				if ($bio['foto'] == '') {
					$foto = 'student.jpg';
				} else {
					$foto = $bio['foto'];
				}
				?>
				<img src="<?= base_url('upload/foto/' . $foto) ?>" class="img-thumbnail mb-3" alt="Foto">
				<img src="<?= base_url('dashboard/set_barcode/' . $bio['nopendaftaran']) ?>">
				<?php
				if ($bio['is_proses'] == 5) {
					echo '<button class="btn-primary text-uppercase mt-3">Diterima</button>';
				}
				?>
			</div>

		</div>

	</div>
</div>
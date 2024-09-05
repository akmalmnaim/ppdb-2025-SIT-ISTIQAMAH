<style>
	label {
		position: relative;
	}




	.colon-label:after {
		content: ":";
		position: absolute;
		right: -80px;
		top: 0;

	}

	.sub-row-colon-label:after {
		content: ":";
		position: absolute;
		right: -55px;
		top: 0;

	}

	/* Add counter reset */
	.row-counter {
		counter-reset: row-num;
	}

	/* Add counter increment and display */
	.row-counter .row {
		counter-increment: row-num;
	}

	.row-counter .row label.col-4.text-left::before {
		content: counter(row-num) ". ";
	}

	/* Add sub-counter reset */
	.sub-row-counter {
		counter-reset: sub-row-num;
	}

	/* Add sub-counter increment and display */
	.sub-row-counter .sub-row {
		counter-increment: sub-row-num;
	}

	.sub-row-counter .sub-row label.col-4.text-left::before {
		content: counter(sub-row-num, lower-alpha) ". ";
		text-indent: 20px;
	}
</style>
<div class="col-12">
	<div class="row-counter">
		<div class="col-12">
			<label class="text-uppercase mb-3"><strong>A. Biodata Siswa</strong></label>
		</div>

		<div class="row">
			<label class="col-4 text-left ">Nama Siswa </label>
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Nama Lengkap </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $bio['nama']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Panggilan </label>
					<span class="col-8 " style="position: relative;left: 65px;"><?= $bio['panggilan']; ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Jenis Kelamin </label>
			<?php
			if ($bio['kelamin'] == 'l') {
				$kelamin = "Laki-laki";
			} else {
				$kelamin = "Perempuan";
			}

			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $kelamin; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label" style=" white-space: nowrap;">Tempat, Tanggal Lahir </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $bio['tmplahir'] . ', ' . tanggal_indo($bio['tgllahir']); ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Agama </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= ucfirst($bio['agama']); ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kewarganegaraan </label>
			<?php
			if ($bio['warga'] == 'wni') {
				$wn = 'Warga Negara Indonesia (WNI)';
			} else {
				$wn = 'Warga Negara Asing (WNA)';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $wn; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Bahasa Sehari-hari</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $bio['bahasa']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Anak Keberapa </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $bio['anakke']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label" style=" white-space: nowrap;">Jumlah saudara kandung </label>
			<label class="col-1" style="position: relative;left: 80px;"><?= $bio['jumlahsaudara']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label" style=" white-space: nowrap;">Jumlah saudara tiri </label>
			<label class="col-1" style="position: relative;left: 80px;"><?= $bio['jumlahtiri']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label" style=" white-space: nowrap;">Jumlah saudara angkat </label>
			<label class="col-1" style="position: relative;left: 80px;"><?= $bio['jumlahangkat']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label" style=" white-space: nowrap;">Anak Yatim/Piatu/ Yatim Piatu
			</label>
			<label class="col-1" style="position: relative;left: 80px;"><?= $bio['isyatim']; ?></label>
		</div>
		<div class="col-12">
			<label class="text-uppercase mb-3"><strong>B. Keterangan Tempat Tinggal</strong></label>
		</div>

		<div class="row">
			<label class="col-4 text-left ">Alamat Lengkap </label>
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Jalan /RT / No </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $bio['alamatsiswa']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kelurahan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $bio['kelurahan']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kecamatan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $bio['kecamatan']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kota / Kode Pos</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= "Kota Balikpapan" . ' / ' . $bio['kodepossiswa'] ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">No Telepon </label>
			<label class="col-8" style="position: relative;left: 80px;"></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Jarak tempat tinggal ke sekolah </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $bio['jarak']; ?> Km.</label>
		</div>

		<div class="row">
			<label class="col-4 text-left colon-label">Tinggal Bersama </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $bio['tinggal']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Moda Transportasi </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $bio['modatransportasi']; ?></label>
		</div>
		<div class="col-12">
			<label class="text-uppercase mb-3"><strong>C. Keterangan Kesehatan</strong></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Golongan Darah </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $kesehatan['golongandarah']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label"> Penyakit yang pernah diderita
				(TBC/Cacar/Malaria dan lain – lain) </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $kesehatan['riwayatsakit']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kelainan Jasmani </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $kesehatan['kelainanjasmani']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Tinggi dan Berat Badan </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $kesehatan['tb'] . ' dan ' . $kesehatan['bb'] ?></label>
		</div>
		<div class="col-12">
			<label class="text-uppercase mb-3"><strong>D. Keterangan Pendidikan </strong></label>
		</div>
		<div class="row">
			<label class="col-4 text-left" style="display: block; white-space: nowrap;">Pendidikan Sebelumnya</label>
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Lulusan dari </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $sekolahasal['sekolahasal']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Tanggal dan No Ijazah </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= tanggal_indo($sekolahasal['tglijazah']) . ' - ' . $sekolahasal['noijazah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Lama Belajar</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $sekolahasal['lamabelajar']; ?></span>
				</div>
			</div>
			<label class="col-4 text-left" style="display: block; white-space: nowrap;">Pindahan (diisi apabila murid pindahan)</label>
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Dari Sekolah </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $sekolahasal['sekolahsebelumnya']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Alasan </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $bio['alasan_pindah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Lama Belajar</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $sekolahasal['lamabelajar']; ?></span>
				</div>
			</div>

		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Diterima di Sekolah Ini(*diisi oleh sekolah)</label>
			<label class="col-8" style="position: relative;left: 80px;"></label>
		</div>
		<div class="col-12">
			<label class="text-uppercase mb-3"><strong><?= 'E. Keterangan Tentang Ayah ' . strtoupper(htmlspecialchars($ortu['statusayah'])); ?></strong></label>
		</div>

		<div class="row">
			<label class="col-4 text-left colon-label">Nama Ayah</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['namaayah']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Tempat, Tanggal Lahir </label>
			<?php
			if ($ortu['tgllahirayah'] != '0000-00-00') {
				$tgl_a = tanggal_indo($ortu['tgllahirayah']);
			} else {
				$tgl_a = '';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['tmpayah'] . ', ' . $tgl_a; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Agama</label>
			<label class="col-8" style="position: relative;left: 80px;">Islam</label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kewarnegaraan</label>
			<?php
			if ($ortu['wargaayah'] == 'wni') {
				$wn = 'Warga Negara Indonesia (WNI)';
			} else {
				$wn = 'Warga Negara Asing (WNA)';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $wn; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Pendidikan </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['pendidikanayah']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left" style="display: block; white-space: nowrap;">Pekerjaan</label>
		</div>
		<div class="row">
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Pekerjaan Saat Ini </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['pekerjaanayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Nama Perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['namaperusahaanayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Jabatan dan Bagian (Departemen) </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['namaperusahaanayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Alamat Perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['alamatperusahaanayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kota perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kotaperusahaanayah']; ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left " style="display: block; white-space: nowrap;">Alamat Rumah Lengkap </label>
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Jalan /RT / No </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['alamatayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kelurahan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kelurahanayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kecamatan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kecamatanayah']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kota / Kode Pos</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kota_ayah'] . ' / ' . $ortu['kodeposayah'] ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">No Telp/No HP </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['teleponayah'] . '/' . $ortu['wa_ayah']; ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Hidup / Meninggal Dunia (Tahun) </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['keteranganhidupayah']; ?></label>
		</div>


		<div class="col-12">
			<label class="text-uppercase mb-3"><strong><?= 'F. Keterangan Tentang ibu ' . strtoupper(htmlspecialchars($ortu['statusibu'])); ?></strong></label>
		</div>

		<div class="row">
			<label class="col-4 text-left colon-label">Nama ibu</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['namaibu']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Tempat, Tanggal Lahir </label>
			<?php
			if ($ortu['tgllahiribu'] != '0000-00-00') {
				$tgl_a = tanggal_indo($ortu['tgllahiribu']);
			} else {
				$tgl_a = '';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['tmpibu'] . ', ' . $tgl_a; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Agama</label>
			<label class="col-8" style="position: relative;left: 80px;">Islam</label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kewarnegaraan</label>
			<?php
			if ($ortu['wargaibu'] == 'wni') {
				$wn = 'Warga Negara Indonesia (WNI)';
			} else {
				$wn = 'Warga Negara Asing (WNA)';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $wn; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Pendidikan </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['pendidikanibu']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left" style="display: block; white-space: nowrap;">Pekerjaan</label>
		</div>
		<div class="row">
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Pekerjaan Saat Ini </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['pekerjaanibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Nama Perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['namaperusahaanibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Jabatan dan Bagian (Departemen) </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['namaperusahaanibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Alamat Perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['alamatperusahaanibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kota perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kotaperusahaanibu']; ?></span>
				</div>sekolahasal
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left ">Alamat Rumah Lengkap </label>
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Jalan /RT / No </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['alamatibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kelurahan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kelurahanibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kecamatan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kecamatanibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kota / Kode Pos</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kota_ibu'] . ' / ' . $ortu['kodeposibu']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">No Telp/No HP </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['teleponibu'] . '/' . $ortu['wa_ibu']; ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label" style="white-space: nowrap;">Hidup / Meninggal Dunia (Tahun)</label> <label class="col-8" style="position: relative;left: 80px;"><?= $ortu['keteranganhidupibu']; ?></label>
		</div>

		<div class="col-12">
			<label class="text-uppercase mb-3"><strong> G. Keterangan Tentang wali </strong></label>
		</div>

		<div class="row">
			<label class="col-4 text-left colon-label">Nama wali</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['namawali']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Tempat, Tanggal Lahir </label>
			<?php
			if ($ortu['tgllahirwali'] != '0000-00-00') {
				$tgl_a = tanggal_indo($ortu['tgllahirwali']);
			} else {
				$tgl_a = '';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['tmpwali'] . ', ' . $tgl_a; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Agama</label>
			<label class="col-8" style="position: relative;left: 80px;">Islam</label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kewarnegaraan</label>
			<?php
			if ($ortu['wargawali'] == 'wni') {
				$wn = 'Warga Negara Indonesia (WNI)';
			} else {
				$wn = 'Warga Negara Asing (WNA)';
			}
			?>
			<label class="col-8" style="position: relative;left: 80px;"><?= $wn; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Pendidikan </label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $ortu['pendidikanwali']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left" style="display: block; white-space: nowrap;">Pekerjaan</label>
		</div>
		<div class="row">
			<div class="sub-row-counter" style=" margin-left: 20px;">
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Pekerjaan Saat Ini </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['pekerjaanwali']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Nama Perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['namaperusahaanwali']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Jabatan dan Bagian (Departemen) </label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['namaperusahaanwali']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Alamat Perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['alamatperusahaanwali']; ?></span>
				</div>
				<div class="sub-row">
					<label class="col-4 text-left sub-row-colon-label">Kota perusahaan</label>
					<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kotaperusahaanwali']; ?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<label class="col-4 text-left " style="white-space: nowrap;">Alamat Rumah Lengkap </label>
		</div>
		<div class="sub-row-counter" style=" margin-left: 20px;">
			<div class="sub-row">
				<label class="col-4 text-left sub-row-colon-label">Jalan /RT / No </label>
				<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['alamatwali']; ?></span>
			</div>
			<div class="sub-row">
				<label class="col-4 text-left sub-row-colon-label">Kelurahan</label>
				<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kelurahanwali']; ?></span>
			</div>
			<div class="sub-row">
				<label class="col-4 text-left sub-row-colon-label">Kecamatan</label>
				<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kecamatanwali']; ?></span>
			</div>
			<div class="sub-row">
				<label class="col-4 text-left sub-row-colon-label">Kota / Kode Pos</label>
				<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['kotawali'] . ' / ' . $ortu['kodeposwali'] ?></span>
			</div>
			<div class="sub-row">
				<label class="col-4 text-left sub-row-colon-label">No Telp/No HP </label>
				<span class="col-8" style="position: relative;left: 65px;"><?= $ortu['teleponwali'] . '/' . $ortu['wa_wali']; ?></span>
			</div>
		</div>
		<div class="col-12">
			<label class="text-uppercase mb-3"><strong> H. Keterangan Tentang wali </strong></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kesenian</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $tambah['seni']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Olah Raga</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $tambah['olahraga']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Kemasyarakatan / Organisasi</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $tambah['organisasi']; ?></label>
		</div>
		<div class="row">
			<label class="col-4 text-left colon-label">Cita-cita</label>
			<label class="col-8" style="position: relative;left: 80px;"><?= $tambah['cita']; ?></label>
		</div>
	</div>
	<br><br><br><br>
	<span style="float:right;">Balikpapan, ...............................</span><br><br><br><br><br><br>
	<span style="float:right;">( Orangtua / Wali Murid )</span>
</div>


</div>
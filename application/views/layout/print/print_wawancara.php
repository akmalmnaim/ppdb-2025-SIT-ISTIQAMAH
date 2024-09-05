<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title -->
	<title>Wawancara</title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">

	<!-- All StyleSheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-blOohCVdhjmtROpu8+CfTnUWham9nkX7P7OZQMst+RUnhtoY/9qemFAkIKOYxDI3" crossorigin="anonymous">

	<!-- Globle CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- 	<link href="<?= base_url() ?>assets/backend/css/style.css" rel="stylesheet">	 -->
</head>

<body style="font-family: 'Times New Roman', Times, serif;">
	<div class="container">
		<div class="row mb-3">
			<div class="col-2 text-end">
				<img src="<?= base_url() ?>assets/img/logosekolah.png" width="150">
			</div>
			<div class="col-10">
				<h4 class="text-uppercase text-muted mb-0 mt-0 text-center">Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</h4>
				<!-- <h2 class="mb-0 mt-0 text-uppercase text-muted">Sit Istiqamah Balikpapan</h2> -->
				<h3 class="text-uppercase text-muted mb-0 mt-0 text-center">SDIT-SMPIT-SMAIT Istiqamah Balikpapan</h3>
				<div class="mb-0 mt-0 text-center">
					<small>Jl. Syarifuddin Yoes No.1 RT.41 Kel. Gunung Bahagia, Balikpapan Selatan</small>
				</div>
				<div class="mb-0 mt-0 text-center">
					<small>Telp. (0542)8513734 / 733129, 081298781997</small>
				</div>
				<!-- <p class="mb-0 mt-0 text-center"><small>Jl. Syarifuddin Yoes No.1 RT.41 Kel. Gunung Bahagia, Balikpapan Selatan</small></p>
				<p class="mb-0 mt-0 text-center"><small>Telp.(0542)8513734 / 733129, 081298781997</small></p>
				<p class="mb-0 mt-0 text-center"><small>Email: sdit@istiqamahypaitb.sch.id / smpit@istiqamahypaitb.sch.id / smait@istiqamahypaitb.sch.id</small></p> -->
				<!-- <small class="me-2"><i class="fa fa-phone me-2"></i>(0542) 8513734 - 733129</small>
				<small class="me-2"><i class="fa fa-envelope me-2"></i>istiqamah.ypaitb@gmail.com</small>
				<small><i class="fa fa-globe me-2"></i>https://istiqamahypaitb.sch.id</small> -->
			</div>
		</div>
		<!-- <div class="border-top"></div> -->
		<div class="row mt-5">
			<div class="row mt-5">
				<div class="col-12">
					<h4 class="text-uppercase mb-0 mt-0 text-center"> <strong>Wawancara</strong></h4>
				</div>
				<div class="col-12">
					<h4 class="text-uppercase mb-0 mt-0 text-center"><strong>Penerimaan Peserta Didik Baru (PPDB) dan Pindahan</strong></h4>
				</div>
				<div class="col-12">
					<h4 class="text-uppercase mb-0 mt-0 text-center"><strong>Tahun Pelajaran 2025/2026</strong></h4>
				</div>
			</div>
			<div class="container mt-5">
				<div class="row mb-5">
					<div class="col-12" style="border: 5px solid black; font-size: 18px;">
						<div class="row mb-2 mt-3">
							<div class="col-1"></div>
							<div class="col-4">Nama Calon Peserta Didik</div>
							<div class="col-7 text-uppercase">: <?= $anak['namaanak'] ?></div>
						</div>
						<div class="row mb-2">
							<div class="col-1"></div>
							<div class="col-4">Nama Panggilan</div>
							<div class="col-7">: <?= $anak['panggilan'] ?></div>
						</div>
						<div class="row mb-2">
							<div class="col-1"></div>
							<div class="col-4">Jenjang Pendidikan</div>
							<div class="col-3 text-uppercase">: <?= $anak['departemen'] ?></div>
							<div class="col-1">/ Kelas</div>
							<div class="col-3">: <?= $anak['kelas'] ?></div>
						</div>
						<div class="row mb-2">
							<div class="col-1"></div>
							<div class="col-4">Asal Sekolah</div>
							<div class="col-6">: <?= $sekolah['sekolahasal'] ?></div>
						</div>
						<div class="row mb-2">
							<div class="col-1"></div>
							<div class="col-4">
								<h4><strong>No. Pendaftaran</strong></h4>
							</div>
							<div class="col-7">
								<h4 class="text-uppercase"><strong>: <?= $anak['nopendaftaran'] ?></strong></h4>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-1"></div>
							<div class="col-4">
								<h4><strong>Proses Penerimaan</strong></h4>
							</div>
							<div class="col-7">
								<h4 class="text-uppercase"><strong>: <?= $anak['proses'] ?></strong></h4>
							</div>
						</div>
					</div>
				</div>


				<?php if ($latarbelakang['jenis_penerimaan'] == 1) { ?>

				<?php } else { ?>
				<?php } ?>
			</div>
			<?php if ($latarbelakang['jenis_penerimaan'] == 2) { ?>
				<div class="row">
					<div class="col-12 text-center">
						<img src="<?= base_url('assets/img/wawancara/bg_1.png') ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-center">
						<img src="<?= base_url('assets/img/wawancara/bg_2.png') ?>">
					</div>
				</div>
				<div class="row" style="page-break-after: always; page-break-before: always;">
					<div class="col-12">
						<img src="<?= base_url('assets/img/wawancara/f_02.jpg') ?>" width="1024">
					</div>
				</div>
				<div class="row" style="page-break-after: always; page-break-before: always;">
					<div class="col-12">
						<img src="<?= base_url('assets/img/wawancara/f_03.jpg') ?>" width="1024">
					</div>
				</div>
				<div class="row" style="page-break-after: always; page-break-before: always;">
					<div class="col-12">
						<img src="<?= base_url('assets/img/wawancara/f_04.jpg') ?>" width="1024">
					</div>
				</div>
			<?php } else { ?>
				<div class="row" style="page-break-after: always; page-break-before: always;">
					<div class="col-12">
						<img src="<?= base_url('assets/img/wawancara/f03i.jpg') ?>" width="1024">
					</div>
				</div>
			<?php } ?>


			<div class="row" style="page-break-after: always; page-break-before: always;">
				<div class="col-12">
					<label class="text-uppercase mb-3"><strong>A. Profil Orang Tua / Wali</strong></label>
				</div>
				<div class="col-12">
					<table class="table table-bordered table-striped">
						<thead>
							<tr class="text-uppercase text-center">
								<th width="100px">No</th>
								<th width="500px">Data</th>
								<th width="500px">Ayah</th>
								<th width="500px">Ibu</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<tr>
								<td>1.</td>
								<td class="text-left">Nama Lengkap</td>
								<td><?= $ortu['namaayah']; ?></td>
								<td><?= $ortu['namaibu']; ?></td>
							</tr>
							<tr>
								<td>2.</td>
								<td class="text-left">Tempat, Tanggal Lahir</td>
								<?php
								if ($ortu['tgllahirayah'] != '0000-00-00') {
									$tglayah = tanggal_indo($ortu['tgllahirayah']);
								} else {
									$tglayah = '';
								}
								if ($ortu['tgllahiribu'] != '0000-00-00') {
									$tglibu = tanggal_indo($ortu['tgllahirayah']);
								} else {
									$tglibu = '';
								}
								?>
								<td><?= $ortu['tmpayah'] . ', ' . $tglayah ?></td>
								<td><?= $ortu['tmpibu'] . ', ' . $tglibu ?></td>
							</tr>
							<tr>
								<td rowspan="5">3.</td>
								<td class="text-left">Alamat Rumah</td>
								<td><?= $ortu['alamatayah'] . ', ' . $ortu['kelurahanayah'] . ', ' . $ortu['kecamatanayah'] . ',' . $ortu['kodeposayah'] . ',' . $ortu['kota_ayah'] ?></td>
								<td><?= $ortu['alamatibu'] . ', ' . $ortu['kelurahanibu'] . ', ' . $ortu['kecamatanibu'] . ',' . $ortu['kodeposibu'] . ',' . $ortu['kota_ibu'] ?></td>
							</tr>
							<tr>
								<td class="text-left">No. Telpon Rumah</td>
								<td><?= $anak['telponsiswa'] ?></td>
								<td><?= $anak['telponsiswa'] ?></td>
							</tr>
							<tr>
								<td class="text-left">No. HP / WA</td>
								<td><?= $ortu['wa_ayah'] ?></td>
								<td><?= $ortu['wa_ibu'] ?></td>
							</tr>
							<!-- <tr>
								<td class="text-left">No. Fax</td>
								<td></td>
								<td></td>
							</tr> -->
							<tr>
								<td class="text-left">Email Pribadi</td>
								<td><?= $ortu['email_ayah'] ?></td>
								<td><?= $ortu['email_ibu'] ?></td>

							</tr>
							<tr>
								<td class="text-left">Status rumah tinggal</td>
								<td><?= $ortu_t['statusrumahayah']
									?></td>
								<td><?= $ortu_t['statusrumahibu']
									?></td>
							</tr>
							<tr>
								<td rowspan="9">4.</td>
								<td class="text-left">Pekerjaan sekarang</td>
								<td><?= $ortu['pekerjaanayah'] ?></td>
								<td><?= $ortu['pekerjaanibu'] ?></td>
							</tr>
							<tr>
								<td class="text-left">Nama Perusahaan</td>
								<td><?= $ortu['namaperusahaanayah'] ?></td>
								<td><?= $ortu['namaperusahaanibu'] ?></td>
							</tr>
							<tr>
								<td class="text-left">Jabatan dan Bagian (Departement)</td>
								<td><?= $ortu['jabatanayah'] ?></td>
								<td><?= $ortu['jabatanayah'] ?></td>
							</tr>
							<tr>
								<td class="text-left">Alamat Perusahaan</td>
								<td><?= $ortu['alamatperusahaanayah'] ?></td>
								<td><?= $ortu['alamatperusahaanibu'] ?></td>
							</tr>
							<tr>
								<td class="text-left">No. Telepon Kantor</td>
								<td><?= $ortu['notelpperusahaanayah'] ?></td>
								<td><?= $ortu['notelpperusahaanibu'] ?></td><!--belum-->
							</tr>
							<tr>
								<td class="text-left">No. Fax</td>
								<td><?= $ortu['nofaxperusahaanayah'] ?></td><!--belum-->
								<td><?= $ortu['nofaxperusahaanibu'] ?></td><!--belum-->
							</tr>
							<tr>
								<td class="text-left">Email Kantor</td>
								<td><?= $ortu['emailperusahaanayah'] ?></td><!--belum-->
								<td><?= $ortu['emailperusahaanibu'] ?></td><!--belum-->
							</tr>
							<tr>
								<td class="text-left">Jarak rumah tinggal dengan tempat bekerja (Perkiraan) </td>
								<td>Kira-kira <?= $ortu_t['jaraktempatkerjaayah'] ?> Km.</td>
								<td>Kira-kira <?= $ortu_t['jaraktempatkerjaibu'] ?> Km.</td>
							</tr>
							<tr>
								<td class="text-left">Pergi/Pulang ke tempat bekerja dengan ……..</td>
								<td><?= $ortu_t['modakerjaayah'] ?></td>
								<td><?= $ortu_t['modakerjaibu'] ?></td>
							</tr>
							<tr>
								<td rowspan="3">5.</td>
								<td class="text-left">Pendidikan terakhir</td>
								<td><?= strtoupper($ortu['pendidikanayah']) . ' - ' . strtoupper($ortu['sekolahayah']); ?></td>
								<td><?= strtoupper($ortu['pendidikanayah']) . ' - ' . strtoupper($ortu['sekolahibu']); ?></td>
							</tr>
							<tr>
								<td class="text-left">Jurusan dan Fakultas</td>
								<td><?= $ortu['jurusanayah']; ?></td>
								<td><?= $ortu['jurusanibu']; ?></td>
							</tr>
							<tr>
								<td class="text-left">Profesi / Keterampilan lain</td>
								<td><?= $ortu['pekerjaanayah']; ?></td>
								<td><?= $ortu['pekerjaanibu']; ?></td>
							</tr>
							<tr>
								<td>6.</td>
								<td class="text-left">Asal daerah (suku bangsa)</td>
								<td><?= $ortu_t['asaldaerahayah']; ?></td>
								<td><?= $ortu_t['asaldaerahibu']; ?></td>

							</tr>
							<tr>
								<td>7.</td>
								<td class="text-left">Bahasa asing yang dikuasai</td>
								<td><?= $ortu_t['bahasaasingayah']; ?></td>
								<td><?= $ortu_t['bahasaasingibu']; ?></td>

							</tr>
							<tr>
								<td>8.</td>
								<td class="text-left">Pendidikan agama yang pernah di tempuh (di madrasah/masjid)</td>
								<td><?= $ortu_t['pendidikanagamaayah']; ?></td>
								<td><?= $ortu_t['pendidikanagamaibu']; ?></td>

							</tr>
							<tr>
								<td rowspan="2">9.</td>
								<td class="text-left">Kemampuan membaca Al-Qur’an</td>
								<td><?= $ortu_t['statusbacaquranayah']; ?></td>
								<td><?= $ortu_t['statusbacaquranibu']; ?></td>

							</tr>
							<tr>
								<td class="text-left">Kursus Peningkatan membaca Al-Qur’an dan artinya, jika ada, apakah bersedia bergabung?</td>
								<td><?= $ortu_t['kursusmauayah']; ?></td>
								<td><?= $ortu_t['kursusmauibu']; ?></td>

							</tr>
							<tr>
								<td>10.</td>
								<td class="text-left">Pernah Haji / Umrah (berapa kali?)</td>
								<td><?= $ortu_t['jumlahhajiayah']; ?></td>
								<td><?= $ortu_t['jumlahhajiibu']; ?></td>

							</tr>
							<tr>
								<td>11.</td>
								<td class="text-left">Shalat di masjid / di rumah</td>
								<td><?= $ortu_t['sholatdiayah']; ?></td>
								<td><?= $ortu_t['sholatdiibu']; ?></td>

							</tr>
							<tr>
								<td>12.</td>
								<td class="text-left">Aktivitas Organisasi Islam / Majelis Ta’lim / Masjid</td>
								<td><?= $ortu_t['organisasiayah']; ?></td>
								<td><?= $ortu_t['organisasiibu']; ?></td>

							</tr>
							<tr>
								<td>13.</td>
								<td class="text-left">Buku / Majalah / Surat kabar / internet Islam yang dibaca</td>
								<td><?= $ortu_t['bacaanayah']; ?></td>
								<td><?= $ortu_t['bacaanibu']; ?></td>

							</tr>
						</tbody>
					</table>
				</div>


				<div class="col-12">
					<label class="text-uppercase mb-3"><strong>B. Tentang Peserta Didik</strong></label>
				</div>
				<div class="col-12">
					<table class="table table-bordered table-striped">
						<thead>
							<tr class="text-uppercase text-center">
								<th width="300px">Nama</th>
								<th width="100px">Usia</th>
								<th width="500px">Hubungan Dengan Peserta Didik</th>
								<th width="300px">Keterangan</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<tr>
								<td><?= $anak['namaanak'] ?></td>
								<?php
								if ($anak['tgllahir'] != '0000-00-00') {
									$tgllahir = usia($anak['tgllahir']);
								} else {
									$tgllahir = '-';
								}
								?>
								<td><?= $tgllahir; ?></td>
								<td>Anak <?= $anak['statusanak'] ?></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-12">
					<label class="text-uppercase mb-3"><strong>C. Tentang Kakak/Adik Peserta Didik</strong></label>
				</div>
				<div class="col-12">
					<table class="table table-bordered table-striped">
						<thead>
							<tr class="text-uppercase text-center">
								<th width="300px">Nama</th>
								<th width="100px">Usia</th>
								<th width="500px">Nama Sekolah</th>
								<th width="300px">Kelas</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php foreach ($saudara as $s) { ?>
								<tr>
									<td><?= $s->namasaudara; ?></td>
									<td></td>
									<td><?= $s->namasekolah; ?></td>
									<td><?= $s->kelas_saudara; ?></td>
								</tr>

							<?php	}
							for ($i = 1; $i <= 5; $i++) { ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>

							<?php }
							?>
						</tbody>
					</table>
				</div>
				<div class="row" style="page-break-after: always; page-break-before: always;">

					<div class="col-12">
						<label class="text-uppercase mb-3"><strong>D. Latar Belakang</strong></label>
					</div>


					<div class="col-12">
						<table cellpadding="5" cellspacing="5">
							<tbody>
								<tr>
									<td style="vertical-align: top;">
										1.&nbsp;&nbsp;
									</td>
									<td class="text-left">Apa yang melatar belakangi (motivasi) Bapak/Ibu memasukkan putra/putri ke SDIT - SMPIT - SMAIT Istiqamah YPAIT Balikpapan?</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p1e']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										2.&nbsp;&nbsp;
									</td>
									<td class="text-left">Dari mana Bapak/Ibu mengenal SDIT - SMPIT - SMAIT Istiqamah YPAIT Balikpapan?</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p2e']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										3.&nbsp;&nbsp;
									</td>
									<td class="text-left">Apa harapan Bapak/Ibu dengan memasukkan ananda di SDIT – SMPIT - SMAIT Istiqamah YPAIT Balikpapan?</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p3e']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										4.&nbsp;&nbsp;
									</td>
									<td class="text-left">Sekiranya Bapak/Ibu tidak puas dengan sekolah, tindakan apa yang Bapak/Ibu akan lakukan?
									</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p4e']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										5.&nbsp;&nbsp;
									</td>
									<td class="text-left">Apa saran dan usaha Bapak/Ibu untuk ikut memajukan SDIT - SMPIT - SMAIT Istiqamah YPAIT
										Balikpapan?
									</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p5e']; ?></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										6.&nbsp;&nbsp;
									</td>
									<td class="text-left">Apakah ada yang menjanjikan putra-putri Bapak/Ibu untuk bisa masuk SDIT - SMPIT – SMAIT
										Istiqamah YPAIT Balikpapan?

									</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p6e']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										7.&nbsp;&nbsp;
									</td>
									<td class="text-left">Bersediakah Bapak/Ibu bila putra-putrinya diterima menjadi murid SDIT - SMPIT - SMAIT
										Istiqamah YPAIT Balikpapan memberikan kontribusi Non Materi (keahlian dibidang
										masing-masing Bapak/Ibu, bila ada) kepada sekolah bila sekolah memerlukannya?

									</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p7e']; ?></td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										8.&nbsp;&nbsp;
									</td>
									<td class="text-left">Apakah putra-putri Bapak/Ibu mempunyai hal khusus mengenai fisik/psikis/kesehatan
										yang perlu kami catat?
									</td>
								</tr>
								<tr style="height: 100px;">
									<td>

									</td>
									<td style="border: 1px solid black;"><?= $latarbelakang['p8e']; ?></td>
								</tr>

							</tbody>
						</table>

					</div>
				</div>
				<div class="row" style="page-break-after: always; page-break-before: always;">
					<img src="<?= base_url('assets/img/wawancara/f_05.jpg') ?>" width="1024">
				</div>
				<div class="row" style="page-break-after: always; page-break-before: always;">
					<img src="<?= base_url('assets/img/wawancara/f06.jpg') ?>" width="1024">
				</div>
				<?php if ($latarbelakang['jenis_penerimaan'] == 2) { ?>
					<div class="row" style="page-break-after: always; page-break-before: always;">
						<img src="<?= base_url('assets/img/wawancara/f_10.jpg') ?>" width="1024">
					</div>
					<div class="row" style="page-break-after: always; page-break-before: always;">
						<img src="<?= base_url('assets/img/wawancara/f_11.jpg') ?>" width="1024">
					</div>
				<?php } else { ?>
					<div class="row" style="page-break-after: always; page-break-before: always;">
						<img src="<?= base_url('assets/img/wawancara/f04i.jpg') ?>" width="1024">
					</div>
					<div class="row" style="page-break-after: always; page-break-before: always;">
						<img src="<?= base_url('assets/img/wawancara/f05i.jpg') ?>" width="1024">
					</div>
				<?php } ?>
			</div>


			<!-- <?= $cetak; ?> -->
		</div>
	</div>
	<script type="text/javascript">
		window.print();
		window.onafterprint = window.close;
	</script>
	</div>
</body>

</html>
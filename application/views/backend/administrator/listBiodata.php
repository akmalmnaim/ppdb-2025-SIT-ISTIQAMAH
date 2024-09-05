<div class="row">
	<div class="col-xl-12">
		<div class="profile-back">
			<img src="<?=base_url('assets/backend/assets/images/coverppdb.jpg')?>" alt="">
			<!-- <div class="social-btn">
				<a href="javascript:void(0);" class="btn btn-light social">245 Following</a>
				<a href="javascript:void(0);" class="btn btn-light social">872 Followers</a>
				<a href="javascript:void(0);" class="btn btn-primary">Update Profile</a>
			</div> -->
		</div>
		<div class="profile-pic d-flex">
			<img src="<?=base_url('upload/foto/'.$bio['foto'])?>" alt="">
			<div class="profile-info2">
				<h2 class="mb-0 text-uppercase"><?= $bio['nama']; ?></h2>
				<h4 class="text-uppercase text-white"><i class="fa fa-building me-2"></i><?= $bio['departemen']; ?></h4>
				<span class="d-block"><i class="fas fa-map-marker-alt me-2"></i><?= $bio['tmplahir'].", ".tanggal_indo($bio['tgllahir']); ?></span>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-xxl-4 col-lg-6 mt-5">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header text-lg-center text-muted border-0 pb-0">
						<h4 class="fs-20 text-uppercase">Proses Admisi</h4>
					</div>
					<div class="card-body pt-2">
						<div>
							<a href="<?= base_url('dashboard/printbio/').$bio['replid']?>" target="_blank" class="btn text-start d-block mb-3 bg-facebook light"><i class="fa fa-print scale5  text-facebook"></i>Cetak Profil</a>
							<a href="javascript:jadwal(`<?= $bio['replid']?>`);" class="btn text-start d-block mb-3 bg-linkedin light"><i class="fa fa-calendar scale5 text-linkedin"></i>Jadwal</a>
							<a href="javascript:upload(`<?= $bio['replid']?>`);" class="btn text-start d-block mb-3 bg-dribble light"><i class="fa fa-cloud-arrow-up scale5 text-dribble"></i>Upload Hasil</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-xxl-8 col-lg-6 mt-lg-5 mt-0 bio">
		<div class="row">
			<div class="col-xl-12 col-xxl-12">
				<div class="card">
					<div class="card-header border-bottom border-0 pb-0">
						<h4 class="fs-20 mb-0 text-uppercase text-muted">
							<i class="fa fa-user me-2"></i>
							Detail Pendaftar
						</h4>
					</div>
					<div class="card-body pt-2">
						<div class="card-header border-0 pb-0 mb-3">
							<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
								<i class="fa-regular fa-square-check me-2"></i>
								Data Pribadi Peserta Didik
							</h4>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end fs-20">No. Pendaftaran :</label>
							<label class="col-xl-8 fs-20 fw-bold text-muted"><?= $bio['nopendaftaran']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Mendaftar di :</label>
							<label class="col-xl-8 text-uppercase"><?= $bio['departemen']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nama Lengkap :</label>
							<label class="col-xl-8"><?= $bio['nama']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Panggilan :</label>
							<label class="col-xl-8"><?= $bio['panggilan']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Tempat, Tanggal Lahir :</label>
							<label class="col-xl-8"><?= $bio['tmplahir'].', '.tanggal_indo($bio['tgllahir']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nomor Induk Sekolah Nasional (NISN) :</label>
							<label class="col-xl-8"><?= $bio['nisn']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nomor Induk Kependudukan (NIK) :</label>
							<label class="col-xl-8"><?= $bio['nik']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Suku :</label>
							<label class="col-xl-8"><?= $bio['suku']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Agama :</label>
							<label class="col-xl-8"><?= ucfirst($bio['agama']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Status :</label>
							<label class="col-xl-8"><?= $bio['status']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Kondisi :</label>
							<?php 
							if($bio['kondisi'] == 'cukup') {
								$kondisi = 'Kurang Mampu';
							} else {
								$kondisi = 'Berkecukupan';
							}
							?>
							<label class="col-xl-8"><?= $kondisi; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Kewarganegaraan :</label>
							<?php 
							if($bio['warga'] == 'wni') {
								$wn = 'Warga Negara Indonesia (WNI)';
							} else {
								$wn = 'Warga Negara Asing (WNA)';
							}
							?>
							<label class="col-xl-8"><?= $wn; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Anak Ke :</label>
							<label class="col-xl-1"><?= $bio['anakke']; ?></label>
							<label class="col-xl-1 text-sm-start text-lg-end">Dari :</label>
							<label class="col-xl-1"><?= $bio['jumlahsaudara']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Status Anak :</label>
							<label class="col-xl-8">Anak <?= ucfirst($bio['statusanak']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Jumlah Saudara Kandung :</label>
							<label class="col-xl-8"><?= $bio['jumlahkandung']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Jumlah Saudara Tiri :</label>
							<label class="col-xl-8"><?= $bio['jumlahtiri']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Bahasa :</label>
							<label class="col-xl-8"><?= $bio['bahasa']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Alamat :</label>
							<label class="col-xl-8"><?= $bio['alamatsiswa']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Kodepos :</label>
							<label class="col-xl-8"><?= $bio['kodepossiswa']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Jarak Ke Sekolah :</label>
							<label class="col-xl-8"><?= $bio['jarak']; ?> Km.</label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">No. HP :</label>
							<label class="col-xl-8"><?= $bio['hpsiswa']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">No. Telpon :</label>
							<label class="col-xl-8"><?= $bio['telponsiswa']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Email :</label>
							<label class="col-xl-8"><?= $bio['emailsiswa']; ?></label>
						</div>

						<div class="card-header border-0 pb-0 mb-3">
							<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
								<i class="fa-regular fa-square-check me-2"></i>
								Data Sekolah Calon Peserta Didik
							</h4>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Asal Sekolah :</label>
							<label class="col-xl-8"><?= $bio['asalsekolah']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nomor Ijazah :</label>
							<label class="col-xl-2"><?= $bio['noijasah']; ?></label>
							<label class="col-xl-2 text-sm-start text-lg-end">Tanggal Ijazah :</label>
							<?php 
							if($bio['tglijasah'] !='0000-00-00')
							{
								$tgl_i = tanggal_indo($bio['tglijasah']);
							} else {
								$tgl_i ='';
							}
							?>
							<label class="col-xl-4"><?= $tgl_i; ?></label>
						</div>

						<div class="card-header border-0 pb-0 mb-3">
							<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
								<i class="fa-regular fa-square-check me-2"></i>
								Riwayat Kesehatan
							</h4>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Golongan Darah :</label>
							<label class="col-xl-8"><?= $bio['darah']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Berat :</label>
							<label class="col-xl-8"><?= $bio['berat']; ?> Kg.</label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Tinggi :</label>
							<label class="col-xl-8"><?= $bio['tinggi']; ?> Cm.</label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Riwayat Penyakit :</label>
							<label class="col-xl-8"><?= $bio['kesehatan']; ?></label>
						</div>

						<div class="card-header border-0 pb-0 mb-3">
							<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
								<i class="fa-regular fa-square-check me-2"></i>
								Data Orang Tua/Wali
							</h4>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nama Ayah :</label>
							<label class="col-xl-8"><?= $bio['namaayah']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Tempat, Tanggal Lahir :</label>
							<?php 
							if($bio['tgllahirayah'] !='0000-00-00')
							{
								$tgl_a = tanggal_indo($bio['tgllahirayah']);
							} else {
								$tgl_a ='';
							}
							?>
							<label class="col-xl-8"><?= $bio['tmplahirayah'].', '.$tgl_a; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Status Ayah :</label>
							<label class="col-xl-8">Ayah <?= ucfirst($bio['statusayah']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Pendidikan :</label>
							<label class="col-xl-8"><?= strtoupper($bio['pendidikanayah']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Penghasilan Ayah :</label>
							<?php 
							switch($bio['penghasilanayah']) {
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
							<label class="col-xl-8"><?= $penghasilan; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Email Ayah :</label>
							<label class="col-xl-8"><?= $bio['emailayah']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">HP Ayah :</label>
							<label class="col-xl-8"><?= $bio['hpayah']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nama Ibu :</label>
							<label class="col-xl-8"><?= $bio['namaibu']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Tempat, Tanggal Lahir :</label>
							<?php 
							if($bio['tgllahiribu'] !='0000-00-00')
							{
								$tgl_ib = tanggal_indo($bio['tgllahiribu']);
							} else {
								$tgl_ib ='';
							}
							?>
							<label class="col-xl-8"><?= $bio['tmplahiribu'].', '.$tgl_ib; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Status Ibu :</label>
							<label class="col-xl-8">Ibu <?= ucfirst($bio['statusibu']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Pendidikan :</label>
							<label class="col-xl-8"><?= strtoupper($bio['pendidikanibu']); ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Penghasilan Ibu :</label>
							<?php 
							switch($bio['penghasilanayah']) {
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
								default:
								    $penghasilan_i='';
								    break;
							}
							?>
							<label class="col-xl-8"><?= $penghasilan_i; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Email Ibu :</label>
							<label class="col-xl-8"><?= $bio['emailibu']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">HP Ibu :</label>
							<label class="col-xl-8"><?= $bio['hpibu']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Alamat Orang Tua :</label>
							<label class="col-xl-8"><?= $bio['alamatortu']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Nama Wali :</label>
							<label class="col-xl-8"><?= $bio['namawali']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Tempat, Tanggal Lahir :</label>
							<?php 
							if($bio['tgllahirwali'] !='0000-00-00')
							{
								$tgl_w = tanggal_indo($bio['tgllahirwali']);
							} else {
								$tgl_w ='';
							}
							?>
							<label class="col-xl-8"><?= $tgl_w; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Alamat :</label>
							<label class="col-xl-8"><?= $bio['alamatwali']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Pekerjaan :</label>
							<label class="col-xl-8"><?= $bio['pekerjaanwali']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Penghasilan :</label>
							<?php 
							switch($bio['penghasilanayah']) {
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
								default:
								    $penghasilan_w='';
								    break;
							}
							?>
							<label class="col-xl-8"><?= $penghasilan_w; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Email :</label>
							<label class="col-xl-8"><?= $bio['emailwali']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">No. HP :</label>
							<label class="col-xl-8"><?= $bio['hpwali']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Alamat :</label>
							<label class="col-xl-8"><?= $bio['alamatwali']; ?></label>
						</div>

						<div class="card-header border-0 pb-0 mb-3">
							<h4 class="fs-20 mb-0 border-bottom text-uppercase text-muted">
								<i class="fa-regular fa-square-check me-2"></i>
								Informasi Tambahan
							</h4>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Hobi :</label>
							<label class="col-xl-8"><?= $bio['hobi']; ?></label>
						</div>
						<div class="row">
							<label class="col-xl-4 text-sm-start text-lg-end">Keterangan :</label>
							<label class="col-xl-8"><?= $bio['keterangan']; ?></label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function jadwal(replid)
	{
		$('.bio').load('dashboard/wawancara/'+replid);
	}
	function upload(replid)
	{
		$('.bio').load('dashboard/upload/'+replid);
	}
</script>
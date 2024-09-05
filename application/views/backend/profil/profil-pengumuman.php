<?php
if ($pengumuman['is_proses'] == 10 && $pengumuman['aktif'] == 1) { ?>
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h5 class="mb-0 text-uppercase fw-bold">Pengumuman Hasil Seleksi</h5>

		</div>
		<div class="card-body">
			<h2><i> Assalamu 'Alaikum Warahmatullahi Wabarakatuh</i></h2>
			<p>Dengan mengucapkan <i>Bismillahirrahmanirrahiim</i>, Kami <strong class="text-muted">Panitia Penerimaan Peserta Didik Baru Tahun <?= $pengumuman['tahunmasuk'] ?></strong> menyatakan bahwa: </p>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td width="20%" class="text-muted text-end">Nama :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['nama'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">No. Pendaftaran :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['nopendaftaran'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">Jalur Pendaftaran :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['proses'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">Mendaftar di :</td>
						<td width="80%" class="text-muted text-uppercase"><?= $pengumuman['departemen'] ?></td>
					</tr>
				</tbody>
			</table>
			<p class="mt-3">dinyatakan <strong>DITERIMA</strong> di SIT Istiqamah YPAIT Balikpapan</p>
			<code>Tim Panitia PPDB</code>
		</div>
	</div>
<?php } elseif ($pengumuman['is_proses'] == 11 && $pengumuman['aktif'] == 1) { ?>
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h5 class="mb-0 text-uppercase fw-bold">Pengumuman Hasil Seleksi</h5>

		</div>
		<div class="card-body">
			<h2><i> Assalamu 'Alaikum Warahmatullahi Wabarakatuh</i></h2>
			<p>Dengan mengucapkan <i>Bismillahirrahmanirrahiim</i>, Kami <strong class="text-muted">Panitia Penerimaan Peserta Didik Baru Tahun <?= $pengumuman['tahunmasuk'] ?></strong> menyatakan bahwa: </p>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td width="20%" class="text-muted text-end">Nama :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['nama'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">No. Pendaftaran :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['nopendaftaran'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">Jalur Pendaftaran :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['proses'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">Mendaftar di :</td>
						<td width="80%" class="text-muted text-uppercase"><?= $pengumuman['departemen'] ?></td>
					</tr>
				</tbody>
			</table>
			<p class="mt-3">dinyatakan <strong>TIDAK DITERIMA</strong> di SIT Istiqamah YPAIT Balikpapan</p>
			<code>Tim Panitia PPDB</code>
		</div>
	</div>

<?php } elseif ($pengumuman['is_proses'] == 12 && $pengumuman['aktif'] == 1) { ?>
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h5 class="mb-0 text-uppercase fw-bold">Pengumuman Hasil Seleksi</h5>

		</div>
		<div class="card-body">
			<h2><i> Assalamu 'Alaikum Warahmatullahi Wabarakatuh</i></h2>
			<p>Dengan mengucapkan <i>Bismillahirrahmanirrahiim</i>, Kami <strong class="text-muted">Panitia Penerimaan Peserta Didik Baru Tahun <?= $pengumuman['tahunmasuk'] ?></strong> menyatakan bahwa: </p>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td width="20%" class="text-muted text-end">Nama :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['nama'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">No. Pendaftaran :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['nopendaftaran'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">Jalur Pendaftaran :</td>
						<td width="80%" class="text-muted"><?= $pengumuman['proses'] ?></td>
					</tr>
					<tr>
						<td width="20%" class="text-muted text-end">Mendaftar di :</td>
						<td width="80%" class="text-muted text-uppercase"><?= $pengumuman['departemen'] ?></td>
					</tr>
				</tbody>
			</table>
			<p class="mt-3">dinyatakan <strong>MENGUNDURKAN DIRI DARI PPDB</strong> di SIT Istiqamah YPAIT Balikpapan</p>
			<code>Tim Panitia PPDB</code>
		</div>
	</div>
<?php	} else { ?>

	<div class="card">
		<div class="card-header">
			<i class="ph-info me-2"></i>
			Informasi
		</div>
		<div class="card-body">
			<h2>Belum ada pengumuman</h2>
		</div>
	</div>

<?php }
?>
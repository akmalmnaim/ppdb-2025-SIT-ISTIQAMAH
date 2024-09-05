<div class="pendaftar">
	<div class="d-sm-flex d-block justify-content-between align-items-center mb-4">
		<div class="card-action coin-tabs mt-3 mt-sm-0">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="javascript:pendaftar();">Semua</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:tampil(`sdit/0`);">Pendaftar Baru SDIT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:tampil(`smpit/0`);">Pendaftar Baru SMPIT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:tampil(`smait/0`);">Pendaftar Baru SMAIT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:tampil(`sdit/1`);">Pindahan SDIT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:tampil(`smpit/1`);">Pindahan SMPIT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:tampil(`smait/1`);">Pindahan SMAIT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:mundur();">Mengundurkan Diri</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title text-muted text-uppercase">
						<i class="fa fa-user"></i>
						Pendaftar
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive" style="min-height: 800px">
						<table id="example" class="display" style="min-width: 845px;;">
							<thead>
								<tr>
									<th width="10%">No. Pendaftaran</th>
									<th width="20%">Nama Lengkap</th>
									<th width="30%">Tempat, Tanggal Lahir</th>

									<th width="10%">Status</th>
									<th width="10%">Proses</th>
									<th width="10%"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($pendaftar as $p) {
									switch ($p->is_proses) {
										case '0':
											$proses = '<span class="badge light badge-danger text-uppercase">
										<i class="fa fa-circle text-danger me-1"></i>
										Mengisi Biodata
										</span>';
											break;
										case '1':
											$proses = '<span class="badge light badge-danger text-uppercase">
										<i class="fa fa-circle text-danger me-1"></i>
										Biodata Lengkap
										</span>';
											break;
										case '2':
											$proses = '<span class="badge light badge-warning text-uppercase">
										<i class="fa fa-circle text-warning me-1"></i>
										Jadwal Sudah Dibuat
										</span>';
											break;
										case '3':
											$proses = '<span class="badge light badge-warning text-uppercase">
										<i class="fa fa-circle text-warning me-1"></i>
										Upload Hasil Wawancara
										</span>';
											break;
										case '5':
											$proses = '<span class="badge light badge-success text-uppercase">
										<i class="fa fa-circle text-success me-1"></i>
										diterima
										</span>';
											break;
										default:
											break;
									}
									if ($p->aktif == '0') {
										$aktif = '<span class="badge bg-danger">Mengundurkan diri</span>';
									} else {
										$aktif = '<span class="badge bg-primary">Aktif</span>';
									}
								?>
									<tr>
										<td class="fw-bold text-primary"><?= $p->nopendaftaran; ?></td>
										<td><?= $p->nama; ?></td>
										<td><?= $p->tmplahir . ', ' . tanggal_indo($p->tgllahir); ?></td>
										<td><?= $proses; ?></td>
										<td>
											<div class="d-flex">
												<a href="javascript:lihatBiodata(`<?= $p->replid; ?>`)" class="btn btn-primary shadow btn-xs sharp me-1" title="Proses Admisi"><i class="fa-solid fa-user-tie"></i></a>
												<a href="javascript:terima(`<?= $p->replid; ?>`)" class="btn btn-success shadow btn-xs sharp me-1" title="Proses Terima"><i class="fa-solid fa-check"></i></a>
												<a href="javascript:tolak(`<?= $p->replid; ?>`)" class="btn btn-primary shadow btn-xs sharp me-1" title="Proses Tolak/Mundur"><i class="fa-solid fa-stop"></i></a>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function terima(id) {
			if (confirm('Calon peserta didik ini yakin akan DITERIMA?')) {
				$.ajax({
					type: 'POST',
					url: 'dashboard/terima',
					data: 'id=' + id + '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
					success: function(response) {
						if (response > 0)
							alert('Status Calon Peserta Didik berhasil diubah menjadi diterima');
						pendaftar();
					},
					error: function() {
						alert('Terjadi kesalahan saat mengirim permintaan AJAX');
					}
				});
			}
		}

		function tolak(id) {
			if (confirm('Yakin akan dibuat Status Ditolak/Mundur?')) {
				$.ajax({
					type: 'POST',
					url: 'dashboard/tolak',
					data: 'id=' + id + '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
					success: function(response) {
						if (response > 0)
							alert('Status berhasil diubah ditolak/mengundurkan diri');
						pendaftar();
					},
					error: function() {
						alert('Terjadi kesalahan saat mengirim permintaan AJAX');
					}
				});
			}
		}



		function loadtabel() {
			$('#example').dataTable().fnDestroy();
			$('#example').DataTable({
				createdRow: function(row, data, index) {
					$(row).addClass('selected')
				},
				language: {
					paginate: {
						next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
						previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
					}
				}
			});
		}
		loadtabel();

		function tampil(uri) {
			$('.pendaftar').load('backpendaftaran/pendaftar_per/' + uri, function() {
				loadtabel();
			});;
		}

		function mundur() {
			$('.pendaftar').load('backpendaftaran/pendaftar_mundur', function() {
				loadtabel();
			});;
		}

		function lihatBiodata(replid) {
			$('.pendaftar').load('backpendaftaran/biodata/' + replid);
		}
	</script>
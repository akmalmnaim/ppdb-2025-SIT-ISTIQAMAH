<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-muted text-uppercase">
					<i class="fa-solid fa-eye"></i>
					Konfirmasi Pembayaran
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="display" style="min-width: 845px">
						<thead>
							<tr>
								<th width="10%">Email</th>
								<th width="20%">Nama Lengkap</th>
								<th width="30%">Tempat, Tanggal Lahir</th>
								<th width="10%">PIN</th>
								<th width="10%">Status</th>
								<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($bayar as $b) {
								switch ($b->status) {
									case '0':
										$status = '<span class="badge light badge-warning text-uppercase">
            									<i class="fa fa-circle text-danger me-1"></i>
            									    Belum Unggah
            									</span>';
										break;
									case '1':
										$status = '<span class="badge light badge-success text-uppercase">
            									<i class="fa fa-circle text-warning me-1"></i>
            									    Slip di Unggah
            									</span>';
										break;
									case '2':
										$status = '<span class="badge light badge-success text-uppercase">
            									<i class="fa fa-circle text-warning me-1"></i>
            									    Slip Terverifikasi
            									</span>';
										break;
									default:
										break;
								}
							?>
								<tr>
									<td><?= $b->email; ?></td>
									<td><?= $b->nama; ?></td>
									<td><?= $b->tmplahir . ', ' . tanggal_indo($b->tgllahir); ?></td>
									<td><?= $b->pin; ?></td>
									<td><?= $status; ?></td>
									<td>
										<div class="d-flex">
											<a href="javascript:bayar(`<?= $b->pin; ?>`)" class="btn btn-primary shadow btn-xs sharp me-1" title="Konfirmasi"><i class="fa-solid fa-handshake"></i></a>
											<a href="javascript:lihatSlip(`<?php echo $b->slipimg; ?>`)" class="btn btn-danger shadow btn-xs sharp" title="Lihat slip"><i class="fa-solid fa-file-image"></i></a>
										</div>
									</td>
								</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
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

	function lihatSlip(file) {
		if (file.length == 0) {
			alert('Belum ada slip');
		} else {
			window.open('<?= base_url('upload/slip_bayar/') ?>' + file, '_blank');
		}
	}

	function lihatIjazah(file) {
		if (file.length == 0) {
			alert('Belum ada slip');
		} else {
			window.open('<?= base_url('upload/buktiijazah/') ?>' + file, '_blank');
		}
	}

	function bayar(pin) {
		if (confirm('Yakin akan mengkonfirmasi pendaftar ini')) {
			$.ajax({
				type: 'GET',
				url: 'backpendaftaran/konfirmasi_bayar/' + pin,
				success: function(data) {
					if (data > 0) {
						alert('Konfirmasi Berhasil.');
						konfirmasi();
					}
				}
			});
		} else {
			return false;
		}
	}
</script>
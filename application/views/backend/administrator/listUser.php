<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-muted text-uppercase">
					<i class="fa fa-gear me-2"></i>
					Manajemen User
				</h4>
				<div class="float-end">
					<button class="btn-sm btn-primary text-white" onclick="add()">Tambah</button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive" style="min-height: 800px">
					<table id="example" class="display" style="min-width: 845px;;">
						<thead>
							<tr>
								<th width="30%">User</th>
								<th width="30%">Nama</th>
								<th width="10%">Aktif</th>
								<th width="10%">Status</th>
								<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($user as $u) {
								if ($u->aktif == 1) {
									$aktif = '<span class="badge light badge-success text-uppercase">
									<i class="fa fa-circle text-danger me-1"></i>
									Aktif
									</span>';
								} else {
									$aktif = '<span class="badge light badge-d text-uppercase">
									<i class="fa fa-circle text-danger me-1"></i>
									Non Aktif
									</span>';
								}
								if ($u->depart_status == 9):
									$status = '<strong class="text-uppercase">Administrator</strong>';
								endif;
								if ($u->depart_status == 1):
									$status = '<strong class="text-uppercase">Keuangan</strong>';
								endif;


							?>

								<tr>
									<td><?= $u->login; ?></td>
									<td><?= $u->nama; ?></td>
									<td><?= $aktif; ?></td>
									<td><?= $status; ?></td>
									<td>
										<div class="d-flex">
											<a href="javascript:edit(`<?= $u->replid; ?>`)" class="btn btn-primary shadow btn-xs sharp me-1" title="Ubah"><i class="fa-solid fa-pencil"></i></a>
											<a href="javascript:hapus(`<?= $u->replid; ?>`)" class="btn btn-warning shadow btn-xs sharp me-1" title="Hapus"><i class="fa-solid fa-trash"></i></a>
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
<div class="modal fade" id="proses">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title judul"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal">
				</button>
			</div>
			<div class="modal-body">
				<form class="form-data">
					<div class="row mb-3">
						<label class="col-4 text-end col-form-label">Username :</label>
						<div class="col-8">
							<input type="hidden" name="replid">
							<input type="text" class="form-control" name="user">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-4 text-end col-form-label">Nama :</label>
						<div class="col-8">
							<input type="text" class="form-control" name="nama" placeholder="">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-4 text-end col-form-label">Password :</label>
						<div class="col-8">
							<input type="password" class="form-control" name="password">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-4 text-end col-form-label">Status :</label>
						<div class="col-8">
							<select class="form-select" name="status">
								<option value="1">Keuangan</option>
								<option value="9">Administrator</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="simpanuser()">Simpan</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	var savemethod;
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

	function add() {
		savemethod = 'add';
		$('.judul').html('Manjemen User');
		$('.form-data')[0].reset();
		$('#proses').modal('show');
	}

	function edit(id) {
		savemethod = 'ubah';
		$('.judul').html('Ubah Proses Penerimaan');
		$('.form-data')[0].reset();
		$.ajax({
			url: 'backpendaftaran/user_edit/' + id,
			method: 'GET',
			dataType: 'json',
			contentType: 'application/json',
			success: function(data) {
				var i;
				for (i = 0; i < data.length; i++) {
					$('[name="replid"]').val(data[i].replid);
					$('[name="nama"]').val(data[i].nama);
					$('[name="user"]').val(data[i].login);
					$('[name="status"]').val(data[i].depart_status);
				}
				$('#proses').modal('show');
			},
			error: function() {
				console.error('Error fetching data');
			}
		});
	}

	function simpanuser() {
		var form = $('.form-data').serialize();
		if (savemethod == 'add') {
			var urlkirim = '<?= base_url() ?>backpendaftaran/simpanuser/add';
		} else {
			var urlkirim = '<?= base_url() ?>backpendaftaran/simpanuser/ubah';
		}
		$.ajax({
			url: urlkirim,
			type: "POST",
			data: form + '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
			// dataType:"json",
			success: function(data) {
				if (data > 0) {
					$('#proses').modal('hide');
					user();
				}
			}
		});
	}

	function aktif(replid) {
		if (confirm('Yakin akan mengaktifkan proses pendaftaran ini?')) {
			$.ajax({
				url: '<?= base_url() ?>backpendaftaran/aktif/' + replid,
				type: "GET",
				success: function(data) {
					if (data > 0) {
						proses();
					}
				}
			});
		}
	}
</script>
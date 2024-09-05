<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-muted text-uppercase">
					<i class="fa fa-gear me-2"></i>
					Proses Penerimaan
				</h4>
				<div class="float-end">
					<button class="btn-sm btn-primary text-white" onclick="add()">
						<i class="fa fa-plus me-2"></i>
						Tambah
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive" style="min-height: 800px">
					<table id="example" class="display" style="min-width: 845px;;">
						<thead>
							<tr>
								<th width="50%">Nama Proses</th>
								<th width="15%">Prefix</th>
								<th width="15%">Status</th>
								<th width="20%"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($proses as $p)
							{	
								if($p->aktif == 0)
								{
									$status = '<a href="javascript:aktif(`'.$p->replid.'`)"><span class="badge light badge-warning text-uppercase">
									<i class="fa fa-circle text-danger me-1"></i>
									Non Aktif
									</span></a>';
								} else 
								{
									$status ='<span class="badge light badge-primary text-uppercase">
									<i class="fa fa-check fa-2x text-primary me-1"></i>
									</span>';
								}

								?>

								<tr>
									<td><?= $p->nama; ?></td>
									<td><?= $p->prefix; ?></td>
									<td><?= $status; ?></td>
									<td>
										<div class="d-flex">
											<a href="javascript:edit(`<?= $p->replid;?>`)" class="btn btn-primary shadow btn-xs sharp me-1" title="Ubah"><i class="fa-solid fa-pencil"></i></a>
											<a href="javascript:hapus(`<?= $p->replid;?>`)" class="btn btn-warning shadow btn-xs sharp me-1" title="Hapus"><i class="fa-solid fa-trash"></i></a>
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
						<label class="col-4 text-end col-form-label">Nama Proses :</label>
						<div class="col-8">
							<input type="hidden" name="replid">
							<input type="text" class="form-control" name="nama">
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-4 text-end col-form-label">Prefix :</label>
						<div class="col-8">
							<input type="text" class="form-control" name="prefix" placeholder="mis: PSIT04">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var savemethod;
	$('#example').DataTable({
		createdRow: function ( row, data, index ) {
			$(row).addClass('selected')
		} ,
		language: {
			paginate: {
				next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
				previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		}
	});

	function add()
	{
		savemethod = 'add';
		$('.judul').html('Tambah Proses Penerimaan');
		$('.form-data')[0].reset();
		$('#proses').modal('show');
	}


	function simpan()
	{
		var form = $('.form-data').serialize();
		if(savemethod=='add') {
			var urlkirim = '<?= base_url()?>backpendaftaran/simpan/add';
		} else {
			var urlkirim = '<?= base_url()?>backpendaftaran/simpan/ubah';
		}
		$.ajax({
			url   :urlkirim,
			type  :"POST",
			data  : form+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
			// dataType:"json",
			success: function(data){
				if(data > 0)
				{
					$('#proses').modal('hide');
					proses();
				}
			}
		});
	}

	function edit(id)
	{
		savemethod = 'ubah';
		$('.judul').html('Ubah Proses Penerimaan');
		$('.form-data')[0].reset();
		$.ajax({
			url: 'backpendaftaran/proses_edit/'+id,
			method: 'GET',
			dataType: 'json',
			contentType : 'application/json',
			success: function(data) {
				var i;
				for(i=0; i<data.length; i++) {
					$('[name="replid"]').val(data[i].replid);
					$('[name="nama"]').val(data[i].nama);
					$('[name="prefix"]').val(data[i].prefix);
				}
				$('#proses').modal('show');
			},
			error: function() {
				console.error('Error fetching data');
			}
		});
	}

	function hapus(id)
	{
		if(confirm('Jika proses penerimaan memiliki data calon siswa, data tidak bisa dihapus. YAKIN?'))
		{
			$.ajax({
				url : 'backpendaftaran/proses_delete/'+id,
				method: 'GET',
				success: function(data) {
					if(data > 0)
					{
						alert('Data berhasil dihapus.');
						proses();
					}
				}
			});
		}
	}

	function aktif(replid)
	{
		if(confirm('Yakin akan mengaktifkan proses pendaftaran ini?'))
		{
			$.ajax({
				url   :'<?= base_url()?>backpendaftaran/aktif/'+replid,
				type  :"GET",
				success: function(data){
					if(data > 0)
					{
						proses();
					}
				}
			});
		}
	}
</script>
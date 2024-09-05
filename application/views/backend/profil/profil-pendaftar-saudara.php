<style>
	.table-responsive {
		width: 100%;
		overflow-x: auto;
		margin-bottom: 20px;
	}

	.table-responsive th,
	.table-responsive td {
		white-space: nowrap;
	}

	@media (max-width: 768px) {
		.table-responsive {
			font-size: 14px;
			padding: 10px;
		}

		.table-responsive th,
		.table-responsive td {
			padding: 5px;
		}

		.table-responsive td {
			white-space: normal;
			/* Allow text to wrap on smaller screens */
		}
	}

	.card-body {
		overflow-x: auto;
	}
</style>
<div class="row mt-3 mb-3">
	<div class="card">
		<div class="text-end px-1 py-2">
			<button type="button" class="btn btn-sm btn-info" onclick="formsaudara(`add`)">
				<i class="ph-plus-circle me-2"></i>
				Tambah
			</button>

		</div>
		<div class="card-body">
			<table class="table table-bordered table-responsive table-sm">
				<thead>
					<tr class="text-center">
						<th>Nama Saudara</th>
						<th>Sekolah</th>
						<th>Nama Sekolah</th>
						<th>Kelas</th>
						<th><i class="ph-dots-three"></i></th>
					</tr>
				</thead>
				<tbody class="tabel">

				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal for delete confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah Anda yakin ingin menghapus data ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
		list();
	});

	function formsaudara(kunci) {
		let replid = $('[name="replid"]').val();
		NewWin('<?= base_url() ?>/dashboard/saudara/' + replid + '/' + kunci, 'Saudara', 600, 420);
	}

	function hapussaudara(kunci) {
		$('#deleteModal').modal('show');
		$('#confirmDelete').on('click', function() {
			$.get('<?= base_url("dashboard/hapussaudara/") ?>' + kunci, function(data, status) {
				if (data > 0)
					list();
			});
			$('#deleteModal').modal('hide');
		});
	}

	function list() {
		let replid = $('[name="replid"]').val();
		$.ajax({
			url: "<?php echo base_url('dashboard/saudaralist/'); ?>" + replid,
			type: "GET",
			dataType: "json",
			success: function(data) {
				var html = '';
				var sekolah = '';
				var aksi = '';
				var i;
				for (i = 0; i < data.length; i++) {
					switch (data[i].is_sekolah) {
						case '0':
							sekolah = '<span class="text-muted">TIDAK</span>';
							break;
						case '1':
							sekolah = '<strong class="text-muted">IYA</strong>';
							break;
						default:
							sekolah = '';
							break;
					}
					var aksi = '<div class="d-inline-flex"><div class="dropdown">' +
						'<a href="#" class="text-body" data-bs-toggle="dropdown"><i class="ph-list"></i></a>' +
						'<div class="dropdown-menu dropdown-menu-end">' +
						'<a href="javascript:formsaudara(`' + data[i].replid + '`)" class="dropdown-item"><i class="ph-pencil me-2"></i>Ubah</a>' +
						'<a href="javascript:hapussaudara(`' + data[i].replid + '`)" class="dropdown-item"><i class="ph-trash me-2"></i>Hapus</a>' +
						'</div></div></div>';
					html += '<tr class="text-center">' +
						'<td class="fw-bold text-muted text-uppercase">' + data[i].namasaudara + '</td>' +
						'<td>' + sekolah + '</td>' +
						'<td>' + data[i].namasekolah + '</td>' +
						'<td>' + data[i].kelas_saudara + '</td>' +
						'<td>' + aksi + '</td>' +
						'</tr>';
				}
				$('.tabel').html(html);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error("Request failed:", textStatus, errorThrown);
			}
		});
	}
</script>
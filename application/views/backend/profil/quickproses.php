<div class="card">
	<div class="card-header  d-flex align-items-center" style="background-image: url(<?=base_url(); ?>assets/backend/assets/images/backgrounds/panel_bg.png); background-size: contain;">
		<i class="ph-table me-2"></i>
		Rekapitulasi Pendaftaran Berdasarkan Proses Penerimaan Yang Sudah Upload Slip Pembayaran
		<div class="d-inline-flex ms-auto">
			<span class="text-end fw-bold text-info"><i class="ph-student me-2"></i> <?= $total; ?> Pendaftar</span>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="text-center">
					<th width="70">Proses Penerimaan</th>
					<th width="30">Jumlah Pendaftar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach($qp as $q)
					{ ?>
						<tr>
							<td><?= $q->proses;?></td>
							<td class="text-center"><?= $q->jumlah;?></td>
						</tr>
				<?php	}
				?>
			</tbody>
		</table>
	</div>
</div>
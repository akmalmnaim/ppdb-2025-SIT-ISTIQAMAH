<div class="page-header-content bg-light px-3 pt-3 pb-3 shadow border-bottom">
	<div class="page-title">
		<h5 class="mb-0 text-uppercase">
			<?= $title; ?>
		</h5>
		<div class="text-muted ms-4"> <?= $title_desc; ?></div>
	</div>
</div>
<div class="card-body">
	<div class="card">
		<div class="card-header d-sm-flex align-items-sm-center py-sm-0">
			<div class="mt-2 py-2">
				<div class="row">
					<div class="col-lg-3">
						<select class="form-select" name="rowper" onchange="cari(0)">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
					<div class="col-lg-3">
						<select class="form-select" name="tahun" onchange="cari(0)">
							<option value="2024" <?php if(cekSetting('tahun')=='2024') { echo 'selected';} else { echo ''; } ?> >2024</option>
							<option value="2025" <?php if(cekSetting('tahun')=='2025') { echo 'selected';} else { echo ''; } ?> >2025</option>
							<option value="2026" <?php if(cekSetting('tahun')=='2026') { echo 'selected';} else { echo ''; } ?> >2026</option>
							<option value="2027" <?php if(cekSetting('tahun')=='2027') { echo 'selected';} else { echo ''; } ?> >2027</option>
							<option value="2028" <?php if(cekSetting('tahun')=='2028') { echo 'selected';} else { echo ''; } ?> >2028</option>
							<option value="2029" <?php if(cekSetting('tahun')=='2029') { echo 'selected';} else { echo ''; } ?> >2029</option>
							<option value="2030" <?php if(cekSetting('tahun')=='2030') { echo 'selected';} else { echo ''; } ?> >2030</option>
						</select>
					</div>
					<div class="col-lg-5">
						<input type="text" name="cari" class="form-control" placeholder="Cari">
					</div>
					<div class="col-lg-1">
						<button class="btn btn-sm btn-transparent" onclick="cari(0)"><i class="ph-magnifying-glass"></i></button>
					</div>
				</div>
			</div>
			<!-- <div class="mt-2 py-2 ms-sm-auto">
				<label class="form-label">Kuota: <span class="text-indigo fw-bold"><?= $kuota; ?></span></label>
			</div> -->
			<div class="mt-2 py-2 ms-sm-auto">
				<button class="btn btn-sm btn-success" onclick="tambah()">
					<i class="ph-plus-circle me-1"></i>
					Tambah
				</button>
			</div>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-12 text-end">
					<label class="form-label text-muted fw-bold"><i class="ph-student fw-bold me-2"></i><?= $kuota; ?> Kuota</label>
				</div>
			</div>
			<table class="table table-bordered table-striped table-hover table-responsive" id="tList">
				<thead class="bg-light">
					<tr class="text-center text-uppercase">
						<th width="30%">Proses</th>
						<th width="10%">Kuota</th>
						<!-- 						<th width="10%">Terisi</th> -->
						<th width="10%">Status</th>
						<th width="40%">Keterangan</th>
						<th class="text-center">
							<i class="ph-dots-three"></i>
						</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<div class="col-lg-9 pagination d-flex align-items-centerpagination " id="pagination"></div>
		</div>
	</div>
</div>


<?php 
require_once 'listjs.php';
?>
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
		<div class="card-header d-sm-flex align-items-sm-center py-sm-0 bg-light">
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
					<div class="col-lg-3">
						<select class="form-select" name="proses" onchange="cari(0)">
							<?php  
								foreach($prosespenerimaan as $pr)
								{
									echo '<option value="'.$pr->replid.'">'.$pr->nama.'</option>';
								}
							?>
						</select>
					</div>
					<div class="col-lg-2">
						<input type="text" name="cari" class="form-control" placeholder="Cari">
					</div>
					<div class="col-lg-1">
						<button class="btn btn-sm btn-transparent" onclick="cari(0)"><i class="ph-magnifying-glass"></i></button>
					</div>
				</div>
			</div>
			<div class="mt-2 py-2 ms-sm-auto">
				<button class="btn btn-sm btn-success" onclick="tambah()">
					<i class="ph-printer me-1"></i>
					Cetak
				</button>
			</div>
		</div>

		<div class="card-body">
			<div class="tList"></div>
		</div>
		<div class="card-footer">
			<div class="col-lg-9 pagination d-flex align-items-centerpagination " id="pagination"></div>
		</div>
	</div>
</div>


<?php 
require_once 'listjs.php';
?>
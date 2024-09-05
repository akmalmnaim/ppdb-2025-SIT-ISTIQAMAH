<div class="content py-0 px-0 mx-0 my-0">
	<div class="card border-bottom border-top border-start border-end">
		<div class="card-header border-bottom text-uppercase text-center bg-light">
			Tambah Proses Penerimaan
		</div>
		<form class="form-proses">
			<div class="card-body">
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Tahun</label>
					<div class="col-sm-4">
						<!-- <input type="text" name="tahun" class="form-control" value="<?= $tahun;?>"> -->
						<select class="form-select" name="tahun">
							<option value="2024" <?php if($tahun == '2024') {echo 'selected'; } else {echo ''; }?> >2024</option>
							<option value="2025" <?php if($tahun == '2025') {echo 'selected'; } else {echo ''; }?> >2025</option>
							<option value="2026" <?php if($tahun == '2026') {echo 'selected'; } else {echo ''; }?> >2026</option>
							<option value="2027" <?php if($tahun == '2027') {echo 'selected'; } else {echo ''; }?> >2027</option>
							<option value="2028" <?php if($tahun == '2028') {echo 'selected'; } else {echo ''; }?> >2028</option>
							<option value="2029" <?php if($tahun == '2029') {echo 'selected'; } else {echo ''; }?> >2029</option>
							<option value="2030" <?php if($tahun == '2030') {echo 'selected'; } else {echo ''; }?> >2030</option>
						</select>
						<input type="hidden" name="replid" class="form-control replid" value="<?= $replid; ?>">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Nama Proses</label>
					<div class="col-sm-8">
						<input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
						<div class="form-text text-muted msg_nama"></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Kuota</label>
					<div class="col-sm-4">
						<input type="text" name="kuota" class="form-control" value="<?= $kuota; ?>">
						<div class="form-text text-muted msg_kuota"></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-4 col-form-label text-sm-end">Keterangan</label>
					<div class="col-sm-8">
						<textarea class="form-control" name="keterangan"><?= $keterangan; ?></textarea>
					</div>
				</div>
			</div>
		</form>
		<div class="text-center mb-3">
			<button onclick="simpanproses()" class="btn btn-outline-info" >
				<i class="ph-windows-logo me-2"></i>
				Simpan
			</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	function simpanproses()
	{
		let form = $('.form-proses').serialize();
		$.ajax({
			type : 'POST',
			url : '<?= base_url("prosespenerimaan/simpan")?>',
			data : form,
			dataType : 'JSON',
			success: function(response) {
				if(response.sukses > 0)
				{
					opener.cari(0);
					window.close();
				} else 
				if(response.error = true)
				{
					$('.msg_nama').html(response.er_nama);
					$('.msg_kuota').html(response.er_kuota);
				}
				
			}
		});
	}
</script>
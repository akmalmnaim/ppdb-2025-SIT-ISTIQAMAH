<div class="card">
	<div class="card-header text-uppercase">
		<i class="ph-key me-2"></i>
		Ubah Password
	</div>
	<div class="card-body">
		<form class="pass">
<!-- 			<div class="row mb-3">
				<label class="col-sm-4 col-form-label text-sm-end">Password Lama</label>
				<div class="col-sm-8">
					<input type="password" name="passlama" class="form-control">
				</div>
			</div> -->
			<div class="row mb-3">
				<label class="col-sm-4 col-form-label text-sm-end">Password Baru</label>
				<div class="col-sm-8">
					<input type="password" name="passbaru1" class="form-control">
					<input type="hidden" name="replid" value="<?= $profil['replid']; ?>" >
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-4 col-form-label text-sm-end">Ulangi Password Baru</label>
				<div class="col-sm-8">
					<input type="password" name="passbaru2" class="form-control">
				</div>
			</div>
		</form>
		<div class="mb-3 text-end">
			<button onclick="simpanpassword()" type="button" class="btn btn-sm btn-info"><i class="ph-key me-2"></i> Simpan</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	function simpanpassword()
	{
		let form = $('.pass').serialize();
		$.ajax({
			type : 'POST',
			url : '<?= base_url("dashboard/simpanpassword")?>',
			data : form,
			dataType : 'JSON',
			success: function(response) {
				console.log(response);
				if(response.sukses > 0)
				{
					alert('Password berhasil diperbarui');
				} else 
				if(response.gagal)
				{
					alert(response.gagal);
				}
				
			}
		});
	}
</script>
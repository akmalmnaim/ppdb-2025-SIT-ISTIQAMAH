<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<div class="profile-tab">
					<div class="custom-tab-1">
						<ul class="nav nav-tabs">
							<li class="nav-item"><a href="#uji1" data-bs-toggle="tab" class="nav-link active show">Hasil Ujian</a>
							</li>
							<li class="nav-item"><a href="#uji2" data-bs-toggle="tab" class="nav-link">Hasil Wawancara</a>
							</li>
							<li class="nav-item"><a href="#uji3" data-bs-toggle="tab" class="nav-link">Hasil Psikotes</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="uji1" class="tab-pane fade active show">
								<div class="my-post-content pt-3">
									<div class="post-input">
										<input type="hidden" name="idcalon" class="form-control" value="<?= $idcalon;?>">
										<textarea name="textarea" id="deskujian" cols="30" rows="8" class="form-control bg-transparent" placeholder="Deskripsikan hasil ujian"><?= getDeskripsi($idcalon,'ujian');?></textarea> 
										<a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#hslujian">
											<i class="fa fa-file-pdf m-0 me-2"></i> 
											Unggah Hasil
										</a>
										<button class="btn btn-outline-primary" onclick="simpandeskripsi(`ujian`)">Simpan</button>
										<div class="row mt-3">
											<?php 
												$cek = getPdf($idcalon,'ujian');
												if($cek != '')
												{
													echo '<embed src="upload/uploadhasil/'.$cek.'#toolbar=0" width="800" height="800">';
												}
											?>
										</div>
										<div class="modal fade" id="hslujian">
											<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">File Ujian</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>
													<div class="modal-body">
														<div class="input-group mb-3">
															<span class="input-group-text">Unggah File Ujian</span>
															<div class="form-file border-left-end overflow-hidden">
																<input type="file" id="ujian" class="form-file-input form-control" accept=".pdf">
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button onclick="uploadfile(`ujian`)" class="btn btn-outline-primary">
															<i class="fa fa-upload me-2"></i>
															Unggah
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div id="uji2" class="tab-pane fade">
								<div class="my-post-content pt-3">
									<div class="post-input">
										<textarea name="textarea" id="deskwawancara" cols="30" rows="8" class="form-control bg-transparent" placeholder="Deskripsikan hasil wawancara"> <?= getDeskripsi($idcalon,'wawancara');?></textarea> 
										<a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#hsluji2">
											<i class="fa fa-file-pdf m-0 me-2"></i> 
											Unggah Hasil
										</a>
										<button class="btn btn-outline-primary" onclick="simpandeskripsi(`wawancara`)">Simpan</button>
										<div class="row mt-3">
											<?php 
												$cek = getPdf($idcalon,'wawancara');
												if($cek != '')
												{
													echo '<embed src="upload/uploadhasil/'.$cek.'#toolbar=0" width="800" height="800">';
												}
											?>
										</div>
										<div class="modal fade" id="hsluji2">
											<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">File Wawancara</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal">
														</button>
													</div>
													<div class="modal-body">
														<div class="input-group mb-3">
															<span class="input-group-text">Unggah File wawancara</span>
															<div class="form-file border-left-end overflow-hidden">
																<input type="file" id="wawancara" class="form-file-input form-control" accept=".pdf">
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button onclick="uploadfile(`wawancara`)" class="btn btn-outline-primary">
															<i class="fa fa-upload me-2"></i>
															Unggah
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="uji3" class="tab-pane fade">
							<div class="my-post-content pt-3">
								<div class="post-input">
									<textarea name="textarea" id="deskpsikotes" cols="30" rows="8" class="form-control bg-transparent" placeholder="Deskripsikan hasil psikotess"><?= getDeskripsi($idcalon,'psikotes');?></textarea> 
									<a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#hsluji3">
										<i class="fa fa-file-pdf m-0 me-2"></i> 
										Unggah Hasil
									</a>
									<button class="btn btn-outline-primary" onclick="simpandeskripsi(`psikotes`)">Simpan</button>
									<div class="row mt-3">
											<?php 
												$cek = getPdf($idcalon,'psikotes');
												if($cek != '')
												{
													echo '<embed src="upload/uploadhasil/'.$cek.'#toolbar=0" width="800" height="800">';
												}
											?>
										</div>
									<div class="modal fade" id="hsluji3">
										<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">File Psikotes</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal">
													</button>
												</div>
												<div class="modal-body">
													<div class="input-group mb-3">
														<span class="input-group-text">Unggah File Psikotes</span>
														<div class="form-file border-left-end overflow-hidden">
															<input type="file" id="psikotes" class="form-file-input form-control" accept=".pdf">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button onclick="uploadfile(`psikotes`)" class="btn btn-outline-primary">
														<i class="fa fa-upload me-2"></i>
														Unggah
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function uploadfile(upload)
	{ 
		var fileInput = document.getElementById(upload);
		var file = fileInput.files[0];

		if (file) {
			var formData = new FormData();
			formData.append('image', file);
			formData.append('idcalon', $('[name="idcalon"]').val());
			formData.append('kategori', upload);
			formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			$.ajax({
				url: 'dashboard/uploadhasil', 
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'JSON',
				async:false,
				success: function(response) {
					if(response.success == true)
					{
						alert('Upload berhasil.');
					}
				},
				error: function() {
					alert('Error');
				}
			});
		} else {
			alert('file belum dipilih');
		}
	}

	function simpandeskripsi(tab)
	{
		let deskripsi;
		switch(tab)
		{
			case 'ujian':
				deskripsi = $('#deskujian').val();
				break;
			case 'wawancara':
				deskripsi = $('#deskwawancara').val();
				break;
			case 'psikotes':
				deskripsi = $('#deskpsikotes').val();
				break;
				default:
				break;
		}
		 $.ajax({
                type: 'POST',
                url: 'dashboard/simpandeskripsi',
                data: 'kategori='+tab+'&idcalon='+$('[name="idcalon"]').val()+'&deskripsi='+deskripsi+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
                success: function(response) {
                    if(response > 0)
                    	alert('Data berhasil disimpan.');
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengirim permintaan AJAX');
                }
            });
	}
</script>


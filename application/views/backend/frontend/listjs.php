<script type="text/javascript">
	function simpan(nama)
	{
		getOldImage(nama)
    	var fileInput = document.getElementById(nama);
		var file = fileInput.files[0];

		if (file) {
			var formData = new FormData();
			formData.append('image', file);
			formData.append('old_file', $('[name="nmfile"]').val());
			formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			$.ajax({
				url: 'frontend/upload/'+nama, 
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'JSON',
				async:false,
				success: function(response) {
					if(response.success == true)
						alert('syarat berhasil diupload');
				},
				error: function() {
					alert('Error');
				}
			});
		} else {
			alert('file belum dipilih');
		}
	}

	function getOldImage(nama)
	{
		$.ajax({
			url: 'frontend/oldfile/'+nama,
			type: 'GET',
			async:false,
			success: function(data) {
				$('[name="nmfile"]').val(data);
			}
		});
	}

	function previewImagesyarat(event) {
		var imageInput = event.target;
		var imagePreviewContainer = document.getElementById('imgsyaratpreview');
		imagePreviewContainer.innerHTML = '';
		if (imageInput.files && imageInput.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				var imagePreview = document.createElement('img');
				imagePreview.setAttribute('src', e.target.result);
				// imagePreview.setAttribute('height', '200');
				imagePreviewContainer.appendChild(imagePreview);
			}

			reader.readAsDataURL(imageInput.files[0]);
		}
	}
	function previewImagealur(event) {
		var imageInput = event.target;
		var imagePreviewContainer = document.getElementById('imgalurpreview');
		imagePreviewContainer.innerHTML = '';
		if (imageInput.files && imageInput.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				var imagePreview = document.createElement('img');
				imagePreview.setAttribute('src', e.target.result);
				// imagePreview.setAttribute('height', '200');
				imagePreviewContainer.appendChild(imagePreview);
			}

			reader.readAsDataURL(imageInput.files[0]);
		}
	}
	function previewImagebiaya(event) {
		var imageInput = event.target;
		var imagePreviewContainer = document.getElementById('imgbiayapreview');
		imagePreviewContainer.innerHTML = '';
		if (imageInput.files && imageInput.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				var imagePreview = document.createElement('img');
				imagePreview.setAttribute('src', e.target.result);
				// imagePreview.setAttribute('height', '200');
				imagePreviewContainer.appendChild(imagePreview);
			}

			reader.readAsDataURL(imageInput.files[0]);
		}
	}
	function previewImagejadwal(event) {
		var imageInput = event.target;
		var imagePreviewContainer = document.getElementById('imgjadwalpreview');
		imagePreviewContainer.innerHTML = '';
		if (imageInput.files && imageInput.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				var imagePreview = document.createElement('img');
				imagePreview.setAttribute('src', e.target.result);
				// imagePreview.setAttribute('height', '200');
				imagePreviewContainer.appendChild(imagePreview);
			}

			reader.readAsDataURL(imageInput.files[0]);
		}
	}

</script>
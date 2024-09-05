<script type="text/javascript">
	function frontend() {
		$('.halaman').load('frontend');
	}

	function konfirmasi() {
		$('.halaman').load('backpendaftaran/konfirmasi');
	}

	function pendaftar() {
		$('.halaman').load('backpendaftaran/pendaftar');
	}

	function proses() {
		$('.halaman').load('backpendaftaran/proses');
	}

	function user() {
		$('.halaman').load('backpendaftaran/user');
	}

	function logout() {
		$('#logoutModal').modal('show');
	}

	// Add an event listener to the modal's confirm button
	$('#logoutModalConfirm').on('click', function() {
		window.location.href = '<?= base_url('beranda/logout') ?>';
	});
</script>

<!-- Add the modal HTML -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Yakin akan keluar aplikasi?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="logoutModalConfirm">Logout</button>
			</div>
		</div>
	</div>
</div>
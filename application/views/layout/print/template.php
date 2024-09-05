<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title -->
	<title>Halaman Administrasi PPDB</title>

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">

	<!-- All StyleSheet -->
	<link href="<?= base_url() ?>assets/backend/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/backend/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha384-blOohCVdhjmtROpu8+CfTnUWham9nkX7P7OZQMst+RUnhtoY/9qemFAkIKOYxDI3" crossorigin="anonymous">

	<!-- Globle CSS -->
	<link href="<?= base_url() ?>assets/backend/css/style.css" rel="stylesheet">

</head>

<body>
	<div class="container">
		<div class="row border-bottom mb-3">
			<div class="col-2 ">
				<img src="<?= base_url() ?>assets/img/logosekolah.png" width="100" style="float: left;">
			</div>
			<div class="col-10">
				<h4 class="text-uppercase text-muted mb-0 mt-0 ms-3">Yayasan Pendidikan Al-Istiqamah Terpadu Balikpapan</h4>
				<!-- <h2 class="mb-0 mt-0 text-uppercase text-muted ms-3">Sit Istiqamah Balikpapan</h2> -->
				<small class="fs-14 mt-0 mb-0 ms-3">Komplek Pendidikan Islam Terpadu Istiqamah YPAITB</small>
				<p class="mb-0 mt-0 ms-3"><small>Jl. Syarifuddin Yoes No.1 RT.41 Kel. Gunung Bahagia, Kota Balikpapan-76114</small></p>
				<small class="me-2 ms-3"><i class="fa fa-phone me-2"></i>(0542) 8513734 - 733129</small>
				<small class="me-2 ms-3"><i class="fa fa-envelope me-2"></i>istiqamah.ypaitb@gmail.com</small>
				<small class="ms-3"><i class="fa fa-globe me-2"></i>https://istiqamahypaitb.sch.id</small>
			</div>
		</div>
		<div class="row">
			<?= $cetak; ?>
		</div>
	</div>
	<script type="text/javascript">
		window.print();
		window.onafterprint = window.close;
	</script>
	</div>
</body>

</html>
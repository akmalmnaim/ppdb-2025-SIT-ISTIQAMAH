<!-- Footer -->
<footer class="site-footer style-2 position-relative">
	<div class="footer-top bg-light sapping">
		<div class="container">
			<div class="row pt-50">
				<div class="col-lg-4 col-md-12 col-sm-12">
					<section class="contact-info">
						<li class="wow fadeInUp" data-wow-delay="1.0s">
							<h4>Alamat</h4>
							<address class="wow fadeInUp" data-wow-delay="0.8s">
								Jl. Syarifuddin Yoes, No.1 RT 41, Gunung Bahagia, Balikpapan Selatan
							</address>
						</li>
						<li class="wow fadeInUp" data-wow-delay="1.0s">
							<h4>Kontak</h4>
							<p>Anda dapat menghubungi kami</p>
							<p>0542-733129</p>
							<p>
						</li>
						<li class="wow fadeInUp" data-wow-delay="1.4s">
							<h4>Jam Operasional</h4>
							<p>Senin - Jumat : 08.00 - 16.00</p>
							<p>Sabtu : 08.00 - 12.00</p>

						</li>
						</ul>
					</section>
					<section class="social-media wow fadeInUp" data-wow-delay="0.2s">
						<h4 class="text-light">Media Sosial Kami</h4>
						<ul class="social-icon d-flex justify-content-start align-items-center">
							<li><a class="social-btn" target="_blank" href="https://www.youtube.com/@IstiqamahYPAITB"><i class="fab fa-youtube fa-2x" aria-label="YouTube"></i></a></li>
						</ul>
					</section>
				</div>
				<div class="col-lg-8 col-md-12 col-sm-12">
					<section class="map-section">
						<h2 class="text-light wow fadeInUp" data-wow-delay="0.6s">
							<i class="fa-solid fa-location-dot text-white"></i>
							Peta Lokasi
						</h2>
						<div id="map-container">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.899465183911!2d116.88043407588833!3d-1.2296823355687874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df147270a7a2163%3A0x4582fccf196c5e07!2sYayasan%20Pendidikan%20Al-Istiqamah%20Terpadu%20Balikpapan%20(YPAITB)!5e0!3m2!1sen!2sid!4v1689907977217!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom text-center bg-light">
		<div class="container">
			<p class="copyright-text wow fadeInUp" data-wow-delay="2.4s">Copyright 2023 by <a class="text-primary" href="javascript:void(0)" target="_blank">SIT Istiqamah YPAITB</a>. All rights Reserved</p>
		</div>
	</div>
</footer>
<!-- Footer End -->

<style>
	.popup {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100vw;
		height: 100vh;
		background-color: rgba(0, 0, 0, 0.7);
		z-index: 1000;
	}

	.popup-content {
		position: absolute;
		top: 55%;
		left: 50%;
		transform: translate(-50%, -50%) scale(0.9);
		background-color: #fff;
		padding: 0;
		text-align: center;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}

	.popup-content img {
		display: block;
		width: auto;
		height: auto;
		max-width: 100%;
		max-height: 100%;
	}

	/* Add media queries for responsiveness */

	/* For small screens (mobile) */
	@media only screen and (max-width: 600px) {
		.popup-content {
			width: 80%;
			/* adjust width to fit smaller screens */
			padding: 20px;
			/* add some padding for better readability */
		}

		.popup-content img {
			max-width: 80%;
			/* adjust image width to fit smaller screens */
		}
	}

	/* For medium screens (tablet) */
	@media only screen and (min-width: 601px) and (max-width: 900px) {
		.popup-content {
			width: 60%;
			/* adjust width to fit medium screens */
			padding: 30px;
			/* add some padding for better readability */
		}

		.popup-content img {
			max-width: 60%;
			/* adjust image width to fit medium screens */
		}
	}

	/* For large screens (desktop) */
	@media only screen and (min-width: 901px) {
		.popup-content {
			width: 50%;
			/* adjust width to fit large screens */
			padding: 50px;
			/* add some padding for better readability */
		}

		.popup-content img {
			max-width: 40%;
			/* adjust image width to fit large screens */
		}
	}

	.close {
		position: absolute;
		top: 10px;
		right: 10px;
		font-size: 24px;
		cursor: pointer;
		color: #fff;
		background-color: rgba(0, 0, 0, 0.5);
		width: 30px;
		height: 30px;
		line-height: 30px;
		text-align: center;
		border-radius: 50%;
	}

	.popup-content img {
		/* styles for the image */
		display: block;
		width: 100%;
		/* make the image width 100% of the popup content */
		height: auto;
		/* adjust the image height automatically */
		max-width: 100%;
		/* ensure the image doesn't exceed the popup content width */
		max-height: 100%;
		/* ensure the image doesn't exceed the popup content height */
		object-fit: cover;
		/* make the image cover the entire popup content area */
		object-position: center;
		/* center the image horizontally and vertically */
		border-radius: 10px;
		/* add a border radius to the image */
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
		/* add a box shadow to the image */
	}
</style>

<div class="popup" id="popup">
	<div class="popup-content">
		<span class="close" id="close" aria-label="Close">&times;</span>
		<img src="<?= base_url('assets/img/iklan_1.jpg') ?>" alt="Advertisement">
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const popup = document.getElementById("popup");
		const closeButton = document.getElementById("close");
		const popupContent = document.querySelector(".popup-content");
		const img = popupContent.querySelector("img");

		function setPopupSize() {
			img.style.width = '';
			img.style.height = '';
			let imgWidth = img.naturalWidth * 0.9;
			let imgHeight = img.naturalHeight * 0.9;
			popupContent.style.width = imgWidth + 'px';
			popupContent.style.height = imgHeight + 'px';
		}

		img.onload = setPopupSize;

		popup.style.display = "block";

		closeButton.addEventListener("click", function() {
			popup.style.display = "none";
		});

		window.addEventListener("click", function(event) {
			if (event.target === popup) {
				popup.style.display = "none";
			}
		});
	});
</script>

<button class="scroltop icon-up" type="button"><i class="fas fa-arrow-up"></i></button>
</div>

<!-- JAVASCRIPT FILES ========================================= -->

<script src="<?= base_url() ?>assets/frontend/js/anm.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/wow/wow.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/custom.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</html>
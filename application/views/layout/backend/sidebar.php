            <div class="nav-header">
            	<a href="index.html" class="brand-logo">
            		<img src="assets/img/logosekolah.png" class="logo-abbr">
            		<img src="assets/img/ppdb.png" class="brand-title">
            	</a>
            	<div class="nav-control">
            		<div class="hamburger">
            			<span class="line"></span><span class="line"></span><span class="line"></span>
            		</div>
            	</div>
            </div>

            <div class="header">
            	<div class="header-content">
            		<nav class="navbar navbar-expand">
            			<div class="collapse navbar-collapse justify-content-between">
            				<div class="header-left">
            					<div class="dashboard_bar">
            						SIT ISTIQAMAH YPAIT Balikpapan
            					</div>
            				</div>
            				<ul class="navbar-nav header-right">
            					<li class="nav-item">
            						<i class="fa fa-calendar me-2"></i>
            						<?= tanggal_indo(date('Y-m-d')); ?>
            					</li>
            					<li class="nav-item">
            						<span class="text-success text-uppercase fw-bold">
            							<i class="fa fa-user me-2"></i>
            							<?= $status; ?>
            						</span>
            					</li>
            				</ul>
            			</div>
            		</nav>
            	</div>
            </div>

            <div class="dlabnav">
            	<div class="dlabnav-scroll">
            		<div class="dropdown header-profile2 ">
            			<a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
            				<div class="header-info2 d-flex align-items-center">
            					<img src="assets/img/user.jpeg" alt="">
            					<div class="d-flex align-items-center sidebar-info">
            						<div>
            							<span class="font-w400 d-block text-uppercase"><?= $nama; ?></span>
            							<small class="text-end text-uppercase font-w400"><?= $status; ?></small>
            						</div>
            						<i class="fas fa-chevron-down"></i>
            					</div>

            				</div>
            			</a>
            			<!-- <div class="dropdown-menu dropdown-menu-end">
            				<a href="app-profile.html" class="dropdown-item ai-icon ">
            					<svg  xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            					<span class="ms-2">Profile </span>
            				</a>
            				<a href="email-inbox.html" class="dropdown-item ai-icon">
            					<svg  xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            					<span class="ms-2">Inbox </span>
            				</a>
            				<a href="page-register.html" class="dropdown-item ai-icon">
            					<svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            					<span class="ms-2">Logout </span>
            				</a>
            			</div> -->
            		</div>
            		<ul class="metismenu" id="menu">
            			<li><a href="<?= base_url('admin'); ?>" aria-expanded="false">
            					<i class="flaticon-025-dashboard"></i>
            					<span class="nav-text">Dashboard</span>
            				</a>
            			</li>


            			<?php
						if ($status == 'Administrator') {
						?>
            				<li><a href="javascript:frontend()" aria-expanded="false">
            						<i class="fa-solid fa-share"></i>
            						<span class="nav-text">Frontend Upload</span>
            					</a>
            				</li>
            				<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
            						<i class="fa-solid fa-users"></i>
            						<span class="nav-text">Pendaftaran</span>
            						<!-- <span class="badge badge-xs style-1 badge-danger">New</span> -->
            					</a>
            					<ul aria-expanded="false">
            						<li><a href="javascript:konfirmasi()">Konfirmasi Pembayaran</a></li>
            						<li><a href="javascript:pendaftar()">Pendaftar</a></li>
            					</ul>
            				</li>
            				<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
            						<i class="fa-solid fa-gear"></i>
            						<span class="nav-text">Pengaturan</span>
            						<!-- <span class="badge badge-xs style-1 badge-danger">New</span> -->
            					</a>
            					<ul aria-expanded="false">
            						<li><a href="javascript:proses()">Proses Penerimaan</a></li>
            						<li><a href="javascript:user()">Manajemen User</a></li>
            					</ul>
            				</li>
            			<?php
						} else {
							echo '<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-text">Pendaftaran</span>
                    <!-- <span class="badge badge-xs style-1 badge-danger">New</span> -->
                </a>
                <ul aria-expanded="false">
                    <li><a href="javascript:konfirmasi()">Konfirmasi Pembayaran</a></li>
                </ul>
            </li>';
						}
						?>
            			<li><a aria-expanded="false">
            					<i class="fa-solid fa-right-from-bracket" onclick="logout()"></i>
            					<span class="nav-text">Keluar</span>
            				</a>
            			</li>
            		</ul>
            	</div>
            </div>

            <script>
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
            				Yakin akan keluar?
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            				<button type="button" class="btn btn-primary" id="logoutModalConfirm">Logout</button>
            			</div>
            		</div>
            	</div>
            </div>

            <?php
			require_once 'sidebarjs.php';
			?>
<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<?= $this->session->flashdata('pesan'); ?>
			</div>
		</div>
		<div class="row m-sm-5 px-6">
			<div class="col-lg-12">
				<div class="card card-block card-stretch card-height">
					<div class="card-body">
						<div class="d-flex align-items-center mb-3">
							<div class="profile-img position-relative">
								<img src="<?= base_url() ?>assets/profile/user2.png" class="img-fluid rounded avatar-130" alt="profile-image">
							</div>
							<div class="ml-3">
								<?php if ($this->session->userdata('level') == 'admin' or $this->session->userdata('level') == 'petugas') : ?>
									<h2 class="mb-1"><?= $user['nama_petugas']; ?></h2>
									<a href="#" class="badge badge-primary font-size-14"><i class="las la-star"></i> <?= $user['level']; ?> </a>
								<?php endif; ?>

								<?php if ($this->session->userdata('username') && $this->session->userdata('level') == NULL) : ?>
									<h4 class="mb-1"><?= $user['nama']; ?></h4>
									<p class="mb-2"><?= $user['nik']; ?></p>
								<?php endif; ?>
							</div>
						</div>
						<ul class="list-inline p-0 m-0">

							<li>
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
									</svg>
									<p class="mb-0"><?= $user['username'] ?></p>
								</div>
							</li>
							<li class="mb-2">
								<div class="d-flex align-items-center">
									<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
									</svg>
									<p class="mb-0"><?= $user['telp'] ?></p>
								</div>
							</li>
							<?php if ($this->session->userdata('username') && $this->session->userdata('level') == NULL) : ?>
								<li>
									<div class="d-flex align-items-center">
										<svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
										</svg>
										<p class="mb-0"><?= $user['alamat'] ?></p>
									</div>
								</li>
							<?php endif; ?>
						</ul>
						<hr>
						<a href="<?= base_url('Auth/ChangePasswordController');  ?>" class="btn btn-primary">Ganti Password</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
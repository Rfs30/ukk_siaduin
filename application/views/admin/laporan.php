<div class="content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<form action="<?= base_url('Admin/Laporan/') ?>" method="GET">
										<div class="row text-center">
											<div class="col-md-6">
												<div class="form-group">
													<h5 class="card-title">DARI TANGGAL</h5>
													<input type="date" class="form-control text-center text-dark" id="tanggal_awal" name="tanggal_awal" value="<?= isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : date('Y-m-d') ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<h5 class="card-title">SAMPAI TANGGAL</h5>
													<input type="date" class="form-control text-center text-dark" id="tanggal_akhir" name="tanggal_akhir" value="<?= isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : date('Y-m-d') ?>">
												</div>
											</div>
										</div>
										<hr>
										<center>
											<button type="submit" value="Cari Data" class="btn btn-primary col-6"><i class="las la-search"> Cari Data</i></button>
										</center>
									</form>
								</div>
							</div>
						</div>
						<center>
							<a target="_blank" href="<?= base_url('Admin/Laporan/pdf/') . $this->input->get('tanggal_awal') . '/' . $this->input->get('tanggal_akhir')  ?>" class="btn btn-success col-6 mb-2"><i class="las la-file-download"> Export To pdf</i></a>
						</center>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<div class="header-title">
							<h4 class="card-title">Data Laporan</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatable" class="table data-table table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIK</th>
										<th>Isi Laporan</th>
										<th>Tanggal Pengaduan</th>
										<th>Status</th>
										<th>Tanggal Tanggapan</th>
										<th>Tanggapan</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($pengaduan as $row) : ?>
										<tr>
											<th scope="row"><?= $no++; ?></th>
											<td><?= $row['nama'] ?></td>
											<td><?= $row['nik'] ?></td>
											<td><?= $row['isi_laporan'] ?></td>
											<td><?= $row['tgl_pengaduan'] ?></td>
											<td>
												<?php
												if ($row['status'] == '0') :
													echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
												elseif ($row['status'] == 'proses') :
													echo '<span class="badge badge-primary">Sedang di proses</span>';
												elseif ($row['status'] == 'selesai') :
													echo '<span class="badge badge-success">Selesai di kerjakan</span>';
												elseif ($row['status'] == 'tolak') :
													echo '<span class="badge badge-danger">Laporan di tolak</span>';
												else :
													echo '-';
												endif;
												?>
											</td>
											<td><?= $row['tgl_tanggapan'] ?></td>
											<td><?= $row['tanggapan'] ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Semua Pengaduan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-comments fa-3x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengaduan Ditolak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan_tolak) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-comment-slash fa-3x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengaduan Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan_selesai) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-check-circle fa-3x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
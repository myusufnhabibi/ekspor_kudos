<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-800">Beranda</h1>
    </div>

    <div class="row ">
        <div class="col-md-10">
            <div class="card card-waves mb-4 px-3">
                <div class="card-body p-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2 class="text-primary">Selamat Datang di Beranda <b> <?= $this->fungsi->user_login()->nama ?></b></h2>
                            <p class="text-gray-700">Anda dapat mengelola Pengelolaan Eksport sesuai menu per bagiannya.</p>
                            <!-- <a class="btn btn-primary p-3" href="#!">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right ms-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a> -->
                        </div>
                        <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-5 mt-xxl-n5" src="<?= base_url() ?>assets/img/statistics.svg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                PO Belum Terexport</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pobelum; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('gudang/export/aexport') ?>" class="ml-2 badge badge-success">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-md-6 mb-4">
            <?php if ($pobelum > 0) { ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail PO Belum Terexport</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th>No PO</th>
                                        <th>Tanggal PO </th>
                                        <th>Customer</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pobelumdetail as $po) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++ ?>
                                            </td>
                                            <td>
                                                <?php echo $po['no_pesan'] ?>
                                            </td>
                                            <td>
                                                <?php echo $po['tgl_pesan'] ?>
                                            </td>
                                            <td>
                                                <?php echo $po['nama_customer'] ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('gudang/export/aexport2/?po_export=' . $po['no_pesan']) ?>" class="btn btn-warning mb-1">Export</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
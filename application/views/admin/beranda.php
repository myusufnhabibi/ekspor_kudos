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

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                Data <br> Customer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $customer; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('admin/master/customer') ?>" class="ml-2 badge badge-primary">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                PO <br> Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pomasuk; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('admin/pemesanan') ?>" class="ml-2 badge badge-success">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
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
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                PO Belum Terexport</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pobelum; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('admin/pemesanan') ?>" class="ml-2 badge badge-success">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                PO Sudah Terexport</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $posudah; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('admin/pemesanan/export') ?>" class="ml-2 badge badge-info">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-2">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5> <b> Grafik Pemesanan Tahun <?= date('Y') ?> </b></h5>
                    <canvas id="grafikPesan"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5><b>Grafik Export Tahun <?= date('Y') ?></b></h5>
                    <canvas id="grafikExport"></canvas>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    var dataPesan = {
        labels: <?= $label ?>,
        datasets: [{
            label: 'Total Pemesanan',
            data: <?= $grafik ?>,
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 2
        }]
    };

    var dataExport = {
        labels: <?= $label_export ?>,
        datasets: [{
            label: 'Total Export',
            data: <?= $grafik_export ?>,
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 2
        }]
    };

    if ($("#grafikPesan").length) {
        var lineChartCanvas = $("#grafikPesan").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: dataPesan,
            options: options
        });
    }

    if ($("#grafikExport").length) {
        var lineChartCanvas = $("#grafikExport").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: dataExport,
            options: options
        });
    }

    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false
        },
        elements: {
            point: {
                radius: 0
            }
        }

    };
</script>
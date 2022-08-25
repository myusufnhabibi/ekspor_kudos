<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KSP Zita</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.png" />
    <style type="text/css">
        .error {
            font-size: small;
            margin-top: 5px;
            color: red;
        }

        #image-preview,
        #preview-edit {
            width: 400px;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #e9ecef;
            color: #ecf0f1;
        }

        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
            <div class="nav-top flex-grow-1">
                <div class="container d-flex flex-row h-100 align-items-center">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center">
                        <a class="navbar-brand brand-logo mt-2" href="../../index.html"><img src="<?= base_url('assets/') ?>images/logo.png" alt="logo" /></a>
                        <a class="navbar-brand brand-logo-mini mt-2" href="<?= base_url('assets/') ?>index.html"><img src="<?= base_url('assets/') ?>images/logo.png" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1">

                        <span class="badge badge-pill badge-outline-warning" id="languageDropdown"><b><?= strtoupper('Nasabah') ?></b> <br> LOGGED : <?= tgl_indo(date('Y-m-d')) ?>
                        </span>
                        <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                    <img src="<?= base_url('assets/images/default.jpg') ?>" alt="profile" />
                                    <span class="nav-profile-name"><?= $this->fungsi->nasabah_login()->nama ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a href="<?= base_url('Nasabah/Beranda/GantiP') ?>" class="dropdown-item">
                                        <i class="icon-settings text-primary mr-2"></i>
                                        Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?= base_url('Auth/logout_n') ?>" class="dropdown-item">
                                        <i class="icon-logout text-primary mr-2"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="icon-menu text-white"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="nav-bottom">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a href="<?= base_url('Nasabah/Beranda') ?>" class="nav-link"><i class="link-icon icon-screen-desktop"></i><span class="menu-title">Beranda</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Nasabah/Pinjaman/index') ?>" class="nav-link"><i class="link-icon icon-docs"></i><span class="menu-title">Pinjaman</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Nasabah/Angsuran') ?>" class="nav-link"><i class="link-icon icon-docs"></i><span class="menu-title">Angsuran</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <?= $contents; ?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?= date('Y') ?> <a href="#" target="_blank">KSP Zita</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="icon-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.addons.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.validate.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url('assets/') ?>js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url('assets/') ?>js/myscript.js"></script>
    <script src="<?= base_url('assets/') ?>js/validasi.js"></script>
    <script src="<?= base_url('assets/') ?>js/alerts.js"></script>
    <script src="<?= base_url('assets/') ?>js/dashboard.js"></script>
    <script src="<?= base_url('assets/') ?>js/data-table.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
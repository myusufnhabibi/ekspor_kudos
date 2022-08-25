<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?> - PT. Kudos Istana Furniture</title>
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/logo.png">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/css/upload.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets') ?>/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <style>
        #harus {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body id="page-top">
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->

    <script src="<?= base_url('assets/') ?>vendor/moment/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/fullcalendar/js/fullcalendar.min.js"></script>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "partials/side.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "partials/head.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $contents; ?>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "partials/foot.php" ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url('assets/') ?>vendor/bootstrap2/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/qrcode.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/myscript.js"></script>
    <script src="<?= base_url('assets/') ?>js/export.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
    <!-- Tambahan -->
    <script src="<?= base_url('assets') ?>/vendor/select2/js/select2.min.js"></script>
    <?php if (isset($use)) { ?>
        <script src="<?= base_url('assets') ?>/vendor/dropzone/dist/dropzone.js"></script>
        <script src="<?= base_url('assets') ?>/js/upload.js"></script>
    <?php } ?>

    <script src="<?= base_url('assets') ?>/js/jquery.validate.js"></script>
    <script src="<?= base_url('assets') ?>/js/validasi.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            // $('#datatable2').DataTable();
            setTimeout(function() {
                $(".alertku").alert('close');
            }, 2000);
        });

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false // Default: false
        });
    </script>
</body>

</html>
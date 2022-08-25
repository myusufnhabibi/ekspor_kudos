<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/iconfonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.png" />

</head>

<body onload="window.print()">

    <!-- <body> -->

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid">
                <h3 class="text-right mb-4">Kode Transaksi&nbsp;&nbsp;#<?= $header['kode_saldo'] ?></h3>
                <hr>
            </div>
            <div class="container-fluid d-flex justify-content-between">
                <img class="mr-4 mt-4" src="<?= base_url('assets/images/logo.png') ?>" style="height: 65px; width:auto; float:left;" alt="">
                <div class="col-lg-3 pl-0">
                    <p class="mt-2 mb-2"><b>Bank Sampah Muria Berseri</b></p>
                    <p>Kayuapu Kulon, Gondangmanis <br> Kec. Bae, Kabupaten Kudus <br> Jawa Tengah 59327</p>
                </div>
                <div class="col-lg-3 pr-0">
                    <p class="mt-2 mb-2 text-right"><b>Pengepul</b></p>
                    <p class="text-right"><?= $header['nama_pengepul'] ?>,<br> <?= $header['alamat'] ?>,<br> <?= $header['no_hp'] ?></p>
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-between">
                <div class="col-lg-3 pl-0">
                    <p class="mb-0 mt-2">Tanggal Jual : <?= tgl_indo($header['tgl_saldo']) ?></p>
                    <p>Petugas : <?= $header['nama'] ?></p>
                </div>
            </div>
            <div class="container-fluid mt-2 d-flex justify-content-center w-100">
                <div class="table-responsive w-100">
                    <table class="table">
                        <thead>
                            <tr class="bg-light">
                                <th>No</th>
                                <th>Item Sampah</th>
                                <th class="text-right">Qty</th>
                                <th>Satuan</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($details as $detail) : ?>
                                <tr class="text-right">
                                    <td class="text-left"><?= $no++ ?></td>
                                    <td class="text-left"><?= $detail['nama_sampah'] . " (" . $detail['kode_sampah'] . ")" ?></td>
                                    <td><?= $detail['qty'] ?></td>
                                    <td class="text-left"><?= $detail['kode_satuan'] ?></td>
                                    <td>Rp. <?= number_format($detail['harga']) ?></td>
                                    <td>Rp. <?= number_format($detail['total']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container-fluid mt-2 w-100">
                <!-- <p class="text-right mb-2">Sub - Total amount: $12,348</p>
                    <p class="text-right">vat (10%) : $138</p> -->
                <h5 class="text-right mb-5 mr-2">Total : Rp. <?= number_format($header['total']) ?></h5>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col col-lg-1"></div>
                    <div class="col col-lg-2">
                        <p class="ml-3">Petugas</p>
                        <br> <br> <br>
                        <p>(.......................)</p>
                    </div>
                    <div class="col col-lg-1"></div>
                    <div class="col col-lg-2">
                        <p class="ml-3">Penerima</p>
                        <br> <br> <br>
                        <p>(.......................)</p>
                    </div>
                    <div class="col col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        #laporan {
            border-collapse: collapse;
            width: 100%;
        }

        #laporan td,
        #laporan th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #laporan th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }
    </style>
    </style>
</head>

<body onload="window.print()">
    <div id="head">
        <table width="100%">
            <tr>
                <td id="tdh" align="right" width="20%">
                    <img src="<?= base_url('assets/images/logo.png') ?>" style="width:100px;" alt="">
                </td>
                <td id="tdh" align="center">
                    <h2 style="margin:2px;"><b>PT. Kudos Istana Furniture</b></h2>
                    Mijen Km. 7, Kaliwungu, Kedungdowo, Kec. Kaliwungu, Kabupaten Kudus <br>
                    Telp: 0291 - 434371 Situs: https://kudosfurniture.com/ <br>
                    Jawa Tengah 59361
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div>
        <h5 align="Center" style="margin-bottom:15px"> <?= strtoupper($title) ?> <br> <?= " Tanggal : " . tgl_indo($tgl_awal) . ' s/d ' . tgl_indo($tgl_akhir) ?></h5>
    </div>
    <div>
        <h5 align="Center" style="margin-bottom:15px"> </h5>
    </div>
    <div id=body>

        <table id="laporan">
            <?php if ($id == 'masuk' || $id == 'belum') { ?>
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No PO</th>
                        <th>Customer</th>
                        <th>Destination</th>
                        <th class="text-center">Tanggal PO</th>
                        <th>Barang</th>
                        <th class="text-center">Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data['no_pesan'] ?></td>
                            <td><?= $data['nama_customer'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td class="text-center"><?= tgl_indo($data['tgl_pesan']) ?></td>
                            <td><?= $data['nama_barang'] . " - " . $data['satuan'] ?></td>
                            <td class="text-center"><?= $data['qty'] ?></td>
                            <td><?= $data['harga']  ?></td>
                            <td><?= $data['total'] . " - " . $data['currency'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } else if ($id == 'btertagih') { ?>
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No PO</th>
                        <th>Customer</th>
                        <th>Destination</th>
                        <th class="text-center">Tanggal PO</th>
                        <th>Barang</th>
                        <th class="text-center">Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data['no_pesan'] ?></td>
                            <td><?= $data['nama_customer'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td class="text-center"><?= tgl_indo($data['tgl_pesan']) ?></td>
                            <td><?= $data['nama_barang'] . " - " . $data['satuan'] ?></td>
                            <td class="text-center"><?= $data['qty'] ?></td>
                            <td><?= $data['harga']  ?></td>
                            <td><?= $data['total'] . " - " . $data['currency'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } else if ($id == 'tertagih') { ?>
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No Invoice</th>
                        <th>Customer</th>
                        <th>Destination</th>
                        <th class="text-center">Tanggal Invoice</th>
                        <th>Barang</th>
                        <th class="text-center">Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data['no_invoice'] ?></td>
                            <td><?= $data['nama_customer'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td class="text-center"><?= tgl_indo($data['tgl_invoice']) ?></td>
                            <td><?= $data['nama_barang'] . " - " . $data['satuan'] ?></td>
                            <td class="text-center"><?= $data['qty'] ?></td>
                            <td><?= $data['harga']  ?></td>
                            <td><?= $data['total'] . " - " . $data['currency'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } else { ?>
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No Export</th>
                        <th>Customer</th>
                        <th>Destination</th>
                        <th class="text-center">Tanggal Export</th>
                        <th class="text-center">Container</th>
                        <th>Barang</th>
                        <th class="text-center">Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $data['no_export'] ?></td>
                            <td><?= $data['nama_customer'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td class="text-center"><?= tgl_indo($data['tgl_plan_kapal']) ?></td>
                            <td><?= $data['no_container'] . " - " . $data['type'] ?></td>
                            <td><?= $data['nama_barang'] . " - " . $data['satuan'] ?></td>
                            <td class="text-center"><?= $data['qty'] ?></td>
                            <td><?= $data['harga']  ?></td>
                            <td><?= $data['total'] . " - " . $data['currency'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php } ?>
        </table>
    </div>
</body>

</html>
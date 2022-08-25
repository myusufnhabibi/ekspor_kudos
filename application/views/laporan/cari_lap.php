<div class="row">
    <div class="col-md-8">
        <h5 class="font-weight-bold text-primary"><?= $title . " : " .  $tgl_awal . ' s/d ' . $tgl_akhir ?></h5>
    </div>
    <?php
    if ($jumlah > 0) { ?>
        <div class="col-md-4">
            <a style="float: right;" target="_blank" href="<?= base_url('laporan/cetak_lap?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir . '&cust=' . $cust  . '&id=' . $id) ?>" class="btn btn-rounded btn-primary">Print</a>
        </div>
    <?php } ?>
</div>

<?php
if ($jumlah > 0) { ?>
    <div class="table-responsive mt-2">
        <table id="order-listing" class="table table-bordered">
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
<?php } else { ?>
    <div class="badge badge-pill badge-danger text-center"> <i class="fa fa-exclamation-triangle"></i> Tidak ada data pada tanggal itu!</div>
<?php } ?>
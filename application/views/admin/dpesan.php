<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/pemesanan') ?>">Data Pemesanan</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="font-weight-bold text-center">DETAIL PEMESANAN (PO)</h3>
                    <table>
                        <tr>
                            <td width="120">No Order</td>
                            <td width="10">:</td>
                            <td><b><?= $total['no_pesan'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Tanggal Order</td>
                            <td>:</td>
                            <td><b><?= tgl_indo($total['tgl_pesan']) ?></b></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>:</td>
                            <td><b><?= $total['id_customer'] . " - " . $total['nama_customer'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Destination</td>
                            <td>:</td>
                            <td><b><?= $total['alamat'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Admin</td>
                            <td>:</td>
                            <td><b><?= $total['nama'] ?></b></td>
                        </tr>
                        <?php if ($total['status_jadwal'] == 1) { ?>
                            <tr>
                                <td>Tanggal Kirim</td>
                                <td>:</td>
                                <td><b><?= tgl_indo($total['tgl_renc_kirim']) ?></b></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <p class="mt-3"><b>Detail Barang</b></p>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="setor_table">
                            <thead>
                                <tr>
                                    <th width="80">No</th>
                                    <th width="250">
                                        Barang
                                    </th>
                                    <th width="80">
                                        Satuan
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th width="100">
                                        Qty
                                    </th>
                                    <th>
                                        Sub Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pemesanans as $pesan) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pesan['nama_barang'] ?></td>
                                        <td><?= $pesan['satuan'] ?></td>
                                        <td><?= $pesan['harga'] . " - " .  $pesan['currency']  ?></td>
                                        <td><?= $pesan['qty'] ?></td>
                                        <td><?= $pesan['total'] . " - " .  $pesan['currency'] ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td class="text-right font-weight-bold" colspan="5">Total</td>
                                    <td><?= $total['total'] . " - " .  $pesan['currency'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?= base_url('admin/pemesanan') ?>" style="float: right;" class="btn btn-danger mr-2 mt-2" type="reset">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
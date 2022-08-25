<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('finance/penagihan') ?>">Data Penagihan</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Data PO</h6>
                </div>
                <div class="card-body">
                    <!-- <form method="get" action="<?= base_url('gudang/export/aexport2') ?>">
                        <label for="">PO belum terexport</label>
                        <select class="form-control" name="po_export">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($pos as $poc) { ?>
                                <option value="<?= $poc['no_pesan'] ?>"><?= $poc['no_pesan'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="row form-group mt-2">
                            <div class="col-md-12">
                                <button type="submit" style="float: right;" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </form> -->
                    <?php if ($cek > 0) { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No Order</label>
                                    <input type="text" readonly value="<?= $po['no_pesan'] ?>" id="no-order" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Order</label>
                                    <input type="date" readonly value="<?= $po['tgl_pesan'] ?>" autocomplete="off" id="tgl" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Customer</label>
                                    <input type="text" readonly value="<?= $po['nama_customer'] ?>" autocomplete="off" id="customer" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Destination</label>
                                    <input type="text" value="<?= $po['alamat'] ?>" readonly autocomplete="off" id="destin" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barangs as $barang) { ?>
                                    <tr>
                                        <td><?= $barang['nama_barang']  ?></td>
                                        <td><?= $barang['qty'] . ' / ' . $barang['satuan'] ?></td>
                                        <td><?= $barang['harga'] ?></td>
                                        <td><?= $barang['total'] ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td class="text-right font-weight-bold" colspan="3">Total</td>
                                    <td class="font-weight-bold"><?= $total['total_semua'] . ' - ' . $barang['currency'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($cek > 0) { ?>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header font-16 mt-0">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                            <a href="<?= base_url('finance/penagihan/atagih') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">No Invoice</label>
                            <input type="text" id="no-inv" value="<?= $this->fungsi->kode_otomatis('no_invoice', 4, 'tbl_penagihan', 'INV') ?>" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Invoice</label>
                            <input type="date" autocomplete="off" value="<?= $po['tgl_renc_kirim'] ?>" id="tgl_inv" class="form-control" required>
                            <input type="hidden" value="<?= $total['total_semua'] ?>" id="total" class="form-control">
                            <input type="hidden" value="<?= $po['no_pesan'] ?>" id="no_po" class="form-control">
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button id="simpanTagih" style="float: right;" class="btn btn-primary">Buat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('gudang/export') ?>">Data Export</a>
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
                                    <th>Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barangs as $barang) { ?>
                                    <tr>
                                        <td><?= $barang['nama_barang'] ?></td>
                                        <td><?= $barang['qty'] ?></td>
                                        <td><?= $barang['satuan'] ?></td>
                                    </tr>
                                <?php } ?>
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
                            <a href="<?= base_url('gudang/export/aexport') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">No Export</label>
                            <input type="text" id="no-export" value="<?= $this->fungsi->kode_otomatis('no_export', 4, 'tbl_export', 'EXP') ?>" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Plan Kapal</label>
                            <input type="date" autocomplete="off" value="<?= $po['tgl_renc_kirim'] ?>" id="tglPlan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nomer Container</label>
                            <select name="" class="form-control container-export" id="container-change">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($containers as $contain) { ?>
                                    <option value="<?= $contain['id_container'] ?>"><?= $contain['no_container'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" id="typeC">
                            <label for="">Type / Ukuran Container</label>
                            <input type="text" id="typeCtxt" autocomplete="off" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Sopir</label>
                            <input type="text" id="sopir" autocomplete="off" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Polisi</label>
                            <input type="text" id="nopol" autocomplete="off" class="form-control" required>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button id="simpanExport" style="float: right;" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
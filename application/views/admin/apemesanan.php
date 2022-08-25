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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Order <span id='harus'>*</span></label>
                                <input type="text" readonly value="<?= $this->fungsi->kode_transaksi() ?>" autocomplete="off" id="no-order" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Currency <span id='harus'>*</span></label>
                                <select name="" id="curen" class="form-control">
                                    <option value="USD">USD</option>
                                    <option value="GBN">GBN</option>
                                    <option value="YEN">YEN</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Order <span id='harus'>*</span></label>
                                <input type="date" autocomplete="off" id="tgl" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Customer <span id='harus'>*</span></label>
                                <select id="customer" class="form-control cust-change">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($customers as $cust) { ?>
                                        <option value="<?= $cust['id_customer'] ?>"><?= $cust['nama_customer'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group" id="desti">
                                <label for="">Destination</label>
                                <input type="text" autocomplete="off" id="destitxt" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <p class="text-primary">Detail Pemesanan</p>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="setor_table">
                            <thead>
                                <tr>

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
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <div class="input-group input-group-sm">
                                            <input type="text" autocomplete="off" readonly class="form-control form-group-sm item-input setor_nama" name="setor[]" placeholder="Klik pilih. . . ">
                                            <input type="hidden" class="form-control form-group-sm setor_kode item_code" id="setor_kode" name="setor_kode[]">
                                            <input type="hidden" id="kode_aja">
                                            <div class="input-group-append">
                                                <p class="item-select"> <button data-toggle="modal" class="btn btn-sm btn-primary" data-target="#add">Pilih</button></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="form-group form-group-sm">
                                            <input type="text" class="form-control" name="setor_satuan[]" id="setor_satuan" readonly>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="form-group input-group input-group-sm">
                                            <input type="text" autocomplete="off" class="form-control calculate setor_price item_price required" id="setor_harga" name="setor_price[]" placeholder="0.00">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-group form-group-sm">
                                            <input type="number" class="form-control setor_qty calculate item_qty" id="setor_qty" name="setor_qty[]" value="1">
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="form-group input-group input-group-sm">
                                            <input type="text" class="form-control calculate-sub" name="setor_sub[]" id="setor_sub" value="0.00" aria-describedby="sizing-addon1" readonly>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-group form-group-sm">
                                            <a href="#" class="btn btn-danger btn-xs delete-row"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div align="right" class="mt-2">
                            <a href="#" class="btn btn-success btn-xs add-row"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="container-fluid mt-4 w-100" id="setor_totals">
                        <h4 class="text-right mb-3">
                            <?php echo 'Rp. ' ?><span class="setor-total">0.00</span>
                            <input type="hidden" name="setor_total" id="setor_total">
                        </h4>
                        <hr>
                    </div>
                    <p class="text-danger" style="float: left;">*) harus diisi</p>
                    <button style="float: right;" id="simpanPO" class="btn btn-primary mt-2">Simpan</button>
                    <a href="<?= base_url('admin/pemesanan') ?>" style="float: right;" class="btn btn-danger mr-2 mt-2" type="reset">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">Nama Barang <span id='harus'>*</span></label>
                    <select name="kode_kat" required class="form-control item-select" id="modal-barang">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($barangs as $barang) { ?>
                            <option value="<?= $barang['kode_barang'] ?>"><?= $barang['nama_barang'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" id="setor_satuan_modal">
                </div>
                <div style="float: right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" id="selected" data-dismiss="modal" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Export</h1>
    <p class="mb-4">Data PO yang sudah terdapat jadwal export yang ada di Sistem Pengelolaan Ekspor</p>

    <?php $this->view('message') ?>
    <div class="row mb-4">
        <div class="col-md-4 grid-margin">
            <div class="card shadow">
                <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary">Pilih Bulan</h6>
                        <?php if ($this->fungsi->user_login()->level == '2') { ?>
                            <a href="<?= base_url('gudang/export/aexport') ?>" class="btn btn-primary btn-sm" style="float: right;">Tambah Export</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Bulan</label>
                        <input type="month" min="2021-12" value="<?= date('Y-m') ?>" onchange="pilihBulan(this)" class="form-control bulans" id="bulan-export" name="tanggalbeli">
                    </div>
                    <div class="badge badge-pill badge-danger" id="alertExport"> <i class="fa fa-exclamation-triangle"></i> Tidak ada export pada bulan itu!</div>
                </div>
            </div>
            <div class="card shadow mt-2" id="poterjadwal"></div>
        </div>
        <div class="col-md-8 grid-margin" id="card-detail-export">
            <div class="card shadow border border-primary">
                <div class="card-body">
                    <h5 class="font-weight-bold text-primary">Data PO Export</h5>
                    <div class="text-center header_detail_export"></div>
                    <div class="header_detail_export2"></div>
                    <p class="text-primary mt-2">Detail PO Export :</p>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody id='view_export_detail'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
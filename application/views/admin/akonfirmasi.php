<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/pemesanan') ?>">Data Pemesanan</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
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
                            <td><b><?= $total['tgl_pesan'] ?></b></td>
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
                                        <td><?= $pesan['qty'] ?></td>
                                        <td><?= $pesan['total'] . " - " .  $pesan['currency'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <button data-toggle="modal" class="btn btn-sm btn-primary" data-target="#konfirm">Konfirmasi</button>
                        <a href="<?= base_url('admin/pemesanan') ?>" style="float: right;" class="btn btn-danger mr-2 mt-2" type="reset">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="konfirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Barang PO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Hasil <span id='harus'>*</span></label>
                        <select name="kode_kat" required class="form-control item-select" id="modal-barang">
                            <option value="">-- Pilih --</option>
                            <option value="">Ada</option>
                            <option value="">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group" id="pernyataan">
                        <label class="col-form-label">Nama Barang <span id='harus'>*</span></label>
                        <textarea name="pernyataan" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div style="float: right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" id="selected" data-dismiss="modal" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
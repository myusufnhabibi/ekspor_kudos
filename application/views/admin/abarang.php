<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/master/barang') ?>">Data Barang</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('admin/master/barang') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(4)) { ?>
                        <form method="POST" action="<?= base_url('admin/master/update_barang') ?>" id="formTambahBarang">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Kode Barang</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" value="<?= $barang['nama_barang'] ?>" autocomplete="off" name="nama" class="form-control" required>
                                    <input type="hidden" value="<?= $barang['kode_barang'] ?>" autocomplete="off" name="kode" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Satuan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" value="<?= $barang['satuan'] ?>" autocomplete="off" name="satuan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahBarang" action="<?= base_url('admin/master/add_barang') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Kode Barang</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="kode" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Barang</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Satuan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="satuan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
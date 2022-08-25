<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/master/customer') ?>">Data Customer</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('admin/master/customer') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(4)) { ?>
                        <form method="POST" action="<?= base_url('admin/master/update_customer') ?>" id="formTambahCustomer">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Customer</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" value="<?= $customer['nama_customer'] ?>" autocomplete="off" name="nama" class="form-control" required>
                                    <input type="hidden" value="<?= $customer['id_customer'] ?>" autocomplete="off" name="id" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">No Telepon</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" value="<?= $customer['no_telepon'] ?>" autocomplete="off" name="no" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Alamat</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="alamat" class="form-control" required cols="30" rows="5"><?= $customer['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Negara</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" value="<?= $customer['negara'] ?>" autocomplete="off" name="negara" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" autocomplete="off" value="<?= $customer['email'] ?>" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahCustomer" action="<?= base_url('admin/master/add_customer') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Customer </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">No Telepon</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="no" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Alamat</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="alamat" class="form-control" required cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Negara</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="negara" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" autocomplete="off" name="email" class="form-control" required>
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
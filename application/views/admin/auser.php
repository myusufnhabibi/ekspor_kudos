<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/master/user') ?>">Data User</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('admin/master/user') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(4)) { ?>
                        <form method="POST" action="<?= base_url('admin/master/update_user') ?>" id="formTambahUser">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama User</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $kontak['id_user'] ?>" name="id" class="form-control" required>
                                    <input type="text" autocomplete="off" value="<?= $kontak['nama'] ?>" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" value="<?= $kontak['username'] ?>" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" autocomplete="off" value="" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nomer WA</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" value="<?= $kontak['no_wa'] ?>" name="wa" class="form-control">
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Level</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="level" required id="" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="1" <?= $kontak['level'] == '1' ? 'selected' : null ?>>Admin</option>
                                        <option value="2" <?= $kontak['level'] == '2' ? 'selected' : null ?>>Gudang</option>
                                        <option value="3" <?= $kontak['level'] == '3' ? 'selected' : null ?>>Finance</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahUser" action="<?= base_url('admin/master/add_user') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama User</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" autocomplete="off" value="" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nomer WA</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="wa" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Level</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="level" required id="" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Gudang</option>
                                        <option value="3">Finance</option>
                                    </select>
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
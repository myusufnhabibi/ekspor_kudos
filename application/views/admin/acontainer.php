<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/master/container') ?>">Data Container</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('admin/master/container') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(4)) { ?>
                        <form method="POST" action="<?= base_url('admin/master/update_container') ?>" id="formTambahContainer">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">No Container</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" value="<?= $container['no_container'] ?>" name="no" class="form-control" required>
                                    <input type="hidden" autocomplete="off" value="<?= $container['id_container'] ?>" name="id" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Type</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="type" required id="" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="40HC" <?= $container['type'] == '40HC' ? 'selected' : null ?>>40HC (High Cube)</option>
                                        <option value="45HC" <?= $container['type'] == '45HC' ? 'selected' : null ?>>45HC (High Cube)</option>
                                        <option value="42PC" <?= $container['type'] == '42PC' ? 'selected' : null ?>>42PC (Flat Rack)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahContainer" action="<?= base_url('admin/master/add_container') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">No Container</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="no" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Type</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="type" required id="" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="40HC">40HC (High Cube)</option>
                                        <option value="45HC">45HC (High Cube)</option>
                                        <option value="42PC">42PC (Flat Rack)</option>
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
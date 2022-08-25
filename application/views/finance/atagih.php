<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('finance/penagihan') ?>">Data Penagihan</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Pilih PO</h6>
                </div>
                <div class="card-body">
                    <form method="get" action="<?= base_url('finance/penagihan/atagih2') ?>">
                        <label for="">PO belum tertagih</label>
                        <select class="form-control" name="po_tagih" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($pos as $po) { ?>
                                <option value="<?= $po['no_pesan'] ?>"><?= $po['no_pesan'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="row form-group mt-2">
                            <div class="col-md-12">
                                <button type="submit" style="float: right;" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
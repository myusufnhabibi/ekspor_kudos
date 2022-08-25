<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row mb-4">
        <div class="col-md-12 grid-margin">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="font-weight-bold text-primary">Pencarian</h5>
                    <div class="form-group row">
                        <div class="form-group col-md-4">
                            <label for="nama">Tanggal Awal</label>
                            <input id="tgl_awal" type="date" class="form-control">
                        </div>
                        <!-- <p for="" class="mt-5">s/d</p> -->
                        <div class="form-group col-md-4">
                            <label for="nama">Tanggal Selesai</label>
                            <input id="tgl_akhir" type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nama">Tanggal Selesai</label>
                            <select name="" class="form-control" id="cust">
                                <option value="all">Semua Customer</option>
                                <?php foreach ($customer as $c) { ?>
                                    <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1 mt-4">
                            <?php $uri = $this->uri->segment(3); ?>
                            <button id="<?= $uri == 'masuk' ? 'cari_lap_pom' : ($uri == 'belum' ? 'cari_lap_pob' : ($uri == 'sudah' ? 'cari_lap_pos' : ($uri == 'tertagih' ? 'cari_lap_pot' : 'cari_lap_pobt')));  ?>" class="btn btn-primary mt-2">Cari</button>
                            <!-- <button class="btn btn-warning">Refresh</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row rowLap">
        <div class="col-md-12 grid-margin">
            <div class="card shadow">
                <div class="card-body" id="isiLap"></div>
            </div>
        </div>
    </div>
</div>
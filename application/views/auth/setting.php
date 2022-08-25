<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Setting</span></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6"><?php $this->view('message'); ?></div>
</div>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Setting</h4>
            <div class="row ml-md-0 mr-md-0 vertical-tab tab-minimal">
                <ul class="nav nav-tabs col-md-2 col-md-offeset-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mb-3" id="tab-2-1" data-toggle="tab" href="#dashboard-2-1" role="tab" aria-controls="dashboard-2-1" aria-selected="true"><i class="icon-user"></i>Ganti Password</a>
                    </li>
                    <?php if ($this->fungsi->user_login()->level == '0') : ?>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-2-2" data-toggle="tab" href="#message-2-2" role="tab" aria-controls="message-2-2" aria-selected="false"><i class="icon-phone"></i>Scan WA Notif</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content col-md-8">
                    <div class="tab-pane fade show active" id="dashboard-2-1" role="tabpanel" aria-labelledby="tab-2-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <h4 class="card-title">Ganti Password</h4>
                                        <form class="forms-sample" id="formPassword" method="post" action="<?= base_url('Auth/ubah_pwd') ?>">
                                            <div class="form-group">
                                                <label for="nama">Password Saat Ini <span id='harus'>*</span></label>
                                                <input type="password" required autocomplete='off' class="form-control" name="pwd_awal">
                                            </div>
                                            <div class="form-group">
                                                <label for="Kategoriname">Password Baru <span id='harus'>*</span></label>
                                                <input type="password" required autocomplete='off' class="form-control" name="pwd1">
                                            </div>
                                            <div class="form-group">
                                                <label for="Kategoriname">Konfirmasi Password <span id='harus'>*</span></label>
                                                <input type="password" required autocomplete='off' class="form-control" name="pwd2">
                                            </div>
                                            <div style="float: right">
                                                <button type='reset' class="btn btn-light">Reset</button>
                                                <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="message-2-2" role="tabpanel" aria-labelledby="tab-2-2">
                        <div class="row">

                            <div class="col-12">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <h4 class="card-title">Scan WA Notif</h4>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-row">
                                                    <div class="flex-column">
                                                        <canvas id="canvas">
                                                        </canvas>
                                                        <img id="gambar_qr" src="<?= base_url('assets/images/qr_code.png') ?>" style="opacity:0.3 ;" width="200px" class="rounded" alt="profile image" />
                                                        <h6 id="harus">* waktu scan hanya 10 detik</h6>
                                                    </div>
                                                    <div class="ml-3 mt-2">
                                                        <h6 class="card-title">Status : <span class="judul_wa">Disconected</span></h6>
                                                        <div id="qrcode"></div>
                                                        <button id="btnDevice" class="btn btn-warning">Get Device</button>
                                                        <button id="btnScan" class="btn btn-primary">Scan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
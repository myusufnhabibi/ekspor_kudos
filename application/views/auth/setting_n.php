<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="#">Nasabah</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Setting</span></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6"><?php $this->view('message'); ?></div>
</div>

<div class="col-md-7 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Setting</h4>
            <div class="row ml-md-0 mr-md-0 vertical-tab tab-minimal">
                <ul class="nav nav-tabs col-md-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active mb-3" id="tab-2-1" data-toggle="tab" href="#dashboard-2-1" role="tab" aria-controls="dashboard-2-1" aria-selected="true"><i class="icon-user"></i>Ganti Password</a>
                    </li>
                </ul>
                <div class="tab-content col-md-8">
                    <div class="tab-pane fade show active" id="dashboard-2-1" role="tabpanel" aria-labelledby="tab-2-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Ganti Password</h4>
                                        <form class="forms-sample" id="formPassword" method="post" action="<?= base_url('Auth/ubah_pwd_n') ?>">
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
                </div>
            </div>
        </div>
    </div>
</div>
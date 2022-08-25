<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="#">Nasabah</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Ganti Password</span></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6"><?php $this->view('message'); ?></div>
</div>

<div class="row">
    <div class="col-md-4 offset-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ganti Password</h4>
                <form class="forms-sample" id="form-pass" method="post" action="<?= base_url('Nasabah/Beranda/proses_ganti') ?>">
                    <div class="form-group">
                        <label for="pwd">Password Baru</label>
                        <input type="password" autocomplete="off" id="pwd" class="form-control required" name="pwd" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="pwdk">Konfirmasi Password Baru</label>
                        <input type="password" id="pwdk" class="form-control required" name="pwdk" placeholder="Usernma">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button class="btn btn-light">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
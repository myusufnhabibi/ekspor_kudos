<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Setting Notifikasi WA</h1>
    <p class="mb-4">Connect WA yang dijadikan pengirim</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Setting Notifikasi WA</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="card text-white bg-primary">
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
                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Cara Konek WA</h5>
                            <div class="card">
                                <div class="card-body">
                                    <ol type="1" class="text-info">
                                        <li>Klik pada tombol Get Device</li>
                                        <li>Setelah itu klik tombol Scan lalu muncul QR Code</li>
                                        <li>Buka aplikasi WA yang ada di HP, klik titik tiga di pojok kanan atas</li>
                                        <li>Buka aplikasi WA yang ada di HP, klik titik tiga di pojok kanan atas</li>
                                        <li>Pilih Perangkat Terkait, lalu tautkan perangkat dengan cara arahkan camera ke QR Code tersebut</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
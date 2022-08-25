<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Konfirmasi Barang</h1>
    <p class="mb-4">Data Semua Konfirmasi Barang PO (Purchase Order) yang ada Sistem Pengelolaan Ekspor</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Konfirmasi Barang PO</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('admin/pemesanan/apemesanan') ?>" class="btn btn-primary btn-sm">Tambah Data Pemesanan</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Customer</th>
                            <th>Status Barang</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesanans as $pesan) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $pesan['no_pesan'] ?>
                                </td>
                                <td>
                                    <?php echo tgl_indo($pesan['tgl_pesan']) ?>
                                </td>
                                <td>
                                    <?php echo $pesan['nama_customer'] ?>
                                </td>
                                <td>
                                    <?php if ($pesan['status_jadwal'] == 0) { ?>
                                        <span class="badge badge-warning">Belum Terjadwal</span>
                                    <?php } else { ?>
                                        <span class="badge badge-primary">Sudah Terjadwal</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('gudang/pemesanan/dpesan/' . $pesan['no_pesan']) ?>" class="btn btn-sm btn-primary mb-1">Detail</a>
                                    <a href="<?= base_url('gudang/pemesanan/deletepemesanan/' . $pesan['no_pesan']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
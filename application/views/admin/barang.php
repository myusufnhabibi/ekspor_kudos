<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
    <p class="mb-4">Data Semua Customer yang ada Sistem Pengelolaan Ekspor</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('admin/master/abarang') ?>" class="btn btn-primary btn-sm">Tambah Data Barang</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barangs as $barang) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $barang['kode_barang'] ?>
                                </td>
                                <td>
                                    <?php echo $barang['nama_barang'] ?>
                                </td>
                                <td>
                                    <?php echo $barang['satuan'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/master/abarang/' . $barang['kode_barang']) ?>" class="btn btn-warning mb-1">Edit</a>
                                    <a href="<?= base_url('admin/master/deletebarang/' . $barang['kode_barang']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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
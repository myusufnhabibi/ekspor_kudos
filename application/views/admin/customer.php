<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
    <p class="mb-4">Data Semua Customer yang ada Sistem Pengelolaan Ekspor</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('admin/master/acustomer') ?>" class="btn btn-primary btn-sm">Tambah Data Customer</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Negara</th>
                            <th>Email</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($customers as $customer) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $customer['nama_customer'] ?>
                                </td>
                                <td>
                                    <?php echo $customer['no_telepon'] ?>
                                </td>
                                <td>
                                    <?php echo $customer['alamat'] ?>
                                </td>
                                <td>
                                    <?php echo $customer['negara'] ?>
                                </td>
                                <td>
                                    <?php echo $customer['email'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/master/acustomer/' . $customer['id_customer']) ?>" class="btn btn-warning mb-1">Edit</a>
                                    <a href="<?= base_url('admin/master/deletecustomer/' . $customer['id_customer']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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
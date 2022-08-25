<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Data Semua User/ Pengguna yang ada Sistem Pengelolaan Ekspor</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('admin/master/auser') ?>" class="btn btn-primary btn-sm">Tambah Data User</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Nomer WA</th>
                            <th>Level</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $user['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $user['username'] ?>
                                </td>
                                <td>
                                    <?php echo $user['no_wa'] ?>
                                </td>
                                <td>
                                    <?php if ($user['level'] == '1') { ?>
                                        <span class="badge badge-primary">Admin</span>
                                    <?php } else if ($user['level'] == '2') { ?>
                                        <span class="badge badge-warning">Gudang</span>
                                    <?php } else { ?>
                                        <span class="badge badge-info">Finance</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/master/auser/' . $user['id_user']) ?>" class="btn btn-warning mb-1">Edit</a>
                                    <a href="<?= base_url('admin/master/deleteUser/' . $user['id_user']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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
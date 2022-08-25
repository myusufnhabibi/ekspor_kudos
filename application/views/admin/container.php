<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Container</h1>
    <p class="mb-4">Data Semua Container yang ada Sistem Pengelolaan Ekspor</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Container</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('admin/master/acontainer') ?>" class="btn btn-primary btn-sm">Tambah Data Container</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>No Container</th>
                            <th>Type</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($containers as $container) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $container['no_container'] ?>
                                </td>
                                <td>
                                    <?php if ($container['type'] == '40HC') { ?>
                                        <span class="badge badge-primary">40HC (High Cube)</span>
                                    <?php } else if ($container['type'] == '45HC') { ?>
                                        <span class="badge badge-warning">45HC (High Cube)</span>
                                    <?php } else { ?>
                                        <span class="badge badge-info">42PC (Flat Rack)</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/master/acontainer/' . $container['id_container']) ?>" class="btn btn-warning mb-1">Edit</a>
                                    <a href="<?= base_url('admin/master/deletecontainer/' . $container['id_container']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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
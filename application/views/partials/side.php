<!-- ========== Left Sidebar Start ========== -->
<?php $pg = $this->uri->segment(2);
$pg2 = $this->uri->segment(3);
$pg3 = $this->uri->segment(4);
$level = $this->fungsi->user_login()->level; ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- <img src="<?= base_url('assets/images/logo.png') ?>" width="50" class="rounded" alt=""> -->
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-2">PT. Kudos Istana Furniture </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $pg == '' || $pg == 'beranda' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= $level == '1' ? base_url('admin/beranda') : ($level == '2' ? base_url('gudang/beranda') : base_url('finance/beranda')) ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Menu
    </div>

    <?php if ($level == '1') { ?>
        <li class="nav-item <?= $pg == 'master' ? 'active' : null ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseUtilities" class="collapse <?= $pg == 'master' ? 'show' : null ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master:</h6>
                    <a class="collapse-item <?= $pg2 == 'customer' || $pg2 == 'acustomer' ? 'active' : null ?>" href="<?= base_url('admin/master/customer') ?>">Customer</a>
                    <a class="collapse-item <?= $pg2 == 'barang' || $pg2 == 'abarang' ? 'active' : null ?>" href="<?= base_url('admin/master/barang') ?>">Barang</a>
                    <a class="collapse-item <?= $pg2 == 'container' || $pg2 == 'acontainer' ? 'active' : null ?>" href="<?= base_url('admin/master/container') ?>">Container</a>
                    <a class="collapse-item <?= $pg2 == 'user' || $pg2 == 'auser' ? 'active' : null ?>" href="<?= base_url('admin/master/user') ?>">User</a>
                </div>
            </div>
        </li>

        <li class="nav-item <?= ($pg == 'pemesanan' && $pg2 == '') || $pg2 == 'apemesanan' || $pg2 == 'dpesan' || $pg2 == 'aturjadwal'  ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('admin/pemesanan') ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Pemesanan</span></a>
        </li>

        <li class="nav-item <?= $pg2 == 'jadwal' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('admin/pemesanan/jadwal') ?>">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Jadwal Export</span></a>
        </li>

        <li class="nav-item <?= $pg2 == 'export' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('admin/pemesanan/export') ?>">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Data Export</span></a>
        </li>

    <?php } ?>

    <?php if ($level == '2') { ?>
        <!-- <li class="nav-item <?= $pg == 'kontak' || $pg == 'akontak' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('gudang/pemesanan') ?>">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Konfirmasi Barang PO</span></a>
        </li> -->
        <li class="nav-item <?= $pg == 'export' || $pg == 'aexport' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('gudang/export') ?>">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Data Export</span></a>
        </li>
    <?php } ?>

    <?php if ($level == '3') { ?>
        <li class="nav-item <?= $pg == 'penagihan' || $pg == 'atagih' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('finance/penagihan') ?>">
                <i class="fas fa-fw fa-file-invoice-dollar"></i>
                <span>Data Penagihan</span></a>
        </li>
    <?php } ?>

    <li class="nav-item <?= $pg == 'po' ? 'active' : null ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse <?= $pg == 'po' ? 'show' : null ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pemesanan :</h6>
                <?php if ($level == '1') { ?>
                    <a class="collapse-item <?= $pg == 'po' && $pg2 == 'masuk' ? 'active' : null ?>" href="<?= base_url('laporan/po/masuk') ?>">PO Masuk</a>
                <?php } elseif ($level == '2') { ?>
                    <a class="collapse-item <?= $pg == 'po' && $pg2 == 'belum' ? 'active' : null ?>" href="<?= base_url('laporan/po/belum') ?>">PO Belum Terexport</a>
                    <a class="collapse-item <?= $pg == 'po' && $pg2 == 'sudah' ? 'active' : null ?>" href="<?= base_url('laporan/po/sudah') ?>">PO Sudah Terexport </a>
                <?php } else { ?>
                    <a class="collapse-item <?= $pg == 'po' && $pg2 == 'btertagih' ? 'active' : null ?>" href="<?= base_url('laporan/po/btertagih') ?>">PO Belum Tertagih</a>
                    <a class="collapse-item <?= $pg == 'po' && $pg2 == 'tertagih' ? 'active' : null ?>" href="<?= base_url('laporan/po/tertagih') ?>">PO Sudah Tertagih </a>
                <?php } ?>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- Left Sidebar End -->
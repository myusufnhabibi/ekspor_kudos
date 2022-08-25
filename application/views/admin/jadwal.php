<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('admin/pemesanan') ?>">Data Pemesanan</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary">Jadwal PO Kirim</h6>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>

                    <div style='clear:both'></div>
                    <p class="text-danger mt-2">*) klik pada event tanggal jika ingin melihat lebih jelas</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('admin/pemesanan') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">No Order</label>
                        <input type="text" readonly value="<?= $pemesanan['no_pesan'] ?>" id="no-order" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Order</label>
                        <input type="date" readonly value="<?= $pemesanan['tgl_pesan'] ?>" autocomplete="off" id="tgl" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="">Customer</label>
                        <input type="text" readonly autocomplete="off" value="<?= $pemesanan['nama_customer'] ?>" id="tgl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Destination</label>
                        <input type="text" readonly value="<?= $pemesanan['alamat'] ?>" autocomplete="off" id="tgl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Rencana Kirim</label>
                        <input type="date" autocomplete="off" id="tgl_kirim" class="form-control">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Simpan</button> -->
                            <button id="aturJadwal" style="float: right;" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'today',
            center: 'title',
            right: 'prev,next '
        },
        // editable: true,
        firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
        selectable: true,
        defaultView: 'month',

        axisFormat: 'h:mm',
        columnFormat: {
            month: 'ddd', // Mon
            week: 'ddd d', // Mon 7
            day: 'dddd M/d', // Monday 9/7
            agendaDay: 'dddd d'
        },
        titleFormat: {
            month: 'MMMM YYYY', // September 2009
            week: "MMMM YYYY", // September 2009
            day: 'MMMM YYYY' // Tuesday, Sep 8, 2009
        },
        allDaySlot: false,
        selectHelper: true,
        events: [
            <?php
            foreach ($tgl_pemesanans as $row) { ?> {
                    id: '<?= $row['no_pesan'] ?>',
                    title: '<?= $row['no_pesan'] . '\n' . $row['nama_customer'] ?>',
                    start: '<?= $row['tgl_renc_kirim'] ?>',
                    end: '<?= $row['tgl_end'] ?>',
                    className: 'bg-teal'
                }

            <?php echo ',';
            }
            ?>
        ],
        eventClick: function(info) {
            alert('Nomer PO/ Customer : ' + info.title);

            // change the border color just for fun
            $(this).css('border-color', 'red');
        }
    });
</script>
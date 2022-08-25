<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">Jadwal Export yang ada Sistem Pengelolaan Ekspor</p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div id='calendar'></div>

                    <div style='clear:both'></div>
                    <p class="text-danger mt-2">*) klik pada event tanggal jika ingin melihat lebih jelas</p>
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
var base = "http://localhost/ekspor_kudos/"
$('.rowLap').hide()

$(document).ready(function(){
	$('#cari_lap_pom').on('click', function () {
		cari(base + 'laporan/proses_lap', 'masuk', '#cari_lap_pom')
	})
	$('#cari_lap_pos').on('click', function () {
		cari(base + 'laporan/proses_lap', 'sudah', '#cari_lap_pos')
	})
	$('#cari_lap_pob').on('click', function () {
		cari(base + 'laporan/proses_lap', 'belum', '#cari_lap_pob')
	})
	$('#cari_lap_pot').on('click', function () {
		cari(base + 'laporan/proses_lap', 'tertagih', '#cari_lap_pot')
	})
	$('#cari_lap_pobt').on('click', function () {
		cari(base + 'laporan/proses_lap', 'btertagih', '#cari_lap_pobt')
	})
}) 
 
function exportDetail(nomer) {
	$.ajax({
		type: "POST", // Method pengiriman data bisa dengan GET atau POST
		url: base + 'gudang/export/detail_export', // Isi dengan url/path file php yang dituju
		data: {
			nomer: nomer
		},
		dataType: "json",
		beforeSend: function (e) {
			if (e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function (response) {
			var hasil,
				atas = '',
				tengah = '',
				details = response.hasil,
				headers = response.header,
				no = 1;

			atas += `<h3 class="text-primary">` + headers['no_export'] + `</h3>
                        <p>Tanggal Export : ` + headers['tgl_plan_kapal'] + `</p>`

			tengah += `<table>
                        <tr>
                            <td width="120">No PO</td>
                            <td width="10">:</td>
                            <td><b>` + headers['no_pesan'] + `</b></td>
                        </tr>
                        <tr>
                            <td>Tanggal PO</td>
                            <td>:</td>
                            <td><b>` + headers['tgl_pesan'] + `</b></td>
                        </tr>
                        <tr>
                            <td width="120">Customer</td>
                            <td width="10">:</td>
                            <td><b>` + headers['nama_customer'] + `</b></td>
                        </tr>
                        <tr>
                            <td>Destination</td>
                            <td>:</td>
                            <td><b>` + headers['alamat'] + `</b></td>
                        </tr>
                        <tr>
                            <td>Container</td>
                            <td>:</td>
                            <td><b>` + headers['no_container'] + ` - ` + headers['type'] + `</b></td>
                        </tr>
						<tr>
							<td>Gudang</td>
							<td>:</td>
							<td><b>` + headers['nama'] + `</b></td>
						</tr>
                    </table> 
            `

			details.forEach(data => {
				// console.log(data['nama_sampah'])
				hasil += `
						<tr>
							<td> ` + no++ + `</td>
							<td> ` + data['nama_barang'] + `</td>
							<td> ` + data['qty'] + `</td>
						</tr>
					`
			});
			hasil += `
						<tr><td align="right" colspan="2"><b>Total Qty : </b></td>
							<td>` + headers['total'] + `</td>
						</tr>`
			// console.log(atas);
			$('#card-detail-export').show()
			$('#view_export_detail').show()
			$('.header_detail_export').show()
			$('#view_export_detail').html(hasil)
			$('.header_detail_export').html(atas)
			$('.header_detail_export2').html(tengah)
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(thrownError); // Munculkan alert error
		}
	});
}

function TagihDetail(nomer) {
	$.ajax({
		type: "POST", // Method pengiriman data bisa dengan GET atau POST
		url: base + 'finance/penagihan/detail_tagih', // Isi dengan url/path file php yang dituju
		data: {
			nomer: nomer
		},
		dataType: "json",
		beforeSend: function (e) {
			if (e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function (response) {
			var hasil,
				atas = '',
				tengah = '',
				details = response.hasil,
				headers = response.header,
				no = 1;

			atas += `<h3 class="text-primary">` + headers['no_invoice'] + `</h3>
                        <p>Tanggal Penagihan : ` + headers['tgl_invoice'] + `</p>`

			tengah += `<table>
                        <tr>
                            <td width="120">No PO</td>
                            <td width="10">:</td>
                            <td><b>` + headers['no_pesan'] + `</b></td>
                        </tr>
                        <tr>
                            <td>Tanggal PO</td>
                            <td>:</td>
                            <td><b>` + headers['tgl_pesan'] + `</b></td>
                        </tr>
                        <tr>
                            <td width="120">Customer</td>
                            <td width="10">:</td>
                            <td><b>` + headers['nama_customer'] + `</b></td>
                        </tr>
                        <tr>
                            <td>Destination</td>
                            <td>:</td>
                            <td><b>` + headers['alamat'] + `</b></td>
                        </tr>
                    </table> 
            `

			details.forEach(data => {
				// console.log(data['nama_sampah'])
				hasil += `
						<tr>
							<td> ` + no++ + `</td>
							<td> ` + data['nama_barang'] + `</td>
							<td> ` + data['qty'] + ` / ` + data['satuan'] + `</td>
							<td> ` + data['harga'] + `</td>
							<td> ` + data['total'] + `</td>
						</tr>
					`
			});
			hasil += `
						<tr><td align="right" colspan="4"><b>Total Harga : </b></td>
							<td>` + headers['total'] + ` ` + headers['currency'] + `</td>
						</tr>`
			// console.log(atas);
			$('#card-detail-export').show()
			$('#view_export_detail').show()
			$('.header_detail_export').show()
			$('#view_export_detail').html(hasil)
			$('.header_detail_export').html(atas)
			$('.header_detail_export2').html(tengah)
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(thrownError); // Munculkan alert error
		}
	});
}

const swalWithBootstrapButtons = Swal.mixin({
	customClass: {
		confirmButton: 'btn btn-success',
		cancelButton: 'btn btn-danger'
	},
	buttonsStyling: false
})

function cari(url, id, btn) {
		tglAwal = $('#tgl_awal').val()
		tglAkhir = $('#tgl_akhir').val()
		cust = $('#cust').val()
		if (tglAwal == '' || tglAkhir == '') {
			swalWithBootstrapButtons.fire({
				title: "Perhatian!",
				text: "Tangga Awal atau Tanggal Akhir harus diisi!",
				icon: "warning",
				buttons: "Oke",
			})
		} else {
			var $this = $(btn);
			$this.text('tunggu...').attr('disabled', 'disabled')
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: url, // Isi dengan url/path file php yang dituju
				data: {
					tglAwal: tglAwal,
					tglAkhir: tglAkhir,
					id: id,
					cust: cust,
				}, 
				success: function (response) { // Ketika proses pengiriman berhasil
					// console.log(response.hasil)
					$('.rowLap').show()
					$('#isiLap').html(response)
					$this.text('Cari').removeAttr("disabled");
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(thrownError); // Munculkan alert error
					$this.text('Cari').removeAttr("disabled");
				}
			});
		}

}

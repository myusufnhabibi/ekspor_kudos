$(document).ready(function () {
	$('#desti').hide()
	$('#alertExport').hide()
	$('#alertTagih').hide()
	$('#poterjadwal').hide()
	$('#potertagih').hide()
	$('#card-detail-export').hide()
	$('#typeC').hide()
	$('.bulans').trigger("change");
	$('.bulans2').trigger("change");
	$('#canvas').hide()

	base = "http://localhost/ekspor_kudos/"

	$('.cust-change').on('change', function () {
		nomer = $(this).val()
		$.ajax({
			type: 'POST',
			url: base + "admin/pemesanan/load_cust",
			data: {
				nomer: nomer
			},
			cache: false,
			dataType: 'json',
			success: function (data) {
				// console.log(data.hasil['alamat']);
				$('#desti').show()
				$('#destitxt').val(data.hasil['alamat']).attr('disabled', 'disabled');
			}
		});
	})

	$('#container-change').on('change', function () {
		nomer = $(this).val()
		$.ajax({
			type: 'POST',
			url: base + "gudang/export/load_contain",
			data: {
				nomer: nomer
			},
			cache: false,
			dataType: 'json',
			success: function (data) {
				// console.log(data.hasil['alamat']);
				$('#typeC').show()
				$('#typeCtxt').val(data.hasil['type']).attr('disabled', 'disabled');
			}
		});
	})

	$('#po-export').change(function () {
		id = $(this).val()

		$.ajax({
			type: 'POST',
			url: base + "gudang/export/load_po",
			data: {
				id: id
			},
			cache: false,
			dataType: 'json',
			success: function (data) {
				// console.log(data.cek);
				if (data.cek > 1) {
					$('#no-order').val(data.hasil['no_pesan'])
					$('#customer').val(data.hasil['nama_customer'])
					$('#tgl').val(data.hasil['tgl_pesan'])
					$('#destin').val(data.hasil['alamat'])
				} else {
					$('#no-order').val('')
					$('#customer').val('')
					$('#tgl').val('')
					$('#destin').val('')
				}
			}
		});
	})

	$('#modal-barang').change(function () {
		id = $(this).val()
		$.ajax({
			type: 'POST',
			url: base + "admin/pemesanan/load_barang",
			data: {
				id: id
			},
			cache: false,
			dataType: 'json',
			success: function (data) {
				$('#setor_satuan_modal').val(data.hasil['satuan']);
			}
		});
	})

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	})


	$('#simpanPO').on('click', function () {
		var no = $('#no-order').val();
		var tgl = $('#tgl').val();
		var customer = $('#customer').val();
		var curen = $('#curen').val();
		var total = $('#setor_total').val();
		var kode = $('#kode_aja').val();
		// console.log(no + tgl + customer + curen + kode);
		if (kode == '' || tgl == '' || customer == '' || curen == '') {
			swal.fire({
				title: "Perhatian!",
				text: "Tanggal, Customer, Currency, Barang harus diisi!",
				icon: "warning",
				buttons: "Oke",
			})
		} else {
			swalWithBootstrapButtons.fire({
					title: 'Apakah anda yakin membuat Pemesanan?',
					text: "Pastikan inputan benar!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya',
					cancelButtonText: 'Tidak',
					reverseButtons: true
				})
				.then((willSave) => {
					if (willSave.isConfirmed) {
						var item_code = [];
						var item_qty = [];
						var item_price = [];
						$('.item_code').each(function () {
							item_code.push($(this).val());
						});
						$('.item_qty').each(function () {
							item_qty.push($(this).val());
						});
						$('.item_price').each(function () {
							item_price.push($(this).val());
						});
						// console.log(item_code + item_qty + nik)
						$.ajax({
							type: "GET",
							url: base + 'admin/pemesanan/add_pemesanan', // Isi dengan url/path file php yang dituju
							data: {
								no: no,
								item_code: item_code,
								item_qty: item_qty,
								item_price: item_price,
								total: total,
								tgl: tgl,
								curen: curen,
								customer: customer,
							},
							success: function (response) {
								// console.log(response.hasil)
								if (response.hasil == undefined) {
									swalWithBootstrapButtons.fire("Berhasil!", "Pemesanan Berhasil Dibuat!", "success");
									setTimeout(function () {
										location.href = base + 'admin/pemesanan/'
									}, 2000);
								} else {
									swalWithBootstrapButtons.fire("Gagal!", "Pemesanan Gagal Dibuat!", "warning");
									setTimeout(function () {
										location.href = base + 'admin/pemesanan/apemesanan'
									}, 2000);
								}
							},
							error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
								alert(thrownError); // Munculkan alert error
							}
						});
					} else if (
						result.dismiss === Swal.DismissReason.cancel
					) {}
				});
		}

	})


	$('#simpanExport').on('click', function () {
		var $this = $(this);
		$this.text('tunggu . . .').attr('disabled', 'disabled')
		var no = $('#no-order').val();
		var tglPlan = $('#tglPlan').val();
		var noExport = $('#no-export').val();
		var containerExport = $('.container-export').val();
		var sopir = $('#sopir').val();
		var nopol = $('#nopol').val();
		// console.log(no);
		if (no == '' || tglPlan == '' || nopol == '' || noExport == '' || containerExport == '' || sopir == '') {
			swal.fire({
				title: "Perhatian!",
				text: "Tanggal Plan, Container, Sopir, Nopol harus diisi!",
				icon: "warning",
				buttons: "Oke",
			})
			$this.text('Simpan').removeAttr("disabled")
		} else {
			swalWithBootstrapButtons.fire({
				title: 'Apakah anda yakin membuat Pemesanan?',
				text: "Pastikan inputan benar!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				reverseButtons: true
			})
				.then((willSave) => {
					if (willSave.isConfirmed) {
						$.ajax({
							type: "GET",
							url: base + 'gudang/export/add_export', // Isi dengan url/path file php yang dituju
							data: {
								no: no,
								tglPlan: tglPlan,
								noExport: noExport,
								containerExport: containerExport,
								sopir: sopir,
								nopol: nopol
							},
							dataType: 'json',
							success: function (response) {
								// console.log(response.cek)
								if (response.cek == true) {
									
									$.ajax({
										headers: { "Accept": "application/json"},
										type: "POST",
										// url: "https://wa-mokong.herokuapp.com/",
										url: "http://localhost:8000/send-message",
										data: {
											number: response.nomer,
											message: response.pesan
										},
										dataType: 'json',
										crossDomain: true,
										beforeSend: function(xhr){
											xhr.withCredentials = true;
										},
										success: function () {
											swalWithBootstrapButtons.fire("Berhasil!", "Export Berhasil Dibuat!", "success");
											setTimeout(function () {
												location.href = base + 'gudang/export/'
											}, 2000);
										}
									})
								} else {
									swalWithBootstrapButtons.fire("Gagal!", "Export Gagal Dibuat!", "warning");
									setTimeout(function () {
										location.href = base + 'gudang/export/aexport'
									}, 222000);
								}
								$this.text('Simpan').removeAttr("disabled");
							},
							error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
								alert(thrownError); // Munculkan alert error
								$this.text('Simpan').removeAttr("disabled");
							}
						});
					} else if (
						willSave.dismiss === Swal.DismissReason.cancel
						) {
							// console.log('tekan')
						$this.text('Simpan').removeAttr("disabled")
					}
				});
		}

	})

	$('#simpanTagih').on('click', function () {
		var $this = $(this);
		$this.text('tunggu . . .').attr('disabled', 'disabled')
		var no = $('#no-inv').val();
		var tglPlan = $('#tgl_inv').val();
		var noPO = $('#no_po').val();
		var total = $('#total').val();
		console.log(no + tglPlan, noPO, total);
		if (no == '' || tglPlan == '' || noPO == '' || total == '') {
			swal.fire({
				title: "Perhatian!",
				text: "Tanggal harus diisi!",
				icon: "warning",
				buttons: "Oke",
			})
			$this.text('Buat').removeAttr("disabled")
		} else {
			swalWithBootstrapButtons.fire({
				title: 'Apakah anda yakin membuat Pemesanan?',
				text: "Pastikan inputan benar!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Ya',
				cancelButtonText: 'Tidak',
				reverseButtons: true
			})
				.then((willSave) => {
					if (willSave.isConfirmed) {
						$.ajax({
							type: "GET",
							url: base + 'finance/penagihan/add_tagih', // Isi dengan url/path file php yang dituju
							data: {
								no: no,
								tglPlan: tglPlan,
								nopo: noPO,
								total: total
							},
							dataType: 'json',
							success: function (response) {
								// console.log(response.cek)
								if (response.cek == true) {
									swalWithBootstrapButtons.fire("Berhasil!", "Penagihan Berhasil Dibuat!", "success");
									setTimeout(function () {
										location.href = base + 'finance/penagihan/'
									}, 2000);
								} else {
									swalWithBootstrapButtons.fire("Gagal!", "Penagihan Gagal Dibuat!", "warning");
									setTimeout(function () {
										location.href = base + 'finance/penagihan/atagih'
									}, 222000);
								}
								$this.text('Buat').removeAttr("disabled");
							},
							error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
								alert(thrownError); // Munculkan alert error
								$this.text('Buat').removeAttr("disabled");
							}
						});
					} else if (
						willSave.dismiss === Swal.DismissReason.cancel
						) {
							// console.log('tekan')
						$this.text('Buat').removeAttr("disabled")
					}
				});
		}

	})

	$('#aturJadwal').on('click', function () {
		var no = $('#no-order').val();
		var tglrenca = $('#tgl_kirim').val();
		// console.log(no + tgl + customer + curen + kode);
		if (no == '' || tglrenca == '') {
			swal.fire({
				title: "Perhatian!",
				text: "Tanggal Rencana Kirim harus diisi!",
				icon: "warning",
				buttons: "Oke",
			})
		} else {
			swalWithBootstrapButtons.fire({
					title: 'Apakah anda yakin membuat Jadwal?',
					text: "Pastikan inputan benar!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Ya',
					cancelButtonText: 'Tidak',
					reverseButtons: true
				})
				.then((willSave) => {
					if (willSave.isConfirmed) {
						$.ajax({
							type: "GET",
							url: base + 'admin/notifikasi/update_po',
							data: {
								no: encodeURIComponent(no),
								tglrenca: tglrenca
							},
							dataType: 'json',
							success: function (response) {
								// console.log(response.nomer + response.pesan)
								if (response.cek == true) {
									
									$.ajax({
										headers: { "Accept": "application/json"},
										type: "POST",
										// url: "https://wa-mokong.herokuapp.com/",
										url: "http://localhost:8000/send-message",
										data: {
											number: response.nomer,
											message: response.pesan
										},
										dataType: 'json',
										crossDomain: true,
										beforeSend: function(xhr){
											xhr.withCredentials = true;
										},
										success: function () {
											swalWithBootstrapButtons.fire("Berhasil!", "Jadwal Berhasil Dibuat!", "success");
											setTimeout(function () {
												location.href = base + 'admin/pemesanan/'
											}, 2000);
										}
									})
								} else {
									swalWithBootstrapButtons.fire("Gagal!", "Jadwal Gagal Dibuat!", "warning");
									setTimeout(function () {
										location.href = base + 'admin/pemesanan/aturjadwal'
									}, 2000);
								}
							},
							error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
								alert(thrownError); // Munculkan alert error
							}
						});
					} else if (
						result.dismiss === Swal.DismissReason.cancel
					) {}
				});
		}

	})

	$('#btnDevice').on('click', function () {
		var $this = $(this);
		$this.text('tunggu . . .').attr('disabled', 'disabled')
		$.ajax({
			type: "POST",
			url: base + 'admin/notifikasi/getDevice', // Isi dengan url/path file php yang dituju
			success: function (data) {
				// location.href = base + 'Auth/setting'
				// console.log(data)
				swalWithBootstrapButtons.fire("Berhasil!", "Get Device sukses!", "success");
				$this.text('Klik Tombol Scan')
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
				$this.text('Get Device').removeAttr("disabled");
			},
		});
	})

	$('#btnScan').on('click', function () {
		var $this = $(this);
		$this.text('tunggu . . .').attr('disabled', 'disabled')
		$.ajax({
			type: "POST",
			url: base + 'admin/notifikasi/qr_wa', // Isi dengan url/path file php yang dituju
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function (response) {
				hasil = response['body'].substring(12, 164)
				// console.log(response['body'] )
				$('.judul_wa').text('Connected')
				// $('#btnCreateQr').trigger("click", [hasil]);
				genQR(hasil);
				// console.log(hasil)
				$('#gambar_qr').hide()
				$('#canvas').show()
				$this.text('Silahkan Scan')
				// setTimeout(function() {
				// 	$('#gambar_qr').attr('src', base + 'assets/images/qr_code.png')
				// 	$this.text('Scan').removeAttr("disabled");
				// 	$('.judul_wa').text('Disconnected')
				// 	$('#gambar_qr').show()
				// }, 20000);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
				$this.text('Scan').removeAttr("disabled");
			},
		});
	})

	$('#jual_detail').on('click', ".delete-jual", function (e) {
		e.preventDefault();
		$(this).closest('tr').remove();
	});

	$(document).on('click', ".item-select", function (e) {

		e.preventDefault;

		var product = $(this);

		$('#add').modal({
			backdrop: 'static',
			keyboard: false
		}).one('click', '#selected', function (e) {

			var itemText = $('#add').find("option:selected").text();
			var itemValue = $('#add').find("option:selected").val();
			var satuan = $('#add #setor_satuan_modal').val();
			// console.log(harga)
			subtotal = 0;

			$(product).closest('tr').find('.setor_nama').val(itemText);
			$(product).closest('tr').find('#setor_satuan').val(satuan);
			$(product).closest('tr').find('#kode_aja').val(satuan);
			$(product).closest('tr').find('.setor_kode').val(itemValue);
			$(product).closest('tr').find('#setor_sub').val(subtotal);

			// $('.calculate-sub').val(subtotal.toFixed(2));
			// updateTotals('.calculate');
			calculateTotal();
			$(product).val('')
		});

		return false;

	});

	/*
	 * List Detail Item
	 */
	// remove product row
	$('#setor_table').on('click', ".delete-row", function (e) {
		e.preventDefault();
		$(this).closest('tr').remove();
		calculateTotal();
	});

	// add new product row on setor
	var cloned = $('#setor_table tr:last').clone();
	$(".add-row").click(function (e) {
		e.preventDefault();
		cloned.clone().appendTo('#setor_table');
	});

	calculateTotal();

	$('#setor_table').on('input', '.calculate', function () {
		updateTotals(this);
		calculateTotal();
	});

	$('#setor_totals').on('input', '.calculate', function () {
		calculateTotal();
	});

	//update total
	function updateTotals(elem) {

		var tr = $(elem).closest('tr'),
			quantity = $('[name="setor_qty[]"]', tr).val(),
			price = $('[name="setor_price[]"]', tr).val(),
			subtotal = parseFloat(quantity) * parseFloat(price);

		$('.calculate-sub', tr).val(subtotal);
	}

	//kalkulasi total
	function calculateTotal() {

		var grandTotal = 0;

		$('#setor_table tbody tr').each(function () {
			var c_sbt = $('.calculate-sub', this).val()

			grandTotal += parseFloat(c_sbt);
		});

		// VAT, DISCOUNT, SHIPPING, TOTAL, SUBTOTAL:
		var subT = parseFloat(grandTotal)

		// $('.setor-total').text(subT.toFixed(2));
		$('.setor-total').text(subT);
		$('#setor_total').val(subT);
	}
})


function genQR(str) {
	// var str = document.querySelector("input").value;
	QRCode.toCanvas(document.getElementById("canvas"), str, function (error) {
		if (error) console.error(error);
		console.log("success!");
	});

}


function pilihBulan(pa) {
	// $('#tglBeli').change(function () {
	base = "http://localhost/ekspor_kudos/"
	tglBeli = pa.value;
	// console.log(tglBeli)
	$.ajax({
		type: "POST",
		url: base + 'gudang/export/cek_tanggal', // Isi dengan url/path file php yang dituju
		data: {
			tglBeli: tglBeli
		}, // data yang akan dikirim ke file yang dituju
		dataType: "json",
		beforeSend: function (e) {
			if (e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function (response) { // Ketika proses pengiriman berhasil
			// console.log(response)
			var exports = response.hasil
			var hasil = ''
			if (response.cek > 0) {
				// console.log(exports)
				exports.forEach(element => {
					hasil += `
								<div class="d-flex align-items-center py-3 border-bottom">
									<div class="ml-3">
										<h6 class="mb-1"> ` + element['no_export'] + ` - ` + element['tgl_plan_kapal'] + ` </h6>
										<small class="text-muted mb-0"> ` + element['no_pesan'] + ` - ` + element['nama_customer'] + `</small>
									</div>
									<form onsubmit="return false;">
										<button onclick="exportDetail('` + element['no_pesan'] + `')" class="btn btn-info btn-md btn-rounded ml-5">cek </button>
									</form>
								</div>
						`
				});
				$('#poterjadwal').show()
				$('#poterjadwal').html(`
						<div class='card-body'>
							<h6 class="font-weight-bold text-primary"> Data Export Bulan : ` + tglBeli + `</h6>
							` + hasil + ` 
						</div>`);
				$('#alertExport').hide()
			} else {
				$('#poterjadwal').hide()
				$('#alertExport').show()
			}
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(thrownError); // Munculkan alert error
		}
	})
	// })
}

function pilihBulan2(sa) {
	// $('#tglBeli').change(function () {
	base = "http://localhost/ekspor_kudos/"
	tglBeli = sa.value;
	// console.log(tglBeli)
	$.ajax({
		type: "POST",
		url: base + 'finance/penagihan/cek_tanggal', // Isi dengan url/path file php yang dituju
		data: {
			tglBeli: tglBeli
		}, // data yang akan dikirim ke file yang dituju
		dataType: "json",
		beforeSend: function (e) {
			if (e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function (response) { // Ketika proses pengiriman berhasil
			// console.log(response)
			var tagihs = response.hasil
			var hasil = ''
			if (response.cek > 0) {
				// console.log(tagihs)
				tagihs.forEach(element => {
					hasil += `
								<div class="d-flex align-items-center py-3 border-bottom">
									<div class="ml-3">
										<h6 class="mb-1"> ` + element['no_invoice'] + ` - ` + element['tgl_invoice'] + ` </h6>
										<small class="text-muted mb-0"> ` + element['no_pesan'] + ` - ` + element['nama_customer'] + `</small>
									</div>
									<form onsubmit="return false;">
										<button onclick="TagihDetail('` + element['no_pesan'] + `')" class="btn btn-info btn-md btn-rounded ml-5">cek </button>
									</form>
								</div>
						`
				});
				$('#potertagih').show()
				$('#potertagih').html(`
						<div class='card-body'>
							<h6 class="font-weight-bold text-primary"> Data Tertagih Bulan : ` + tglBeli + `</h6>
							` + hasil + ` 
						</div>`);
				$('#alertTagih').hide()
			} else {
				$('#potertagih').hide()
				$('#alertTagih').show()
			}
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(thrownError); // Munculkan alert error
		}
	})
	// })
}
$(document).ready(function () {
	$('#formTambahContainer').validate({
		messages: {
			no: {
				required: "No Container harus diisi"
			},
			type: {
				required: "Type harus diisi"
			},
		}
	});

	$('#formTambahCustomer').validate({
		messages: {
			nama: {
				required: "Nama Customer harus diisi"
			},
			no: {
				required: "No Telepon harus diisi"
			},
			alamat: {
				required: "Alamat harus diisi"
			},
			negara: {
				required: "Negara harus diisi"
			},
			email: {
				required: "Email harus diisi"
			},
		}
	});

	$('#formTambahUser').validate({
		messages: {
			nama: {
				required: "Nama User harus diisi"
			},
			username: {
				required: "Username harus diisi"
			},
			password: {
				required: "Password harus diisi"
			},
			level: {
				required: "Level harus diisi"
			},
			wa: {
				required: "Nomer WA harus diisi"
			}
		}
	});

	$('#formTambahBarang').validate({
		messages: {
			kode: {
				required: "Kode Barang harus diisi"
			},
			nama: {
				required: "Nama Barang harus diisi"
			},
			satuan: {
				required: "Satuan harus diisi"
			}
		}
	});
});

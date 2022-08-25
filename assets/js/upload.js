(function ($) {
	Dropzone.autoProcessQueue = false; //setting dropzone agar tidak ototmatis upload file
	Dropzone.autoDiscover = false; //setting dropzone agar tidak ototmatis upload file
	var baseurl = 'http://localhost/karyalogambersatu/app/';
	if($('#frmdropzone').length) {
		var myDropzone = new Dropzone('#frmdropzone', {
			url: baseurl + 'upload',
			autoProcessQueue: false,
			parallelUploads: 5, //maksimal jumlah upload
			uploadMultiple: false,
			maxFilesize: 1, //ukuran file 2MB
			addRemoveLinks: true,
			acceptedFiles: 'image/jpeg,image/png,image/jpg',
			init: function () {
				thisDropzone = this;
				this.on("uploadprogress", function (file, progress) {
					console.log("File progress", progress);
				});
				this.on("complete", function (file) {
					//pesan jika upload success
				});

			},
		});
	}
	if($('#frmKegiatan').length) {
		var kegiatanDropzone = new Dropzone('#frmKegiatan', {
			url: baseurl + 'upload2',
			autoProcessQueue: false,
			parallelUploads: 5, //maksimal jumlah upload
			uploadMultiple: false,
			maxFilesize: 1, //ukuran file 2MB
			addRemoveLinks: true,
			acceptedFiles: 'image/jpeg,image/png,image/jpg',
			init: function () {
				thisDropzone = this;
				this.on("uploadprogress", function (file, progress) {
					console.log("File progress", progress);
				});
				this.on("sending", function(file, xhr, formData) {
					var str = $('#kegiatan_id3').val();
					formData.append("kegiatan_id", str);
				});
				this.on("complete", function (file) {
					//pesan jika upload success
				});

			},
		});
	}

	$("#btnsubmit").on("click", function (e) {
		//fungsi untuk mengupload gambar ke database
		if (myDropzone.getQueuedFiles().length > 0) {
			myDropzone.processQueue();
			$('#frmdropzone').submit();
			alert('Gambar telah di upload');
			window.location.href = baseurl + 'gallery';
			return false;
		}
	});

	$("#btnSubmit3").on("click", function (e) {
		//fungsi untuk mengupload gambar ke database
		if (kegiatanDropzone.getQueuedFiles().length > 0) {
			kegiatanDropzone.processQueue();
			$('#frmKegiatan').submit();
			alert('Foto Berhasil Diupload!')
			location.href = baseurl + 'kegiatan'
			return false;
		}
	});

	$("#btnsubmit2").submit(function (e) {
		e.preventDefault(); 
		// $('#btnSubmit3').removeAttr('disabled')
		judul = $('#judul').val()
		tgl_kegiatan = $('#tgl_kegiatan').val()
        files = $('#image-upload')[0].files;
		var ini = $('#simpanK');
		ini.text('tunggu . . .').attr('disabled', 'disabled')
		// console.log(isi, status2)
		if (judul == '') {
			alert('Judul Harus diisi!')
			ini.text('Simpan').removeAttr("disabled")
			return false
		} else if (tgl_kegiatan == '' ) {
			alert('Tanggal Kegiatan Harus diisi!')
			ini.text('Simpan').removeAttr("disabled")
			return false
		} else if (files.length < 1) {
			alert('Thumbnail Harus diisi!')
			ini.text('Simpan').removeAttr("disabled")
			return false
		} else {
			
			$.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: baseurl + 'kegiatan_tambah', // Isi dengan url/path file php yang dituju
                // data: {
                //     judul: judul,
                //     isi: isi,
                //     tgl_kegiatan: tgl_kegiatan,
                //     gambar: gambar,
                //     status2: status2
                // },
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				dataType: 'json',
                success: function (respon) {
                    cek = respon
					console.log(cek)
					if (cek == 'ekstensi') {
						alert('Ekstensi Thumbnail Salah!')
					} else if ( cek == 'ukuran') {
						alert('Ukuran Thumbnail tidak boleh lebih dari 1 MB')
					} else {
						$('#btnSubmit3').prop('disabled', false)
						$(".dz-hidden-input").prop("disabled", false);
						ini.text('Simpan')
						alert('Kegiatan berhasil Disimpan!')
						$('#judul').prop("readonly",true);
						$('#tgl_kegiatan').prop("readonly",true);
						$('#isi').prop("readonly",true);
						$('#status').attr("disabled", true); 
					}
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					ini.text('Simpan').removeAttr("disabled")
                    alert(thrownError); // Munculkan alert error
                }
            });
		}

	});


})(jQuery)

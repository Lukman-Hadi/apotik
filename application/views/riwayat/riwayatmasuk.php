<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title; ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<section class="content">
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Tambah Barang</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<button class="btn btn-primary btn-rounded" onclick="newForm()">Tambah Barang Baru</button>
						<button class="btn btn-success btn-rounded" onclick="formUpload()">Import Excel</button>
						<a href="<?= base_url() . 'export/exportbarang' ?>" class="btn btn-info btn-rounded">Export Excel</a>
						<button class="btn btn-secondary btn-rounded">Print</button>
						<a href="downloadTemplate" class="btn btn-secondary btn-rounded">Download Template</a>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Daftar Riwayat Barang Masuk</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="tbl-barang" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Kode Faktur</th>
									<th>Nama Supplier</th>
									<th>Total</th>
									<th>Tanggal</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$(document).ready(function() {
		const uang = new Intl.NumberFormat('ID-id', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0
		});
		const table = $('#tbl-barang').DataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			order: [3, 'DESC'],
			aLengthMenu: [
				[10, 50, 100, -1],
				[10, 50, 100, 'all']
			],
			ajax: {
				url: "getRiwayatMasuk", // URL file untuk proses select datanya
				type: "POST"
			},
			columns: [{
					data: "kode_faktur",
					name: 'kode_faktur',
				}, // Tampilkan nis
				{
					data: "nama_supplier",
					name: 'nama_supplier'
				}, // Tampilkan nama
				{
					data: "grandtotal",
					name: 'grandtotal',
					render: function(data, type, row) {
						return uang.format(data);
					}
				}, // Tampilkan alamat
				{
					data: "tgl_transaksi",
					name: 'tgl_transaksi'
				},
				{
					data: "action",
					name: 'action',
					orderable: false,
					searchable: false
				}, // Tampilkan telepon
			],
		});
		$('body').on('click', '.edit', function() {
			let data = table.row($(this).parents('tr')).data();
			edit(data)
		});
		$('body').on('click', '.delete', function() {
			let data = table.row($(this).parents('tr')).data();
			deleteData(data)
		})
		$("#exportExcel").on("click", function() {
			table.buttons('.buttons-excel').trigger();
		});
	});

	function newForm() {
		$('input[name=id]').val('');
		$('#ff').trigger("reset");
		$('#ff').trigger("clear");
		$('#modal-form').modal('toggle');
		url = 'savebarang';
	}

	function formUpload() {
		$('#modal-upload').modal('toggle');
	}

	function edit(row) {
		$('#modal-form').modal('toggle');
		$('#ff').trigger("reset");
		$('#ff').trigger("clear");
		// $('#header').text('Edit Menu');
		// url = `${window.location.href}/${row.id}/update`;
		url = 'savebarang';
		loadForm(row);
		// $('#main_menu').val(row.parent_id).trigger('change.select2');
	}

	function deleteData(row) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				let data = row.id;
				$.post('destroyriwayatmasuk', {
					id: data
				}, function(result) {
					if (result.errorMsg) {
						Toast.fire({
							icon: 'error',
							title: '' + result.errorMsg + '.'
						})
					} else {
						Toast.fire({
							icon: 'success',
							title: '' + result.message + '.'
						})
						$('#tbl-barang').DataTable().ajax.reload();
					}
				}, 'json');
			}
		})
	}

	function loadForm(data) {
		$.each(data, function(k, v) {
			$(`input[name=${k}]`).val(v);
		})
	}
	$('#ff').on('submit', function(e) {
		e.preventDefault();
		let formData = new FormData($('#ff')[0]);
		$.ajax({
			type: "POST",
			url: url,
			data: formData,
			processData: false,
			contentType: false,
			success: e => {
				console.log('result', e)
				var result = eval('(' + e + ')');
				if (result.errorMsg) {
					Toast.fire({
						icon: 'error',
						title: '' + result.errorMsg + '.'
					})
				} else {
					Toast.fire({
						icon: 'success',
						title: '' + result.message + '.'
					})
					$('#modal-form').modal('toggle'); // close the dialog
					$('#tbl-barang').DataTable().ajax.reload();
				}
			},
			error: e => {
				console.log(`e`, e)
			}
		})
	})

	// function submitForm(target) {
	// 	let formData = $('#ff')[0];
	// 	$.ajax({
	// 		type: "POST",
	// 		url: target,
	// 		data: formData,
	// 		processData: false,
	// 		contentType: false,
	// 		success: e => {
	// 			console.log('result', e)
	// 			var result = eval('(' + e + ')');
	// 			if (result.errorMsg) {
	// 				Toast.fire({
	// 					type: 'error',
	// 					title: '' + result.errorMsg + '.'
	// 				})
	// 			} else {
	// 				Toast.fire({
	// 					type: 'success',
	// 					title: '' + result.message + '.'
	// 				})
	// 				$('#modal-form').modal('toggle'); // close the dialog
	// 			}
	// 		}
	// 	})
	// }


	// $('#ff').on('submit', function(e) {
	// 	e.preventDefault();
	// 	const string = $('#ff').serialize();
	// 	$.ajax({
	// 		type: "POST",
	// 		url: url,
	// 		data: string,
	// 		success: (result) => {
	// 			console.log('result', result)
	// 			var result = eval('(' + result + ')');
	// 			if (result.errorMsg) {
	// 				Toast.fire({
	// 					type: 'error',
	// 					title: '' + result.errorMsg + '.'
	// 				})
	// 			} else {
	// 				Toast.fire({
	// 					type: 'success',
	// 					title: '' + result.message + '.'
	// 				})
	// 				$('#modal-form').modal('toggle'); // close the dialog
	// 				$('#table').bootstrapTable('refresh');
	// 			}
	// 		},
	// 	})
	// })
</script>

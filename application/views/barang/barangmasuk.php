<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<section class="content">
		<form action="savebarangmasuk" id="fff" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Input Barang Masuk</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Kode Faktur</label>
										<input type="text" class="form-control" name="kode_faktur">
									</div>
									<div class="form-group">
										<label>Supplier</label>
										<select id="supplier" name="kode_supplier" class="form-control select2-single" required>
											<option></option>
										</select>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Tanggal</label>
										<input type="date" class="form-control" name="tgl_transaksi">
									</div>
									<div class="form-group">
										<label>Grandtotal</label>
										<input data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'" class="form-control" name="grandtotal">
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-outline-primary" type="button" onclick="openForm()" id="btndetail" disabled>Input Detail Barang</button>
							<button type="submit" class="btn btn-outline-primary" onclick="kirim()" id="btnsubmt" disabled>test</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Daftar Barang Apotik</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="tbl-detail" class="table table-bordered table-striped">
								<thead>
									<tr style="width: 100%;">
										<th style="width: 30%;">Kode Barang</th>
										<th>Kode Batch</th>
										<th>Jumlah</th>
										<th>Harga</th>
										<th>Tanggal Expired</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<div class="modal fade" id="modal-form">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Extra Large Modal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="ff" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Barang</label>
						<input type="text" class="form-control" name="kode_barang">
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="nama_barang">
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<input type="text" class="form-control" name="satuan" placeholder="cth: dus, botol, kaleng">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" class="form-control" name="harga" placeholder="xxxxxxxxx">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" class="form-control" name="deskripsi">
					</div>
					<input type="hidden" name="id">
			</div>
			<div class="modal-footer justify-content-between">
				<button class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	var dataBarang = [];

	$(document).ready(function() {
		$.fn.select2.defaults.set("theme", "bootstrap4");
		$(document).on('click', '#removeRow', function() {
			$(this).closest('#inputFormRow').remove();
		});
		$(document).on('change', 'input[name=harga]', function() {
			$(this).closest('span').text('hai');
		});
		$.ajax({
			url: 'issupplier',
			type: 'get',
			async: false,
			dataType: 'json',
			success: function(data) {
				let dataSupplier = data.map((d) => {
					return {
						id: d.id,
						text: d.nama_supplier
					}
				});
				$('#supplier').select2({
					placeholder: "Pilih Kode Program",
					allowClear: false,
					data: dataSupplier
				});
			}
		});
		$.ajax({
			url: 'isbarang',
			type: 'get',
			async: false,
			dataType: 'json',
			success: function(data) {
				let res = data.map((d) => {
					return {
						id: d.id,
						text: `(${d.kode_barang}) ${d.nama_barang} - ${d.satuan}`
					}
				});
				dataBarang = [{
					id: '',
					text: ''
				}, ...res]
			}
		});
	});

	function kirim() {}

	function openForm() {
		let content = `<tr id="inputFormRow">
			<td><div class="form-group"><select name="id_barang[]" class="form-control select2-single" style="border: 0;width: 100%;" required></select></div></td>
			<td><input type="text" class="form-control" name="kode_batch[]" placeholder="xxxxxxxxx"></td>
			<td><input type="number" class="form-control" name="jumlah[]" placeholder="xxxxxxxxx"></td>
			<td><input class="form-control currency" name="harga[]" placeholder="xxxxxxxxx"></td>
			<td><input type="date" class="form-control" name="tgl_expired[]" placeholder="xxxxxxxxx"></td>
			<td><button class="btn btn-primary" onclick="openForm()" type="button">+</button> <button class="btn btn-danger" id="removeRow">X</button> </td>
		</tr>`
		$("#tbl-detail tbody").append(content);
		$('select[name^=id_barang]').last().select2({
			placeholder: "Pilih Kode / Nama Barang",
			allowClear: false,
			data: dataBarang
		});
		$('.currency').last().inputmask({
			alias: 'numeric',
			groupSeparator: '.',
			digits: 0,
			digitsOptional: false,
			prefix: 'Rp ',
			placeholder: '0'
		});
	}

	$('#supplier').on('change', function(e) {
		$('#btndetail').prop('disabled', false);
		$('#btnsubmt').prop('disabled', false);
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
				$.post('deletebarang', {
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

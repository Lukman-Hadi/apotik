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
		<div class="row">
			<div class="col-5">
				<form action="savebarangkeluar" id="fff" method="POST" enctype="multipart/form-data">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Input Barang Keluar</h3>
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
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Tanggal</label>
										<input type="date" class="form-control" name="tgl_transaksi">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Barang Keluar</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="tbl-keluar" class="table table-bordered table-striped">
								<thead>
									<tr style="width: 100%;">
										<th style="width: 50%;">Barang</th>
										<th>Kode Batch</th>
										<th style="width: 15%;">Jumlah</th>
										<th style="width: 10%;"></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-outline-primary" id="btnsubmt">Proses</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-7">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Daftar Barang Apotik</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="tbl-barang" class="table table-bordered table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Kode Batch</th>
									<th style="width: 5%;">Total</th>
									<th style="width: 15%;">Tanggal Expired</th>
									<th style="width: 5%;"></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$(document).ready(function() {
		const table = $('#tbl-barang').DataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			order: [0, 'asc'],
			aLengthMenu: [
				[10, 50, 100, -1],
				[10, 50, 100, 'all']
			],
			ajax: {
				url: "getstockkeluar", // URL file untuk proses select datanya
				type: "POST"
			},
			columns: [{
					data: "kode_barang",
					name: 'kode_barang',
				}, // Tampilkan nis
				{
					data: "nama_barang",
					name: 'nama_barang',
				}, // Tampilkan nama
				{
					data: "kode_batch",
					name: 'kode_batch',
					orderable: false,
					render: function(data, type, row) {
						if (!data) {
							return 'kosong'
						} else {
							return data
						}
					}
				}, // Tampilkan alamat
				{
					data: "total",
					name: 'total',
					orderable: false,
					render: function(data, type, row) {
						if (!data) {
							return 'kosong'
						} else {
							return data
						}
					}
				}, // Tampilkan alamat
				{
					data: "tgl_expired",
					name: 'tgl_expired',
					orderable: false,
					render: function(data, type, row) {
						if (!data) {
							return 'kosong'
						} else {
							return data
						}
					}
				}, // Tampilkan telepon
				{
					data: "action",
					name: 'action',
					orderable: false,
					searchable: false
				}, // Tampilkan telepon
			],
		});
		$(document).on('click', '#removeRow', function() {
			$(this).closest('#inputFormRow').remove();
		});
		$('body').on('click', '.masuk', function() {
			let data = table.row($(this).parents('tr')).data();
			addRow(data)
		});
	});

	function addRow(data) {
		// console.log(`data`, data)
		if (data.total > 0) {
			let id = data.combined_key;
			if ($(`#${id}`).length) {
				let jumlah = parseInt($(`#${id}`).val());
				if (jumlah < parseInt(data.total)) {
					jumlah++;
					$(`#${id}`).val(jumlah);
				} else {
					Toast.fire({
						icon: 'error',
						title: 'Sudah Maksimal.'
					})
				}
			} else {
				let content = `<tr id="inputFormRow">
			<td>${data.kode_barang} - ${data.nama_barang}</td>
			<td>${data.kode_batch}</td>
			<td><input type="hidden" name="id_stok[]" value="${data.id_stok}"><input type="hidden" name="harga[]" value="${data.harga}"><input type="hidden" name="tgl_expired[]" value="${data.tgl_expired}"><input type="hidden" name="kode_batch[]" value="${data.kode_batch}"><input type="hidden" name="id_barang[]" value="${data.id_barang}"><input type="number" id="${data.combined_key}" class="form-control" min="1" max="${data.total}" name="jumlah[]" value="1" placeholder=""></td>
			<td><button class="btn btn-danger" id="removeRow">X</button> </td>
			</tr>`
				$("#tbl-keluar tbody").append(content);
			}
		} else {
			Toast.fire({
				icon: 'error',
				title: 'Barang Kosong.'
			})
		}

	}
</script>

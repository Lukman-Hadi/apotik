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
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Stok Barang</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<a href="<?= base_url() . 'export/exportstok' ?>" class="btn btn-info btn-rounded">Export Excel</a>
						<a href="<?= base_url() . 'cetak/stok' ?>" target="_blank" class="btn btn-secondary btn-neutral">Print</a>
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
						<table id="tbl-barang" class="table table-bordered table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Kode Batch</th>
									<th>Harga</th>
									<th>Jumlah Stok</th>
									<th>Tgl Expired</th>
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
			order: [0, 'asc'],
			aLengthMenu: [
				[10, 50, 100, -1],
				[10, 50, 100, 'all']
			],
			ajax: {
				url: "getstock", // URL file untuk proses select datanya
				type: "POST"
			},
			columns: [{
					data: "kode_barang",
					name: 'kode_barang',
				}, // Tampilkan nis
				{
					data: "nama_barang",
					name: 'nama_barang'
				}, // Tampilkan nama
				{
					data: "kode_batch",
					name: 'kode_batch',
					render: function(data, type, row) {
						if (!data) {
							return 'kosong'
						} else {
							return data
						}
					}
				}, // Tampilkan alamat
				{
					data: "harga",
					name: 'harga',
				}, // Tampilkan alamat
				{
					data: "total",
					name: 'total',
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
					render: function(data, type, row) {
						if (!data) {
							return 'kosong'
						} else {
							return data
						}
					}
				} // Tampilkan telepon
			],
		});
	});
</script>

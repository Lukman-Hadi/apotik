<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= totalBarang() ?></h3>

							<p>Jenis Barang</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="<?= base_url() ?>admin/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= getTotalBarangKeluar()->total ?></h3>

							<p>Total Transaksi Barang Keluar Bulan Ini</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url() ?>admin/riwayatkeluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= getTotalBarangMasuk()->total ?></h3>

							<p>Total Transaksi Barang Masuk Bulan Ini</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?= base_url() ?>admin/riwayatmasuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= totalBaranghampirhabis()->total ?></h3>

							<p>Jenis Barang Hampir Habis</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-7 connectedSortable">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Barang Hampir Habis</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table" style="width: 100%;">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th style="width: 20%">Stok Saat Ini</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($stokHampirHabis as $stok) {
										echo '<tr>';
										echo "<td>$no</td>";
										echo "<td>$stok->kode_barang</td>";
										echo "<td>$stok->nama_barang</td>";
										echo "<td>$stok->totalsem</td>";
										echo '</tr>';
										$no++;
									} ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<a type="button" href="report/hampirhabis" class="btn btn-info float-right"><i class="fas fa-eye"></i> Lihat Semua</a>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.Left col -->
				<!-- right col (We are only adding the ID to make the widgets sortable)-->
				<section class="col-lg-5 connectedSortable">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Barang Hampir Kadaluarsa</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table" style="width: 100%;">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Nama Barang</th>
										<th>Kode Batch</th>
										<th>Jumlah</th>
										<th style="width: 20%">Tanggal Expired</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($stokHampirKadaluarsa as $stok) {
										echo '<tr>';
										echo "<td>$no</td>";
										echo "<td>$stok->nama_barang</td>";
										echo "<td>$stok->kode_batch</td>";
										echo "<td>$stok->total</td>";
										echo "<td>$stok->tgl_expired</td>";
										echo '</tr>';
										$no++;
									} ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<a type="button" href="report/hampirkadaluarsa" class="btn btn-info float-right"><i class="fas fa-eye"></i> Lihat Semua</a>
						</div>
					</div>
				</section>
				<!-- right col -->
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
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
				}, // Tampilkan telepon
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
	});
</script>

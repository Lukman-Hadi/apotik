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
						<div class="row">
							<div class="col-6">
								<a href="<?= base_url() . 'export/exportStokBarangMasuk?start=' . $start . '&end=' . $end ?>" class="btn btn-info btn-rounded">Export Excel</a>
								<a href="<?= base_url() . 'cetak/laporanbarangmasuk?start=' . $start . '&end=' . $end ?>" target="_blank" class="btn btn-secondary btn-neutral">Print</a>
							</div>
							<div class="col-6">
								<div class="form-group">
									<div class="input-group">
										<button type="button" class="btn btn-default float-right" id="daterange-btn" onclick="test()">
											<i class="far fa-calendar-alt"></i> <span id="reportrange"><span> Pilih Rentang Waktu</span></span>
											<i class="fas fa-caret-down"></i>
										</button>
										<form action="barangmasuk" method="POST">
											<input type="hidden" name="datestart">
											<input type="hidden" name="dateend">
											<button class="btn btn-primary ml-3">Cari</button>
										</form>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Daftar Barang Masuk</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table class="table table-striped" style="width:100%;">
							<thead>
								<tr>
									<th style="width:20%;">Kode Barang</th>
									<th style="width:20%;">Nama Barang</th>
									<th>Kode Batch</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Total</th>
									<th>Tanggal Expired</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($data)) {
									foreach ($data as $d) {
										echo '<tr>';
										echo "<td>$d->kode_barang</td>";
										echo "<td>$d->nama_barang</td>";
										echo "<td>$d->kode_batch</td>";
										echo "<td>$d->jumlah</td>";
										echo "<td>" . formatRupiah($d->harga) . "</td>";
										echo "<td>" . formatRupiah($d->total) . "</td>";
										echo "<td>$d->tgl_expired</td>";
										echo '</tr>';
									}
								}
								?>
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
		const uang = new Intl.NumberFormat('ID-id', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0
		});
		$('#daterange-btn').daterangepicker({
				ranges: {
					'Hari ini': [moment(), moment()],
					'Kemarin': [moment().subtract('days', 1), moment().subtract('days', 1)],
					'7 Hari yang lalu': [moment().subtract('days', 6), moment()],
					'30 Hari yang lalu': [moment().subtract('days', 29), moment()],
					'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
					'Bulan kemarin': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
					'Tahun ini': [moment().startOf('year').startOf('month'), moment().endOf('year').endOf('month')],
					'Tahun kemarin': [moment().subtract('year', 1).startOf('year').startOf('month'), moment().subtract('year', 1).endOf('year').endOf('month')]
				},
				showDropdowns: true,
				format: 'YYYY-MM-DD',
				startDate: moment().startOf('year').startOf('month'),
				endDate: moment().endOf('year').endOf('month')
			},
			function(start, end) {
				$('#reportrange span').html(start.format('D MMM YYYY') + ' - ' + end.format('D MMM YYYY'));
				$('input[name=datestart]').val(start.format('YYYY-MM-DD'));
				$('input[name=dateend]').val(end.format('YYYY-MM-DD'));
			});
	});
</script>

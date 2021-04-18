<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row mb-2">
							<div class="m-1" style="height: 70px; width:70px">
								<img src="<?= base_url() . 'assets/img/' . perusahaan()->logo ?>" width="70px" alt="" srcset="">
							</div>
							<div class="col" style="height: 70px;">
								<div class="row" style="height: 1/3;">
									<div class="col"> <?= perusahaan()->nama ?></div>
								</div>
								<div class="row" style="height: 1/3;">
									<div class="col"> <?= perusahaan()->alamat ?></div>
								</div>
								<div class="row" style="height: 1/3;">
									<div class="col"> <?= perusahaan()->email ?> - <?= perusahaan()->telp ?></div>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info mb-2">
							<!-- /.col -->
							<div class="col-sm-6 invoice-col">
								<b>No Faktur: <?= $data['kode_faktur'] ?></b><br>
								<b>GrandTotal:</b> <?= formatRupiah($data['jumlah']) ?><br>
								<b>Tanggal Transaksi:</b> <?= $data['tgl_transaksi'] ?><br>
							</div>
							<!-- /.col -->
							<div class="col-sm-6 invoice-col text-right">
								Pembeli
								<address>
									<strong><?= $data['pembeli'] ?></strong><br>
								</address>
							</div>
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped" style="width: 100%;">
									<thead>
										<tr>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
											<th style="width: 10%;">Kode Batch</th>
											<th>Jumlah</th>
											<th style="width: 12%;">Tanggal Expired</th>
											<th style="width: 12%;">Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php $jumlahBarang = 0;
										foreach ($data['detail'] as $d) {
											echo '<tr>';
											echo "<td>$d->kode_barang</td>";
											echo "<td>$d->nama_barang</td>";
											echo "<td>$d->kode_batch</td>";
											echo "<td>$d->jumlah</td>";
											echo "<td>$d->tgl_expired</td>";
											echo "<td>" . formatRupiah($d->total) . "</td>";
											echo '</tr>';
											$jumlahBarang += $d->jumlah;
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-6">

							</div>
							<!-- /.col -->
							<div class="col-6">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<th style="width:50%">Total</th>
											<td>: <?= formatRupiah($data['jumlah']) ?><br>(<?= terbilang($data['jumlah']) ?> Rupiah)</td>
										</tr>
										<tr>
											<th>Total Barang</th>
											<td>: <?= $jumlahBarang ?> Barang</td>
										</tr>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<button class="btn btn-default" onclick="print()"><i class="fas fa-print"></i> Print</button>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
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

		function print() {
			window.print();
		}
	});
</script>

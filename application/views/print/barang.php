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
						<h3 class="text-center"><?= $title ?></h3>
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
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped" style="width:100%;">
									<thead>
										<tr>
											<th style="width:30%;">Kode Barang</th>
											<th style="width:30%;">Nama Barang</th>
											<th>Satuan</th>
											<th style="width:20%;">Harga</th>
											<th>Deskripsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($data as $d) {
											echo '<tr>';
											echo "<td>$d->kode_barang</td>";
											echo "<td>$d->nama_barang</td>";
											echo "<td>$d->satuan</td>";
											echo "<td>" . formatRupiah($d->harga) . "</td>";
											echo "<td>$d->deskripsi</td>";
											echo '</tr>';
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
		window.print();

		function print() {
			window.print();
		}
	});
</script>

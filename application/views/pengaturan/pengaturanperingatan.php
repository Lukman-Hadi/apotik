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
			<div class="col-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Pengaturan Peringatan</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" enctype="multipart/form-data" method="POST" action="<?= base_url() ?>admin/saveperingatan">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Peringatan Kadaluarsa (bulan)</label>
								<input type="number" class="form-control" id="exampleInputEmail1" name="kadaluarsa" value="<?= $data->peringatan_kadaluarsa ?>">
							</div>
							<input type="hidden" name="id" value="<?= $data->id ?>">
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
	</section>
</div>

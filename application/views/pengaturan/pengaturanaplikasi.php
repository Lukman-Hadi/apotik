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
						<h3 class="card-title">Identitas Apotik</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" enctype="multipart/form-data" method="POST" action="<?= base_url() ?>admin/saveperusahaan">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Apotik</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="<?= $data->nama ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Alamat</label>
								<textarea type="" class="form-control" id="exampleInputPassword1" name="alamat"><?= $data->alamat ?></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Logo</label>
								<div class="input-group">
									<input type="file" class="control" id="exampleInputFile" name="logo">
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= $data->email ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Telpon</label>
								<input type="text" class="form-control" id="exampleInputEmail1" name="telp" value="<?= $data->telp ?>">
							</div>
							<label>Logo Saat Ini</label>
							<img src="<?= base_url() . 'assets/img/' . $data->logo ?>" alt="" width="250px" class="img-fluid">
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

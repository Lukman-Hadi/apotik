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
						<h3 class="card-title">Tambah Barang</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<button class="btn btn-primary btn-rounded" onclick="newForm()">Tambah User Baru</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Daftar User Apotik</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="tbl-barang" class="table table-bordered table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Username</th>
									<th style="width: 70%;">Nama User</th>
									<th style="width: 10%;">Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" id="modal-upload">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Extra Large Modal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="up" method="post" enctype="multipart/form-data" action="<?= base_url() ?>importn/upload">
					<input type="file" name="file" class="form-control">
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
						<label>Username</label>
						<input type="text" class="form-control form-control-sm" name="username">
					</div>
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" class="form-control form-control-sm" name="nama">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control form-control-sm" name="password">
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
				url: "getuser", // URL file untuk proses select datanya
				type: "POST"
			},
			columns: [{
					data: "username",
					name: 'username',
				}, // Tampilkan nis
				{
					data: "nama",
					name: 'nama'
				}, // Tampilkan nama
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
		url = 'saveuser';
	}

	function formUpload() {
		$('#modal-upload').modal('toggle');
	}

	function edit(row) {
		$('#modal-form').modal('toggle');
		$('#ff').trigger("reset");
		$('#ff').trigger("clear");
		url = 'saveuser';
		$('input[name=nama]').val(row.nama);
		$('input[name=username]').val(row.username);
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
				$.post('deleteuser', {
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
</script>

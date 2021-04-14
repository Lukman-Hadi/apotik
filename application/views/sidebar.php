<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url() ?>assets/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>assets/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">ADMIN</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url() ?>admin" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>admin/supplier" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Data Supplier
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-warehouse"></i>
						<p>
							Barang
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/barang" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Daftar Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/stok" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Stok Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/barangmasuk" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/barangkeluar" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Barang Keluar</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-warehouse"></i>
						<p>
							Pengaturan
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="pages/layout/top-nav.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pengaturan Peringatan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pages/layout/top-nav-sidebar.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pengaturan Aplikasi</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">EXAMPLES</li>
				<li class="nav-item">
					<a href="pages/calendar.html" class="nav-link">
						<i class="nav-icon far fa-calendar-alt"></i>
						<p>
							Calendar
							<span class="badge badge-info right">2</span>
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

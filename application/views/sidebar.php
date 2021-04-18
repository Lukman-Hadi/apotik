<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<span class="brand-text font-weight-light"><?= perusahaan()->nama ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() . 'assets/img/' . perusahaan()->logo ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->nama ?></a>
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
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Data Pengguna
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/user" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/supplier" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Supplier</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-warehouse"></i>
						<p>
							Gudang
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
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-cash-register"></i>
						<p>
							Transaksi
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
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
						<i class="nav-icon fas fa-history"></i>
						<p>
							Riwayat Transaksi
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/riwayatmasuk" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Riwayat Barang Masuk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/riwayatkeluar" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Riwayat Barang Keluar</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
							Pengaturan
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/pengaturanperingatan" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pengaturan Peringatan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/pengaturanaplikasi" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pengaturan Aplikasi</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-file-alt"></i>
						<p>
							Laporan
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									Laporan Stok
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>report/stok" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Laporan Stok</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/hampirhabis" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p style="font-size:small">Laporan Stok Hampir Habis</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/hampirkadaluarsa" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p style="font-size:small">Laporan Stok Hampir Kadaluarsa</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/kadaluarsa" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Laporan Stok Kadaluarsa</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>report/barangkeluar" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Barang Keluar</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>report/barangmasuk" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Laporan Barang Masuk</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>admin/logout" class="nav-link">
						<i class="nav-icon fa fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!is_login()) redirect(site_url('login'));
		$this->load->model('Global_model', 'gmodel');
		$this->load->model('Backend_model', 'bmodel');
		$this->load->model('Dashboard_model', 'dmodel');
	}

	function index()
	{
		$data['title']  = 'Dashboard';
		$data['stokHampirHabis'] = $this->dmodel->getTotalBarangHampirHabis(10);
		$data['stokHampirKadaluarsa'] = $this->dmodel->getTotalBarangHampirKadaluarsa(10);
		$data['css_files'][] = '';
		$data['js_files'][] = '';
		$this->template->load('template', 'dashboard', $data);
		// $data = $this->dmodel->getTotalBarangHampirKadaluarsa(10);
		// header('Content-Type: application/json');
		// echo json_encode($data);
	}
	//user
	function user()
	{
		$data['title']  = 'Daftar User Apotik';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$this->template->load('template', 'users/listuser', $data);
	}
	function saveUser()
	{
		if ($this->input->is_ajax_request()) {
			if (strlen($this->input->post('id')) != 0) {
				if ($this->input->post('password') != 0) {
					$nama           = $this->input->post('nama', TRUE);
					$username       = $this->input->post('username', TRUE);
					$password       = $this->input->post('password', TRUE);
					$options        = array("cost" => 4);
					$hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);
					$user = array(
						'username'	=> $username,
						'nama'		=> $nama,
						'password'	=> $hashPassword
					);
					$result = $this->gmodel->update('tbl_user', $user, array('id' => $user['id']));
				} else {
					$nama           = $this->input->post('nama', TRUE);
					$username       = $this->input->post('username', TRUE);
					$user = array(
						'username'	=> $username,
						'nama'		=> $nama,
					);
					$result = $this->gmodel->update('tbl_user', $user, array('id' => $user['id']));
				}
			} else {
				$nama           = $this->input->post('nama', TRUE);
				$username       = $this->input->post('username', TRUE);
				$password       = $this->input->post('password', TRUE);
				$options        = array("cost" => 4);
				$hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);
				$user = array(
					'username'	=> $username,
					'nama'		=> $nama,
					'password'	=> $hashPassword
				);
				$result = $this->gmodel->insert('tbl_user', $user);
			}
			if ($result) {
				echo json_encode(array('message' => 'Update Success'));
			} else {
				echo json_encode(array('errorMsg' => 'Some errors occured.'));
			}
		} else {
			show_404($page = '', $log_error = TRUE);
		}
	}
	function getUser()
	{
		header('Content-Type: application/json');
		echo $this->bmodel->getUser()
			->add_column('action', '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>')
			->generate();
	}
	function deleteUser()
	{
		$data = $this->input->post('id', TRUE);
		$result = $this->gmodel->delete('tbl_user', array('id' => $data));
		if ($result) {
			echo json_encode(array('message' => 'Delete Success'));
		} else {
			echo json_encode(array('errorMsg' => 'Some errors occured.'));
		}
	}
	//enduser
	//supplier
	function supplier()
	{
		$data['title']  = 'Daftar Supplier Apotik';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$this->template->load('template', 'supplier/supplier', $data);
	}
	function saveSupplier()
	{
		if ($this->input->is_ajax_request()) {
			if (strlen($this->input->post('id')) != 0) {
				$supplier = $this->input->post();
				$result = $this->gmodel->update('tbl_supplier', $supplier, array('id' => $supplier['id']));
			} else {
				$supplier = $this->input->post();
				$result = $this->gmodel->insert('tbl_supplier', $supplier);
			}
			if ($result) {
				echo json_encode(array('message' => 'Update Success'));
			} else {
				echo json_encode(array('errorMsg' => 'Some errors occured.'));
			}
		} else {
			show_404($page = '', $log_error = TRUE);
		}
	}
	function getSupplier()
	{
		header('Content-Type: application/json');
		echo $this->bmodel->getSupplier()
			->add_column('action', '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>')
			->generate();
	}
	function deleteSupplier()
	{
		$data = $this->input->post('id', TRUE);
		$result = $this->gmodel->delete('tbl_supplier', array('id' => $data));
		if ($result) {
			echo json_encode(array('message' => 'Delete Success'));
		} else {
			echo json_encode(array('errorMsg' => 'Some errors occured.'));
		}
	}
	function isSupplier()
	{
		$this->output->set_content_type('application/json');
		$data = $this->bmodel->getIsSupplier();
		echo json_encode($data);
	}
	//endsupplier
	//barang
	function barang()
	{
		$data['title']  = 'Daftar Barang Apotik';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.print.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';
		$this->template->load('template', 'barang/listbarang', $data);
	}
	function saveBarang()
	{
		if ($this->input->is_ajax_request()) {
			if (strlen($this->input->post('id')) != 0) {
				$barang = $this->input->post();
				$result = $this->gmodel->update('tbl_barang', $barang, array('id' => $barang['id']));
			} else {
				$barang = $this->input->post();
				$result = $this->gmodel->insert('tbl_barang', $barang);
			}
			if ($result) {
				echo json_encode(array('message' => 'Update Success'));
			} else {
				echo json_encode(array('errorMsg' => 'Some errors occured.'));
			}
		} else {
			show_404($page = '', $log_error = TRUE);
		}
	}
	function getBarang()
	{
		header('Content-Type: application/json');
		$action = array('action' => '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>');
		$data = $this->bmodel->getBarang();
		$modified = array();
		foreach ($data['data'] as $d) {
			$modified[] = array_merge($d, $action);
		}
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $modified
		);
		header('Content-Type: application/json');
		echo json_encode($callback);
	}
	function isBarang()
	{
		$this->output->set_content_type('application/json');
		$data = $this->bmodel->getIsBarang();
		echo json_encode($data);
	}
	function deletebarang()
	{
		$data = $this->input->post('id', TRUE);
		$result = $this->gmodel->softDelete('tbl_barang', $data);
		if ($result) {
			echo json_encode(array('message' => 'Delete Success'));
		} else {
			echo json_encode(array('errorMsg' => 'Some errors occured.'));
		}
	}
	public function downloadTemplate()
	{
		force_download('assets/files/templatebarang.xlsx', NULL);
	}
	//endbarang
	//stok
	function stok()
	{
		$data['title']  = 'Daftar Stok Barang Apotik';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.print.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';
		$this->template->load('template', 'barang/stok', $data);
	}
	function getStock()
	{
		// header('Content-Type: application/json');
		// echo $this->bmodel->getStock()
		// 	->add_column('action', '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>')
		// 	->generate();
		$data = $this->bmodel->getStock();
		$action = array('action' => '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>');
		$modified = array();
		foreach ($data['data'] as $d) {
			$modified[] = array_merge($d, $action);
		}
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $modified
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function saveStock()
	{
		if ($this->input->is_ajax_request()) {
			if (strlen($this->input->post('id')) != 0) {
				$barang = $this->input->post();
				$result = $this->gmodel->update('tbl_stok', $barang, array('id' => $barang['id']));
			} else {
				echo json_encode(array('errorMsg' => 'Some errors occured.'));
				return;
			}
			if ($result) {
				echo json_encode(array('message' => 'Update Success'));
				return;
			} else {
				echo json_encode(array('errorMsg' => 'Some errors occured.'));
				return;
			}
		} else {
			show_404($page = '', $log_error = TRUE);
		}
	}
	function deleteStock()
	{
		$data = $this->input->post('id', TRUE);
		$result = $this->gmodel->delete('tbl_stok', array('id' => $data));
		if ($result) {
			echo json_encode(array('message' => 'Delete Success'));
		} else {
			echo json_encode(array('errorMsg' => 'Some errors occured.'));
		}
	}
	function getStockKeluar()
	{
		// header('Content-Type: application/json');
		// echo $this->bmodel->getStock()
		// 	->add_column('action', '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>')
		// 	->generate();
		$data = $this->bmodel->getStockKeluar();
		$action = array('action' => '<button class="masuk btn btn-success btn-sm">Tambah</button>');
		$modified = array();
		foreach ($data['data'] as $d) {
			$modified[] = array_merge($d, $action);
		}
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $modified
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function isBatch()
	{
		$kode = $this->input->get('kode');
		$this->output->set_content_type('application/json');
		$data = $this->bmodel->getIsBatch($kode);
		echo json_encode($data);
	}
	public function downloadTemplateStok()
	{
		force_download('assets/files/templatestok.xlsx', NULL);
	}
	//endstok
	//barang masuk
	function barangMasuk()
	{
		$data['title']  = 'Input Barang Masuk';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/select2/css/select2.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/select2/js/select2.full.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/inputmask/jquery.inputmask.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/inputmask/bindings/inputmask.binding.js';
		$this->template->load('template', 'barang/barangmasuk', $data);
	}
	function saveBarangMasuk()
	{
		$data = $this->input->post();
		$kdFaktur = $data['kode_faktur'];
		$kdSupllier = $data['kode_supplier'];
		$tglTransaksi = $data['tgl_transaksi'];
		$grandtotal = $data['grandtotal'];
		$dataFaktur = array(
			'kode_faktur'	=> $kdFaktur,
			'id_supplier'	=> $kdSupllier,
			'tgl_transaksi'	=> $tglTransaksi,
			'grandtotal'	=> filter_var(str_replace(".", "", $grandtotal), FILTER_SANITIZE_NUMBER_INT)
		);
		$q1 = $this->gmodel->insert('tbl_barang_masuk', $dataFaktur);
		if ($q1) {
			$dataRinci = array();
			$dataStok = array();
			for ($i = 0; $i < count($data['id_barang']); $i++) {
				$harga = filter_var(str_replace(".", "", $data['harga'][$i]), FILTER_SANITIZE_NUMBER_INT);
				$dataRinci[] = array(
					'id_barang_masuk'	=> $q1,
					'id_barang' 		=> $data['id_barang'][$i],
					'kode_batch' 		=> $data['kode_batch'][$i],
					'tgl_expired' 		=> $data['tgl_expired'][$i],
					'jumlah'			=> $data['jumlah'][$i],
					'harga'				=> $harga,
					'total'				=> $data['jumlah'][$i] * $harga,
				);
				$dataStok = array(
					'id_barang' 	=> $data['id_barang'][$i],
					'kode_batch' 	=> $data['kode_batch'][$i],
					'tgl_expired' 	=> $data['tgl_expired'][$i],
					'total'			=> intval($data['jumlah'][$i], 10),
					'harga'			=> $harga,
					'combined_key'	=> $data['id_barang'][$i] . '-' . $data['kode_batch'][$i],
				);
				$q3 = $this->gmodel->insertorupdateincrement('tbl_stok', $dataStok);
				if (!$q3) {
					echo 'error';
					break;
					return;
				}
			}
			$q2 = $this->gmodel->insertbatch('tbl_barang_masuk_detail', $dataRinci);
			if ($q2) {
				return redirect(base_url() . 'admin/detailmasuk/' . $q1);
			} else {
				echo 'failde q2';
			}
		} else {
			echo 'failed q1';
		}
	}
	//end barang masuk
	//barang keluar
	function barangKeluar()
	{
		$data['title']  = 'Input Barang Keluar';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/select2/css/select2.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/select2/js/select2.full.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/inputmask/jquery.inputmask.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/inputmask/bindings/inputmask.binding.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$this->template->load('template', 'barang/barangkeluarnew', $data);
	}
	function saveBarangKeluar()
	{
		$data = $this->input->post();
		$kdFaktur = $data['kode_faktur'];
		$tglTransaksi = $data['tgl_transaksi'];
		//perhitungan harga
		$jumlah = 0;
		for ($i = 0; $i < count($data['id_stok']); $i++) {
			$jumlah += intval($data['jumlah'][$i], 10) * intval($data['harga'][$i], 10);
		}
		//ganti admin jadi session
		$dataBarangKeluar = array(
			'kode_faktur' 	=> $kdFaktur,
			'pembeli'		=> $this->session->nama,
			'jumlah'		=>  $jumlah,
			'tgl_transaksi'	=> $tglTransaksi
		);
		$q1 = $this->gmodel->insert('tbl_barang_keluar', $dataBarangKeluar);
		$dataStokKeluar = array();
		$flag = 0;
		if ($q1) {
			//kurangi stok
			for ($i = 0; $i < count($data['id_barang']); $i++) {
				$where = array('id' => $data['id_stok'][$i]);
				$update = $this->bmodel->decrementStock($where, $data['jumlah'][$i]);
				if (!$update) {
					$flag = 1;
					break;
				}
				$jumlahSatuan = intval($data['jumlah'][$i], 10);
				$hargaSatuan = intval($data['harga'][$i], 10);
				$tglExpired = $data['tgl_expired'][$i];
				$dataStokKeluar[] = array(
					'id_barang_keluar' 	=> $q1,
					'id_barang'			=> $data['id_barang'][$i],
					'kode_batch'		=> $data['kode_batch'][$i],
					'total'				=> $jumlahSatuan * $hargaSatuan,
					'jumlah'			=> $jumlahSatuan,
					'harga'				=> $hargaSatuan,
					'tgl_expired'		=> $tglExpired,
				);
			}
			if ($flag == 1) {
				echo 'error';
				return;
			}
			$q2 = $this->gmodel->insertbatch('tbl_barang_keluar_detail', $dataStokKeluar);
			if ($q2) {
				$this->gmodel->deleteEmpty();
				return redirect(base_url() . 'admin/detailkeluar/' . $q1);
			} else {
				echo 'failde q2';
			}
		} else {
			echo 'failed q1';
		}
	}
	//endbarang keluar
	//riwayat//
	function riwayatMasuk()
	{
		$data['title']  = 'Daftar Riwayat Barang Masuk';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$this->template->load('template', 'riwayat/riwayatmasuk', $data);
	}
	function getRiwayatMasuk()
	{
		$data = $this->bmodel->getRiwayatMasuk();
		$modified = array();
		foreach ($data['data'] as $d) {
			$action = array('action' => '<a href="' . base_url() . 'admin/detailmasuk/' . $d['id'] . '" class="btn btn-success btn-sm">Detail</a> <button class="delete btn btn-danger btn-sm">Delete</button>');
			$modified[] = array_merge($d, $action);
		}
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $modified
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function detailMasuk()
	{
		$id = $this->uri->segment(3, 0);
		// header('Content-Type: application/json');
		// echo json_encode($this->bmodel->getRiwayatById($id));
		$data['data'] = $this->bmodel->getRiwayatMasukById($id);
		$data['title']  = 'Detail';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('template', 'riwayat/detail', $data);
	}
	function destroyRiwayatMasuk()
	{
		$data = $this->input->post('id', TRUE);
		$result = $this->gmodel->delete('tbl_barang_masuk', array('id' => $data));
		if ($result) {
			echo json_encode(array('message' => 'Delete Success'));
		} else {
			echo json_encode(array('errorMsg' => 'Some errors occured.'));
		}
	}
	function riwayatKeluar()
	{
		$data['title']  = 'Daftar Riwayat Barang Masuk';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables/jquery.dataTables.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js';
		$this->template->load('template', 'riwayat/riwayatkeluar', $data);
	}
	function getRiwayatKeluar()
	{
		$data = $this->bmodel->getRiwayatKeluar();
		$modified = array();
		foreach ($data['data'] as $d) {
			$action = array('action' => '<a href="' . base_url() . 'admin/detailkeluar/' . $d['id'] . '" class="btn btn-success btn-sm">Detail</a> <button class="delete btn btn-danger btn-sm">Delete</button>');
			$modified[] = array_merge($d, $action);
		}
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $modified
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function detailKeluar()
	{
		$id = $this->uri->segment(3, 0);
		// header('Content-Type: application/json');
		// echo json_encode($this->bmodel->getRiwayatById($id));
		$data['data'] = $this->bmodel->getRiwayatKeluarById($id);
		$data['title']  = 'Detail';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('template', 'riwayat/detailkeluar', $data);
	}
	function destroyRiwayatKeluar()
	{
		$data = $this->input->post('id', TRUE);
		$result = $this->gmodel->delete('tbl_barang_keluar', array('id' => $data));
		if ($result) {
			echo json_encode(array('message' => 'Delete Success'));
		} else {
			echo json_encode(array('errorMsg' => 'Some errors occured.'));
		}
	}
	//endriwayat//
	//pengaturan//
	function pengaturanAplikasi()
	{
		$data['title']  = 'Pengaturan Aplikasi';
		$data['data']  = $this->bmodel->getInfoPerusahaan();
		$data['css_files'][] = '';
		$data['js_files'][] = '';
		$this->template->load('template', 'pengaturan/pengaturanaplikasi', $data);
	}
	function pengaturanPeringatan()
	{
		$data['title']  = 'Pengaturan Peringatan';
		$data['data']  = $this->bmodel->getInfoPeringatan();
		$data['css_files'][] = '';
		$data['js_files'][] = '';
		$this->template->load('template', 'pengaturan/pengaturanperingatan', $data);
	}
	function savePerusahaan()
	{
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$email 			= $this->input->post('email');
		$telp 			= $this->input->post('telp');
		$image          = $this->upload_users();
		$id 			= $this->input->post('id');
		if ($image['file_name'] == '') {
			$data = array(
				'nama'		=> $nama,
				'alamat'    => $alamat,
				'email'     => $email,
				'telp'      => $telp,
			);
		} else {
			$data = array(
				'nama'		=> $nama,
				'alamat'    => $alamat,
				'email'     => $email,
				'telp'      => $telp,
				'logo'      => $image['file_name']
			);
		}
		if ($id != null) {
			$q1 = $this->gmodel->update('tbl_perusahaan', $data, array('id' => $id));
		} else {
			$q1 = $this->gmodel->insert('tbl_perusahaan', $data);
		}
		if ($q1) {
			return redirect(base_url() . 'admin/pengaturanaplikasi');
		}
	}
	function savePeringatan()
	{
		$nama 	= $this->input->post('kadaluarsa');
		$id 	= $this->input->post('id');
		$data = array(
			'peringatan_kadaluarsa' => $nama
		);
		if ($id != null) {
			$q1 = $this->gmodel->update('tbl_setting', $data, array('id' => $id));
		} else {
			$q1 = $this->gmodel->insert('tbl_setting', $data);
		}
		if ($q1) {
			return redirect(base_url() . 'admin');
		}
	}
	function upload_users()
	{
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|jpeg|bmp|png|PNG|JPEG|JPG|GIF|BMP';
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->do_upload('logo');
		return $this->upload->data();
	}
	//endpengaturan
	function test()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
		$sql_total = $this->SiswaModel->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->SiswaModel->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->SiswaModel->count_filter($search); // Panggil fungsi count_filter pada SiswaModel
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $sql_total,
			'recordsFiltered' => $sql_filter,
			'data' => $sql_data
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
		$this->load->view('login', 'refresh');
	}
}

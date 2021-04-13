<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!is_login()) redirect(site_url('login'));
		$this->load->model('Global_model', 'gmodel');
		$this->load->model('Backend_model', 'bmodel');
	}

	function index()
	{
		$data['title']  = 'Dashboard';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('template', 'dashboard', $data);
	}
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
		echo $this->bmodel->getBarang()
			->add_column('action', '<button class="edit btn btn-success btn-sm">Edit</button> <button class="delete btn btn-danger btn-sm">Delete</button>')
			->generate();
		// $result = $this->datatables->generate($result);
		// echo json_encode($result);
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
		$result = $this->gmodel->delete('tbl_barang', array('id' => $data));
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
			for ($i = 0; $i < count($data['kode_barang']); $i++) {
				$dataRinci[] = array(
					'kode_faktur' 	=> $data['kode_faktur'],
					'kode_barang' 	=> $data['kode_barang'][$i],
					'kode_batch' 	=> $data['kode_batch'][$i],
					'tgl_expired' 	=> $data['tgl_expired'][$i],
					'jumlah'		=> $data['jumlah'][$i],
					'harga'			=> filter_var(str_replace(".", "", $data['harga'][$i]), FILTER_SANITIZE_NUMBER_INT),
					'total'			=> $data['jumlah'][$i] * $data['harga'][$i],
				);
				$dataStok = array(
					'kode_barang' 	=> $data['kode_barang'][$i],
					'kode_batch' 	=> $data['kode_batch'][$i],
					'tgl_expired' 	=> $data['tgl_expired'][$i],
					'total'			=> intval($data['jumlah'][$i], 10),
					'combined_key'	=> $data['kode_barang'][$i] . '-' . $data['kode_batch'][$i],
				);
				$q3 = $this->gmodel->insertorupdateincrement('tbl_stok', $dataStok);
			}
			$q2 = $this->gmodel->insertbatch('tbl_barang_masuk_detail', $dataRinci);
			// $q3 = $this->gmodel->insertorupdate('tbl_stok', $dataStok);
			// $q3 = $this->db->insert_on_duplicate_update_batch('tbl_stok', $dataStok);
			if ($q2) {
				return redirect(base_url() . 'admin/stok');
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
		$data['css_files'][] = base_url() . 'assets/admin/plugins/select2/css/select2.min.css';
		$data['css_files'][] = base_url() . 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/select2/js/select2.full.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/inputmask/jquery.inputmask.min.js';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/inputmask/bindings/inputmask.binding.js';
		$this->template->load('template', 'barang/barangkeluar', $data);
	}
	function saveBarangKeluar()
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
			for ($i = 0; $i < count($data['kode_barang']); $i++) {
				$dataRinci[] = array(
					'kode_faktur' 	=> $data['kode_faktur'],
					'kode_barang' 	=> $data['kode_barang'][$i],
					'kode_batch' 	=> $data['kode_batch'][$i],
					'tgl_expired' 	=> $data['tgl_expired'][$i],
					'jumlah'		=> $data['jumlah'][$i],
					'harga'			=> filter_var(str_replace(".", "", $data['harga'][$i]), FILTER_SANITIZE_NUMBER_INT),
					'total'			=> $data['jumlah'][$i] * $data['harga'][$i],
				);
				$dataStok = array(
					'kode_barang' 	=> $data['kode_barang'][$i],
					'kode_batch' 	=> $data['kode_batch'][$i],
					'tgl_expired' 	=> $data['tgl_expired'][$i],
					'total'			=> intval($data['jumlah'][$i], 10),
					'combined_key'	=> $data['kode_barang'][$i] . '-' . $data['kode_batch'][$i],
				);
				$q3 = $this->gmodel->insertorupdateincrement('tbl_stok', $dataStok);
			}
			$q2 = $this->gmodel->insertbatch('tbl_barang_masuk_detail', $dataRinci);
			// $q3 = $this->gmodel->insertorupdate('tbl_stok', $dataStok);
			// $q3 = $this->db->insert_on_duplicate_update_batch('tbl_stok', $dataStok);
			if ($q2) {
				return redirect(base_url() . 'admin/stok');
			} else {
				echo 'failde q2';
			}
		} else {
			echo 'failed q1';
		}
	}
	//endbarang keluar
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
}

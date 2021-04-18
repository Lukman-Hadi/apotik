<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!is_login()) redirect(site_url('login'));
		$this->load->model('Global_model', 'gmodel');
		$this->load->model('Backend_model', 'bmodel');
		$this->load->model('Dashboard_model', 'dmodel');
		$this->load->model('Report_model', 'rmodel');
	}
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
		$this->template->load('template', 'report/stok', $data);
	}
	function getStock()
	{
		$data = $this->bmodel->getStock();
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $data['data']
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function hampirhabis()
	{
		$data['title']  = 'Daftar Barang Hampir Habis';
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
		$this->template->load('template', 'report/hampirhabis', $data);
	}
	function getStockHampirHabis()
	{
		$data = $this->rmodel->getStokHampirHabis();
		$callback = array(
			'draw' => $_POST['draw'], // Ini dari datatablenya
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $data['data']
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}
	function hampirKadaluarsa()
	{
		$data['title']  = 'Daftar Barang Hampir Kadaluarsa';
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
		$this->template->load('template', 'report/hampirkadaluarsa', $data);
	}
	function getHampirKadaluarsa()
	{
		$data = $this->rmodel->getStokHampirKadaluarsa();
		$callback = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $data['data']
		);
		header('Content-Type: application/json');
		echo json_encode($callback);
	}
	function kadaluarsa()
	{
		$data['title']  = 'Daftar Barang Kadaluarsa';
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
		$this->template->load('template', 'report/kadaluarsa', $data);
	}
	function getKadaluarsa()
	{
		$data = $this->rmodel->getStokKadaluarsa();
		$callback = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $data['recordsTotal'],
			'recordsFiltered' => $data['recordsFiltered'],
			'data' => $data['data']
		);
		header('Content-Type: application/json');
		echo json_encode($callback);
	}
	function barangKeluar()
	{
		$start = $this->input->post('datestart');
		$end = $this->input->post('dateend');
		if ($start && $end) {
			$data['data'] = $this->rmodel->getBarangKeluar($start, $end);
		}
		$data['title']  = 'Daftar Barang Keluar';
		$data['start']  = $start;
		$data['end']  = $end;
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/moment/moment.min.js';
		$this->template->load('template', 'report/barangkeluar', $data);
	}
	function barangMasuk()
	{
		$start = $this->input->post('datestart');
		$end = $this->input->post('dateend');
		if ($start && $end) {
			$data['data'] = $this->rmodel->getBarangMasuk($start, $end);
		}
		$data['title']  = 'Daftar Barang Masuk';
		$data['start']  = $start;
		$data['end']  = $end;
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . 'assets/admin/plugins/moment/moment.min.js';
		$this->template->load('template', 'report/barangmasuk', $data);
	}
}

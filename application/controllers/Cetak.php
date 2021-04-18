<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!is_login()) redirect(site_url('login'));
		$this->load->model('Backend_model', 'bmodel');
		$this->load->model('Dashboard_model', 'dmodel');
		$this->load->model('Backend_model', 'bmodel');
		$this->load->model('Report_model', 'rmodel');
	}

	function barang()
	{
		// header('Content-Type: application/json');
		// echo json_encode($this->bmodel->getRiwayatById($id));
		$data['data'] = $this->bmodel->getAllBarang()->result();
		$data['title']  = 'Laporan Data Barang';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/barang', $data);
	}
	function stok()
	{
		$data['data'] = $this->bmodel->getAllStok()->result();
		$data['title']  = 'Laporan Data Stok';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/stok', $data);
	}
	function laporanBarang()
	{
		$data['data'] = $this->bmodel->getAllStok()->result();
		$data['title']  = 'Laporan Data Barang';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/stok', $data);
	}
	function laporanhampirhabis()
	{
		$data['data'] = $this->dmodel->getTotalBarangHampirHabis();
		$data['title']  = 'Laporan Barang Hampir Habis';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/hampirhabis', $data);
	}
	function laporanhampirkadaluarsa()
	{
		$data['data'] = $this->dmodel->getTotalBarangHampirKadaluarsa();
		$data['title']  = 'Laporan Barang Hampir Kadaluarsa';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/hampirkadaluarsa', $data);
	}
	function laporankadaluarsa()
	{
		$data['data'] = $this->dmodel->getTotalBarangKadaluarsa();
		$data['title']  = 'Laporan Barang Kadaluarsa';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/kadaluarsa', $data);
	}
	function laporanStok()
	{
	}
	function laporanBarangKeluar()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$data['data'] = $this->rmodel->getBarangKeluar($start, $end);
		$data['title']  = 'Laporan Barang Keluar';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/barangkeluar', $data);
	}
	function laporanBarangMasuk()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$data['data'] = $this->rmodel->getBarangMasuk($start, $end);
		$data['title']  = 'Laporan Barang Masuk';
		$data['css_files'][] = base_url() . '';
		$data['js_files'][] = base_url() . '';
		$this->template->load('templateprint', 'print/barangkeluar', $data);
	}
}

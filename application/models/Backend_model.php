<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Backend_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	function getAllBarang()
	{
		return $this->db->get('tbl_barang');
	}

	// function getBarang()
	// {
	// 	$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
	// 	$limit = $_POST['length']; // Ambil data limit per page
	// 	$start = $_POST['start']; // Ambil data start
	// 	$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
	// 	$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
	// 	$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

	// 	$this->db->select('*')->from('tbl_barang');
	// 	$this->db->like('kode_barang', $search);
	// 	$this->db->or_like('nama_barang', $search);
	// 	$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
	// 	$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

	// 	$this->db->select('*')->from('tbl_barang');
	// 	$this->db->like('kode_barang', $search);
	// 	$this->db->or_like('nama_barang', $search);
	// 	$filtered = $this->db->get()->num_rows();
	// 	$result = array_merge($result, ['recordsFiltered' => $filtered]);

	// 	$total = $this->db->count_all('tbl_barang');
	// 	$result = array_merge($result, ['recordsTotal' => $filtered]);
	// 	return $result;
	// }
	function getBarang()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->datatables->select('*');
		$this->datatables->from('tbl_barang');
		$this->datatables->like('kode_barang', $search);
		return $this->datatables->or_like('nama_barang', $search);
		// $this->datatables->generate();
		// return $result;
	}
	function getSupplier()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->datatables->select('*');
		$this->datatables->from('tbl_supplier');
		return $this->datatables->like('nama_supplier', $search);
		// $this->datatables->generate();
		// return $result;
	}
	function getStock()
	{
		// $search = $this->input->post('search')['value'] ? $this->input->post('search')['value'] : ''; // Ambil data yang di ketik user pada textbox pencarian
		// $limit = $this->input->post('length') ? $this->input->post('length') : 20; // Ambil data limit per page
		// $start = $this->input->post('start') ? $this->input->post('start') : 0; // Ambil data start
		// $order_index = $this->input->post('order')[0]['column'] ? $this->input->post('order')[0]['column'] : 0; // Untuk mengambil index yg menjadi acuan untuk sorting
		// $order_field = $this->input->post('column')[$order_index]['data'] ? $this->input->post('column')[$order_index]['data'] : 's.kode_barang'; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		// $order_ascdesc = $this->input->post('oder')[0]['dir'] ? $this->input->post('oder')[0]['dir'] : ''; // Untuk menentukan order by "ASC" atau "DESC"

		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"


		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.kode_barang = s.kode_barang', 'right outer');
		$this->db->like('s.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 's.kode_barang = b.kode_barang', 'right outer');
		$this->db->like('s.kode_barang', $search);
		$this->db->or_like('b.nama_barang', $search);
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.kode_barang = s.kode_barang', 'right outer');
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;

		// $search = $this->input->post('search')['value']; // Ambil data yang di ketik user pada textbox pencarian
		// $this->datatables->select('tbl_barang.nama_barang, tbl_stok.*');
		// $this->datatables->from('tbl_stok');
		// return $this->datatables->join('tbl_barang', 'tbl_stok.kode_barang=tbl_barang.kode_barang', 'LEFT');
		// $this->datatables->like('tbl_barang.nama_barang', $search);
		// $this->datatables->or_like('tbl_stok.kode_barang', $search);
		// $search = $this->input->post('search')['value']; // Ambil data yang di ketik user pada textbox pencarian
		// $this->datatables->select('tbl_stok.*');
		// $this->datatables->from('tbl_stok');
		// return $this->datatables->join('tbl_barang', 'tbl_stok.kode_barang=tbl_barang.kode_barang', 'LEFT');
		// return $this->datatables->like('tbl_stok.kode_barang', $search);
	}
	function getIsSupplier()
	{
		$data = $this->db->select('id, nama_supplier')->from('tbl_supplier')->get()->result();
		return $data;
	}
	function getIsBarang()
	{
		$data = $this->db->select('id, kode_barang, nama_barang, satuan')->from('tbl_barang')->get()->result();
		return $data;
	}
}

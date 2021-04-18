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
		return $this->db->get_where('tbl_barang', array('is_aktif' => 1));
	}
	function getAllStok()
	{
		$this->db->select('b.nama_barang, b.kode_barang, b.id, s.kode_batch, s.tgl_expired, s.total, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->where('b.is_aktif', 1);
		return $this->db->get();
	}
	function getBarang()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->group_start();
		$this->db->like('kode_barang', $search, 'both');
		$this->db->or_like('nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('is_aktif', 1);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->group_start();
		$this->db->like('kode_barang', $search, 'both');
		$this->db->or_like('nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('is_aktif', 1);
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->where('is_aktif', 1);
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
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
	function getUser()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->datatables->select('*');
		$this->datatables->from('tbl_user');
		return $this->datatables->like('nama', $search);
		// $this->datatables->generate();
		// return $result;
	}
	function getStock()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.is_aktif', 1);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.is_aktif', 1);
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->where('b.is_aktif', 1);
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
	}
	function getStockKeluar()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"


		$this->db->select('b.nama_barang, b.kode_barang, b.id as id_barang, s.id as id_stok, s.kode_batch, s.tgl_expired, s.total, s.combined_key, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.is_aktif', 1);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('b.nama_barang, b.kode_barang, b.id as id_barang, s.id as id_stok, s.kode_batch, s.tgl_expired, s.total, s.combined_key, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.is_aktif', 1);
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('b.nama_barang, b.kode_barang, s.id, s.kode_batch, s.tgl_expired, s.total, s.combined_key, s.harga');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang', 'right outer');
		$this->db->where('b.is_aktif', 1);
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
	}
	function getIsSupplier()
	{
		$data = $this->db->select('id, nama_supplier')->from('tbl_supplier')->get()->result();
		return $data;
	}
	function getIsBarang()
	{
		$data = $this->db->select('id, kode_barang, nama_barang, satuan')->from('tbl_barang')->where('is_aktif', 1)->get()->result();
		return $data;
	}
	function getIsBatch($kode)
	{
		$data = $this->db->select('id, kode_batch, tgl_expired, total')->from('tbl_stok')->where('kode_barang', $kode)->get()->result();
		return $data;
	}
	function getBarangByKode($kode)
	{
		$data = $this->db->get_where('tbl_barang', array('kode_barang' => $kode))->row();
		return $data;
	}
	function decrementStock($where, $data)
	{
		return $this->db->where($where)->set('total', "total - $data", FALSE)->update('tbl_stok');
	}
	function getRiwayatKeluar()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"


		$this->db->select('tbk.*');
		$this->db->from('tbl_barang_keluar tbk');
		$this->db->like('tbk.kode_faktur', $search, 'both');
		$this->db->or_like('tbk.tgl_transaksi', $search, 'both');
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('tbk.*');
		$this->db->from('tbl_barang_keluar tbk');
		$this->db->like('tbk.kode_faktur', $search, 'both');
		$this->db->or_like('tbk.tgl_transaksi', $search, 'both');
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('tbk.*');
		$this->db->from('tbl_barang_keluar tbk');
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
	}
	function getRiwayatMasuk()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"


		$this->db->select('tbm.*, s.nama_supplier');
		$this->db->from('tbl_barang_masuk tbm');
		$this->db->join('tbl_supplier s', 'tbm.id_supplier = s.id', 'LEFT');
		$this->db->like('tbm.kode_faktur', $search, 'both');
		$this->db->or_like('s.nama_supplier', $search, 'both');
		$this->db->or_like('tbm.tgl_transaksi', $search, 'both');
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('tbm.*, s.nama_supplier');
		$this->db->from('tbl_barang_masuk tbm');
		$this->db->join('tbl_supplier s', 'tbm.id_supplier = s.id', 'LEFT');
		$this->db->like('tbm.kode_faktur', $search, 'both');
		$this->db->or_like('s.nama_supplier', $search, 'both');
		$this->db->or_like('tbm.tgl_transaksi', $search, 'both');
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('tbm.*, s.nama_supplier');
		$this->db->from('tbl_barang_masuk tbm');
		$this->db->join('tbl_supplier s', 'tbm.id_supplier = s.id', 'LEFT');
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
	}

	function getRiwayatMasukById($id)
	{

		// $data = $this->db->select('tbm.kode_faktur, tbm.grandtotal, tbm.tgl_transaksi, (SELECT nama_supplier from tbl_supplier where id = tbm.id_supplier) as nama_supplier')->from('tbl_barang_masuk tbm')->get()->row_array();
		$data = $this->db->select('tbm.kode_faktur,tbm.grandtotal,tbm.tgl_transaksi, s.nama_supplier, s.alamat, s.email, s.telp')->from('tbl_barang_masuk tbm')->where('tbm.id', $id)->join('tbl_supplier s', 's.id = tbm.id_supplier')->get()->row_array();
		// $detail = $this->db->get_where('tbl_barang_masuk_detail', array('id_barang_masuk' => $id))->result_array();
		$detail = $this->db->select('td.kode_batch,td.harga,td.tgl_expired,td.jumlah,td.total, b.nama_barang, b.kode_barang')->from('tbl_barang_masuk_detail td')->join('tbl_barang b', 'b.id = td.id_barang')->where('td.id_barang_masuk', $id)->get()->result();
		$data = array_merge($data, ['detail' => $detail]);
		return $data;
	}
	function getRiwayatKeluarById($id)
	{

		// $data = $this->db->select('tbm.kode_faktur, tbm.grandtotal, tbm.tgl_transaksi, (SELECT nama_supplier from tbl_supplier where id = tbm.id_supplier) as nama_supplier')->from('tbl_barang_masuk tbm')->get()->row_array();
		$data = $this->db->select('tbk.kode_faktur,tbk.jumlah,tbk.tgl_transaksi,tbk.pembeli')->from('tbl_barang_keluar tbk')->where('tbk.id', $id)->get()->row_array();
		// $detail = $this->db->get_where('tbl_barang_keluar_detail', array('id_barang_keluar' => $id))->result_array();
		$detail = $this->db->select('td.kode_batch,td.harga,td.tgl_expired,td.jumlah,td.total, b.nama_barang, b.kode_barang')->from('tbl_barang_keluar_detail td')->join('tbl_barang b', 'b.id = td.id_barang')->where('td.id_barang_keluar', $id)->get()->result();
		$data = array_merge($data, ['detail' => $detail]);
		return $data;
	}
	function getInfoPerusahaan()
	{
		return $this->db->get('tbl_perusahaan')->row();
	}
	function getInfoPeringatan()
	{
		return $this->db->get('tbl_setting')->row();
	}
}

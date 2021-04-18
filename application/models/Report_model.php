<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Report_model extends CI_Model
{
	function getStokHampirHabis()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->db->select('b.*, (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) as totalsem');
		$this->db->from('tbl_barang b');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.batas IS NOT NULL');
		$this->db->where('b.batas >= (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id)');
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('b.*, (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) as totalsem');
		$this->db->from('tbl_barang b');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.batas IS NOT NULL');
		$this->db->where('b.batas >= (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id)');
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('b.*, (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) as totalsem');
		$this->db->from('tbl_barang b');
		$this->db->group_start();
		$this->db->like('b.kode_barang', $search, 'both');
		$this->db->or_like('b.nama_barang', $search, 'both');
		$this->db->group_end();
		$this->db->where('b.batas IS NOT NULL');
		$this->db->where('b.batas >= (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id)');
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
		// $this->datatables->generate();
		// return $result;
	}
	function getStokHampirKadaluarsa()
	{
		$cek = $this->db->get('tbl_setting')->row();
		$bln = $cek->peringatan_kadaluarsa;

		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->db->select('s.*, b.*');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang');
		$this->db->group_start();
		$this->db->like('b.nama_barang', $search, 'both');
		$this->db->or_like('s.kode_batch', $search, 'both');
		$this->db->group_end();
		$this->db->where("s.tgl_expired BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $bln MONTH)");
		$this->db->where('b.is_aktif', 1);
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('s.*, b.*');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang');
		$this->db->group_start();
		$this->db->like('b.nama_barang', $search, 'both');
		$this->db->or_like('s.kode_batch', $search, 'both');
		$this->db->group_end();
		$this->db->where("s.tgl_expired BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $bln MONTH)");
		$this->db->where('b.is_aktif', 1);
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('s.*, b.*');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang');
		$this->db->group_start();
		$this->db->like('b.nama_barang', $search, 'both');
		$this->db->or_like('s.kode_batch', $search, 'both');
		$this->db->group_end();
		$this->db->where("s.tgl_expired BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $bln MONTH)");
		$this->db->where('b.is_aktif', 1);
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
		// $this->datatables->generate();
		// return $result;
	}
	function getStokKadaluarsa()
	{
		$cek = $this->db->get('tbl_setting')->row();
		$bln = $cek->peringatan_kadaluarsa;

		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$this->db->select('s.*, b.*');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang');
		$this->db->group_start();
		$this->db->like('b.nama_barang', $search, 'both');
		$this->db->or_like('s.kode_batch', $search, 'both');
		$this->db->group_end();
		$this->db->where("s.tgl_expired < CURDATE()");
		$this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
		$result['data'] = $this->db->limit($limit, $start)->get()->result_array();

		$this->db->select('s.*, b.*');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang');
		$this->db->group_start();
		$this->db->like('b.nama_barang', $search, 'both');
		$this->db->or_like('s.kode_batch', $search, 'both');
		$this->db->group_end();
		$this->db->where("s.tgl_expired < CURDATE()");
		$filtered = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsFiltered' => $filtered]);

		$this->db->select('s.*, b.*');
		$this->db->from('tbl_stok s');
		$this->db->join('tbl_barang b', 'b.id = s.id_barang');
		$this->db->group_start();
		$this->db->like('b.nama_barang', $search, 'both');
		$this->db->or_like('s.kode_batch', $search, 'both');
		$this->db->group_end();
		$this->db->where("s.tgl_expired < CURDATE()");
		$total = $this->db->get()->num_rows();
		$result = array_merge($result, ['recordsTotal' => $total]);
		return $result;
		// $this->datatables->generate();
		// return $result;
	}
	function getBarangKeluar($start, $end)
	{
		$q = "SELECT b.kode_barang, b.nama_barang, tbkd.kode_batch, sum(tbkd.jumlah) as jumlah, sum(tbkd.total) as total, tbkd.harga, tbkd.tgl_expired FROM tbl_barang_keluar tbk JOIN tbl_barang_keluar_detail tbkd ON tbk.id = tbkd.id_barang_keluar JOIN tbl_barang b ON b.id = tbkd.id_barang WHERE tbk.tgl_transaksi BETWEEN '$start' AND '$end' GROUP BY CONCAT(tbkd.id_barang,'-',tbkd.kode_batch)";
		$data = $this->db->query($q)->result();
		return $data;
	}
	function getBarangMasuk($start, $end)
	{
		$q = "SELECT b.kode_barang, b.nama_barang, tbkd.kode_batch, sum(tbkd.jumlah) as jumlah, sum(tbkd.total) as total, tbkd.harga, tbkd.tgl_expired FROM tbl_barang_masuk tbk JOIN tbl_barang_masuk_detail tbkd ON tbk.id = tbkd.id_barang_masuk JOIN tbl_barang b ON b.id = tbkd.id_barang WHERE tbk.tgl_transaksi BETWEEN '$start' AND '$end' GROUP BY CONCAT(tbkd.id_barang,'-',tbkd.kode_batch)";
		$data = $this->db->query($q)->result();
		return $data;
	}
}

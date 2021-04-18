<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getTotalJenisBarang()
	{
		$data = $this->db->get_where('tbl_barang', array('is_aktif' => 1));
		return $data->num_rows();
	}
	function getTotalBarangKeluar($date)
	{
		$query = "SELECT COUNT(id) AS total FROM tbl_barang_keluar WHERE MONTH(DATE(tgl_transaksi)) = $date";
		$data = $this->db->query($query)->row();
		return $data;
	}
	function getTotalBarangMasuk($date)
	{
		$query = "SELECT COUNT(id) AS total FROM tbl_barang_masuk WHERE MONTH(DATE(tgl_transaksi)) = $date";
		$data = $this->db->query($query)->row();
		return $data;
	}
	function getTotalBarangHampirHabis($limit = 0)
	{
		if ($limit != 0) {
			$query = "SELECT b.*, (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) as totalsem FROM tbl_barang AS b WHERE b.batas IS NOT NULL AND b.batas >= (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) ORDER BY totalsem ASC LIMIT $limit";
		} else {
			$query = "SELECT b.*, (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) as totalsem FROM tbl_barang AS b WHERE b.batas IS NOT NULL AND b.batas >= (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id) ORDER BY totalsem ASC";
		}
		$data = $this->db->query($query)->result();
		return $data;
	}
	function getTotalBarangHampirKadaluarsa($limit = 0)
	{
		$cek = $this->db->get('tbl_setting')->row();
		$bln = $cek->peringatan_kadaluarsa;
		if ($limit != 0) {
			$q = "SELECT s.*, b.* FROM tbl_stok AS s JOIN tbl_barang b ON b.id = s.id_barang WHERE (s.tgl_expired BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $bln MONTH)) AND b.is_aktif = 1 LIMIT $limit";
		} else {
			$q = "SELECT s.*, b.* FROM tbl_stok AS s JOIN tbl_barang b ON b.id = s.id_barang WHERE (s.tgl_expired BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL $bln MONTH)) AND b.is_aktif = 1";
		}
		$data = $this->db->query($q)->result();
		return $data;
	}
	function getTotalBarangKadaluarsa()
	{
		$q = "SELECT s.*, b.* FROM tbl_stok AS s JOIN tbl_barang b ON b.id = s.id_barang WHERE s.tgl_expired <= CURDATE()";
		$data = $this->db->query($q)->result();
		return $data;
	}
	function getJumlahBarangHampirHabis()
	{

		$query = "SELECT count(b.id) as total FROM tbl_barang AS b WHERE b.batas IS NOT NULL AND b.batas >= (SELECT SUM(s.total) FROM tbl_stok as s WHERE s.id_barang = b.id)";
		$data = $this->db->query($query)->row();
		return $data;
	}
}

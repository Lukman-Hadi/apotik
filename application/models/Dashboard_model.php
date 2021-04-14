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
		$data = $this->db->get('tbl_barang');
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
}

<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Global_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	//Insert Batch
	function insertbatch($table, $data)
	{
		return $this->db->insert_batch($table, $data);
	}
	function softDelete($table, $id)
	{
		$rows = $this->db->get_where($table, array('id' => $id))->row_array();
		if ($rows['is_aktif'] == 0) {
			$aktif = 1;
		} else {
			$aktif = 0;
		}
		$result = $this->db->update($table, array('is_aktif' => $aktif), array('id' => $id));
		return $result;
	}

	//Update Batch
	function updatebatch($table, $data, $where)
	{
		return $this->db->update_batch($table, $data, $where);
	}

	function update($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}

	function delete($table, $where)
	{
		return $this->db->delete($table, $where);
	}

	function deleteBatch($table, $data)
	{
		$this->db->where_in('_id', $data);
		return $this->db->delete($table);
	}
	function insertorupdate($table, $data)
	{
		if (empty($table) || empty($data)) return false;
		$duplicate_data = array();
		foreach ($data as $key => $value) {
			$duplicate_data[] = sprintf("%s='%s'", $key, $value);
		}
		$sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
		$this->db->query($sql);
		return $this->db->insert_id();
	}
	function insertorupdateincrement($table, $data)
	{
		// if (empty($table) || empty($data)) return false;
		// $duplicate_data = array();
		// foreach ($data as $key => $value) {
		// 	$duplicate_data[] = sprintf("%s='%s'", $key, $value);
		// }
		// var_dump($duplicate_data);
		$sql = $this->db->insert_string($table, $data) . ' ON DUPLICATE KEY UPDATE total = total+' . intval($data['total']);
		$this->db->query($sql);

		// $sql = sprintf("%s ON DUPLICATE KEY UPDATE %s", $this->db->insert_string($table, $data), implode(',', $duplicate_data));
		// $this->db->query($sql);
		return $this->db->insert_id();
	}
	function deleteEmpty()
	{
		return $this->db->delete('tbl_stok', array('total' => 0));
	}
}

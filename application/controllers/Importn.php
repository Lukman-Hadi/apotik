<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader;

class Importn extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('Global_model', 'gmodel');
	}
	public function index()
	{
		echo 'hai';
	}
	// file upload functionality
	public function upload()
	{
		if (!empty($_FILES['file']['name'])) {
			// get file extension
			$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

			if ($extension == 'csv') {
				$reader = new Reader\Csv;
			} elseif ($extension == 'xlsx') {
				$reader = new Reader\Xlsx;
			} else {
				$reader =  new Reader\Xls;
			}
			// file path
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

			// array Count
			$arrayCount = count($allDataInSheet);
			$flag = 0;
			$createArray = array('kode_barang', 'nama_barang', 'satuan', 'harga', 'deskripsi');
			$makeArray = array('kode_barang' => 'kode_barang', 'nama_barang' => 'nama_barang', 'satuan' => 'satuan', 'harga' => 'harga', 'deskripsi' => 'deskripsi');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
				foreach ($dataInSheet as $key => $value) {
					if (in_array(trim($value), $createArray)) {
						$value = preg_replace('/\s+/', '', $value);
						$SheetDataKey[trim($value)] = $key;
					}
				}
			}
			$dataDiff = array_diff_key($makeArray, $SheetDataKey);
			if (empty($dataDiff)) {
				$flag = 1;
			}
			// match excel sheet column
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$kodeBarang = $SheetDataKey['kode_barang'];
					$namaBarang = $SheetDataKey['nama_barang'];
					$satuan = $SheetDataKey['satuan'];
					$harga = $SheetDataKey['harga'];
					$deskripsi = $SheetDataKey['deskripsi'];

					// $addresses = array();
					// $firstName = $SheetDataKey['First_Name'];
					// $lastName = $SheetDataKey['Last_Name'];
					// $email = $SheetDataKey['Email'];
					// $dob = $SheetDataKey['DOB'];
					// $contactNo = $SheetDataKey['Contact_No'];

					$kodeBarang = filter_var(trim($allDataInSheet[$i][$kodeBarang]), FILTER_SANITIZE_STRING);
					$namaBarang = filter_var(trim($allDataInSheet[$i][$namaBarang]), FILTER_SANITIZE_STRING);
					$satuan = filter_var(trim($allDataInSheet[$i][$satuan]), FILTER_SANITIZE_EMAIL);
					$harga = filter_var(trim($allDataInSheet[$i][$harga]), FILTER_SANITIZE_STRING);
					$deskripsi = filter_var(trim($allDataInSheet[$i][$deskripsi]), FILTER_SANITIZE_STRING);
					$fetchData[] = array('kode_barang' => $kodeBarang, 'nama_barang' => $namaBarang, 'satuan' => $satuan, 'harga' => $harga, 'deskripsi' => $deskripsi);
				}
				// $data['dataInfo'] = $fetchData;
				// $this->site->setBatchImport($fetchData);
				$this->gmodel->insertbatch('tbl_barang', $fetchData);
			} else {
				echo "Please import correct file, did not match excel sheet column";
			}
			return redirect(base_url() . '/admin/barang');
		} else {
			return redirect(base_url() . '/admin/barang');
		}
	}
	public function uploadStok()
	{
		if (!empty($_FILES['file']['name'])) {
			// get file extension
			$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

			if ($extension == 'csv') {
				$reader = new Reader\Csv;
			} elseif ($extension == 'xlsx') {
				$reader = new Reader\Xlsx;
			} else {
				$reader =  new Reader\Xls;
			}
			// file path
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

			// array Count
			$arrayCount = count($allDataInSheet);
			$flag = 0;
			$createArray = array('No', 'KodeBarang', 'NamaBarang', 'KodeBatch', 'Jumlah', 'TglExpired');
			$makeArray = array('No' => 'no', 'KodeBarang' => 'kode_barang', 'NamaBarang' => 'nama_barang', 'KodeBatch' => 'kode_batch', 'Jumlah' => 'total', 'TglExpired' => 'tgl_expired');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
				foreach ($dataInSheet as $key => $value) {
					if (in_array(trim($value), $createArray)) {
						$value = preg_replace('/\s+/', '', $value);
						$SheetDataKey[trim($value)] = $key;
					}
				}
			}
			$dataDiff = array_diff_key($makeArray, $SheetDataKey);
			print_r($makeArray);
			// print_r($SheetDataKey);
			if (empty($dataDiff)) {
				$flag = 1;
			}
			// match excel sheet column
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$data = array();
					$kodeBarang = $SheetDataKey['KodeBarang'];
					$kodeBatch = $SheetDataKey['KodeBatch'];
					$total = $SheetDataKey['Jumlah'];
					$tglExpired = $SheetDataKey['TglExpired'];

					$kodeBarang = filter_var(trim($allDataInSheet[$i][$kodeBarang]), FILTER_SANITIZE_STRING);
					$kodeBatch = filter_var(trim($allDataInSheet[$i][$kodeBatch]), FILTER_SANITIZE_STRING);
					$total = filter_var(trim($allDataInSheet[$i][$total]), FILTER_SANITIZE_NUMBER_INT);
					$tglExpired = filter_var(trim($allDataInSheet[$i][$tglExpired]), FILTER_SANITIZE_STRING);
					$combinedKey = ($kodeBarang . '-' . $kodeBatch);
					$data = array(
						// 'id' 			=> $id,
						'kode_barang'	=> $kodeBarang,
						'kode_batch'	=> $kodeBatch,
						'total'			=> $total,
						'tgl_expired'	=> $tglExpired,
						'combined_key'	=> $combinedKey,
					);
					$this->gmodel->insertorupdate('tbl_stok', $data);
				}
			} else {
				echo "Please import correct file, did not match excel sheet column";
			}
			return redirect(base_url() . '/admin/stok');
		} else {
			return redirect(base_url() . '/admin/stok');
		}
	}

	// checkFileValidation
	public function checkFileValidation($string)
	{
		$file_mimes = array(
			'text/x-comma-separated-values',
			'text/comma-separated-values',
			'application/octet-stream',
			'application/vnd.ms-excel',
			'application/x-csv',
			'text/x-csv',
			'text/csv',
			'application/csv',
			'application/excel',
			'application/vnd.msexcel',
			'text/plain',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		);
		if (isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
			if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
				return true;
			} else {
				$this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
				return false;
			}
		} else {
			$this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
			return false;
		}
	}
}

<?php
defined('BASEPATH') or die('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend_model', 'bmodel');
	}
	public function exportBarang()
	{
		$data = $this->bmodel->getAllBarang()->result();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Satuan')
			->setCellValue('E1', 'Harga')
			->setCellValue('F1', 'Deskripsi');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->satuan)
				->setCellValue('E' . $kolom, $d->harga)
				->setCellValue('F' . $kolom, $d->deskripsi);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Barang.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}

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
		$this->load->model('Dashboard_model', 'dmodel');
		$this->load->model('Report_model', 'rmodel');
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
		header('Content-Disposition: attachment;filename="Hampir Habis.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function exportStok()
	{
		$data = $this->bmodel->getAllStok()->result();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Kode Batch')
			->setCellValue('E1', 'Jumlah')
			->setCellValue('F1', 'Tanggal Expired');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->kode_batch)
				->setCellValue('E' . $kolom, $d->total)
				->setCellValue('F' . $kolom, $d->tgl_expired);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Stok.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function exportStokHampirHabis()
	{
		$data = $this->dmodel->getTotalBarangHampirHabis();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Jumlah');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->totalsem);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Stok.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function exportStokKadaluarsa()
	{
		$data = $this->dmodel->getTotalBarangKadaluarsa();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Jumlah')
			->setCellValue('E1', 'Tanggal Expired');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->total)
				->setCellValue('E' . $kolom, $d->tgl_expired);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Hampir Kadaluarsa.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function exportStokBarangMasuk()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$data = $this->rmodel->getBarangMasuk($start, $end);

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Kode Batch')
			->setCellValue('E1', 'Jumlah')
			->setCellValue('F1', 'Harga')
			->setCellValue('G1', 'Total')
			->setCellValue('H1', 'Tanggal Expired');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->kode_batch)
				->setCellValue('E' . $kolom, $d->jumlah)
				->setCellValue('F' . $kolom, $d->harga)
				->setCellValue('G' . $kolom, $d->total)
				->setCellValue('H' . $kolom, $d->tgl_expired);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Barang Masuk.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function exportStokBarangKeluar()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$data = $this->rmodel->getBarangKeluar($start, $end);

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Kode Batch')
			->setCellValue('E1', 'Jumlah')
			->setCellValue('F1', 'Harga')
			->setCellValue('G1', 'Total')
			->setCellValue('H1', 'Tanggal Expired');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->kode_batch)
				->setCellValue('E' . $kolom, $d->jumlah)
				->setCellValue('F' . $kolom, $d->harga)
				->setCellValue('G' . $kolom, $d->total)
				->setCellValue('H' . $kolom, $d->tgl_expired);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Barang Keluar.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function exportStokHampirKadaluarsa()
	{
		$data = $this->dmodel->getTotalBarangHampirKadaluarsa();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Kode Barang')
			->setCellValue('C1', 'Nama Barang')
			->setCellValue('D1', 'Jumlah')
			->setCellValue('E1', 'Tanggal Expired');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->kode_barang)
				->setCellValue('C' . $kolom, $d->nama_barang)
				->setCellValue('D' . $kolom, $d->total)
				->setCellValue('E' . $kolom, $d->tgl_expired);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Hampir Kadaluarsa.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function exportStokTemplate()
	{
		$data = $this->bmodel->getAllStok()->result();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Id')
			->setCellValue('C1', 'KodeBarang')
			->setCellValue('D1', 'NamaBarang')
			->setCellValue('E1', 'KodeBatch')
			->setCellValue('F1', 'Jumlah')
			->setCellValue('G1', 'Harga')
			->setCellValue('H1', 'TglExpired');
		$kolom = 2;
		$nomor = 1;
		foreach ($data as $d) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $d->id)
				->setCellValue('C' . $kolom, $d->kode_barang)
				->setCellValue('D' . $kolom, $d->nama_barang)
				->setCellValue('E' . $kolom, $d->kode_batch)
				->setCellValue('F' . $kolom, $d->total)
				->setCellValue('G' . $kolom, $d->harga)
				->setCellValue('H' . $kolom, $d->tgl_expired);
			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Stok Template.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}

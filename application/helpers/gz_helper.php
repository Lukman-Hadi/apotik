<?php
date_default_timezone_set('Asia/Jakarta');
function ci()
{
	return get_instance();
}

function totalBarang()
{
	ci()->load->model('Dashboard_model', 'dmodel');
	return ci()->dmodel->getTotalJenisBarang();
}
function totalBaranghampirhabis()
{
	ci()->load->model('Dashboard_model', 'dmodel');
	return ci()->dmodel->getJumlahBarangHampirHabis();
}

function getTotalBarangKeluar()
{
	ci()->load->model('Dashboard_model', 'dmodel');
	$month = date("m");
	return ci()->dmodel->getTotalBarangKeluar($month);
}
function getTotalBarangMasuk()
{
	ci()->load->model('Dashboard_model', 'dmodel');
	$month = date("m");
	return ci()->dmodel->getTotalBarangMasuk($month);
}
function tgl_indo($tgl)
{
	$bln = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bln[(int)$bulan - 1] . ' ' . $tahun;
}
function formatRupiah($number)
{
	$prefix = 'Rp. ';
	$format = number_format($number, 0, ',', '.');
	return $prefix . $format;
}
function terbilang($angka)
{
	$angka = (float)$angka;

	$bilangan = array(
		'',
		'Satu',
		'Dua',
		'Tiga',
		'Empat',
		'Lima',
		'Enam',
		'Tujuh',
		'Delapan',
		'Sembilan',
		'Sepuluh',
		'Sebelas'
	);

	if ($angka < 12) {
		return $bilangan[$angka];
	} else if ($angka < 20) {
		return $bilangan[$angka - 10] . ' Belas';
	} else if ($angka < 100) {
		$hasil_bagi = (int)($angka / 10);
		$hasil_mod = $angka % 10;
		return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
	} else if ($angka < 200) {
		return sprintf('seratus %s', terbilang($angka - 100));
	} else if ($angka < 1000) {
		$hasil_bagi = (int)($angka / 100);
		$hasil_mod = $angka % 100;
		return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
	} else if ($angka < 2000) {
		return trim(sprintf('seribu %s', terbilang($angka - 1000)));
	} else if ($angka < 1000000) {
		$hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
		$hasil_mod = $angka % 1000;
		return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
	} else if ($angka < 1000000000) {
		$hasil_bagi = (int)($angka / 1000000);
		$hasil_mod = $angka % 1000000;
		return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else if ($angka < 1000000000000) {
		$hasil_bagi = (int)($angka / 1000000000);
		$hasil_mod = fmod($angka, 1000000000);
		return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else if ($angka < 1000000000000000) {
		$hasil_bagi = $angka / 1000000000000;
		$hasil_mod = fmod($angka, 1000000000000);
		return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
	} else {
		return 'Wow...';
	}
}
function is_login()
{
	$ci = get_instance();
	if (!$ci->session->userdata('id')) {
		return false;
	} else {
		return true;
	}
}
function perusahaan()
{
	ci()->load->model('Backend_model', 'bmodel');
	$data = ci()->bmodel->getInfoPerusahaan();
	return $data;
}

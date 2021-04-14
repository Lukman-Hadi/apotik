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

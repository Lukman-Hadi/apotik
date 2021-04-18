<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (is_login()) redirect(site_url('admin'));
		$this->load->model('Login_model', 'login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function doLogin()
	{
		$username = $this->input->post('username');
		$p = $this->input->post('password');
		$password = password_verify($p, PASSWORD_DEFAULT);
		$query = $this->login_model->getLogin($username)->row_array();
		if ($query) {
			if (password_verify($p, $query['password'])) {
				$this->session->set_userdata($query);
				echo json_encode(array('message' => 'Login Success'));
			} else {
				echo json_encode(array('errorMsg' => 'Password Salah'));
			}
		} else {
			echo json_encode(array('errorMsg' => 'User Tidak Ada'));
		}
	}
}

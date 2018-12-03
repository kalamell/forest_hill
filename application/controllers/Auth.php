<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model', 'staff');
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('staff_id')) redirect('');
		$this->load->view('auth/login');
	}

	public function do_login()
	{
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$check = $this->staff->login(array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			));
			if ($check) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else {
			echo 'fail';
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
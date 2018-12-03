<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('staff_id')) redirect('auth/login');
	}
	protected function _render($path_file, $data = array())
	{
		$this->load->view($path_file, $data);
	}
}

class Template_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	protected function _render($path_file, $data = array())
	{
		$this->load->view('template/_header', $data);
		$this->load->view($path_file, $data);
		$this->load->view('template/_footer', $data);
	}

	protected function _getdata($data)
	{
		$this->load->view('template/getdata', $data);
	}
}

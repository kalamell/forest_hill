<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_render('main');
	}
}
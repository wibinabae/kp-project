<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

	}

	public function index()
	{
		$this->load->view('customer/index'); 
	}
}

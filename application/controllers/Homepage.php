<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		$cfg['title']="Codeigniter Demo";
		$this->load->view('template/header',$cfg);
		$this->load->view('homepage');
		$this->load->view('template/footer');
	}
}

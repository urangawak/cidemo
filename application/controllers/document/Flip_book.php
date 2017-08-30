<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Flip_book extends CI_Controller
{
	private $path_module='document/Flip_book';
	private $url;
	
	function __construct()
	{
		parent::__construct();
		$this->url=base_url().$this->path_module.'/';
	}
	
	function index()
	{
		$cfg['title']='Flip book PDF Reader';
		$cfg['keyword']="Flip book PDF Reader";
		$this->load->view('template/header',$cfg);
		$d['url']=$this->url;
		$d['path_module']=$this->path_module;
		$this->load->view('template/include_template',$d);
		$this->load->view('template/footer');
	}
	
	function render_pdf()
	{
		$file=base_url().'uploads/document/sample.pdf';	
		echo file_get_contents($file);
		header('Content-Type: application/pdf');
	}
}
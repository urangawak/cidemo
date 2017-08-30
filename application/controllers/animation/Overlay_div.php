<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Overlay_div extends CI_Controller
{
	private $path_module='animation/Overlay_div';
	private $url;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('contoh_helper');
		$this->url=base_url().$this->path_module.'/';
	}
	
	function index()
	{
		$cfg['title']='Overlay DIV';
		$cfg['keyword']="Lock Screen Animation";
		$this->load->view('template/header',$cfg);
		$d['url']=$this->url;
		$d['path_module']=$this->path_module;
		$this->load->view('template/include_template',$d);
		$this->load->view('template/footer');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datatables_callback extends CI_Controller
{
	private $path_module='database/Datatables_callback';
	private $url;
	function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		//Load helper yang ada function callback
		$this->load->helper('contoh_helper');
		$this->url=base_url().$this->path_module.'/';
	}
	
	function index()
	{
		$cfg['title']='Datatables Ajax Callback Demo';
		$cfg['keyword']="Cara Penggunaan Datatables codeigniter,how to use datatables in codeigniter";
		$this->load->view('template/header',$cfg);
		$d['url']=$this->url;
		$d['path_module']=$this->path_module;
		$this->load->view('template/include_template',$d);
		$this->load->view('template/footer');
	}
	
	function viewajax()
	{
		//Hanya request ajax
		if($this->input->is_ajax_request()==TRUE)
		{
			//Protect table caller
			$this->db->protect_identifiers('villages');
			// panggil 4 field name dari table provinces alias p, regencies as r,district alias d dan villages alias v
			$this->datatables->select('v.ID as ii,v.name as kelurahan,d.name as kecamatan,r.name as kota,p.name as provinsi')
				->unset_column('ii')
				->edit_column('aksi','$1','callback_datatables(ii)') //callback function pada contoh_helper
				->from('villages v')
				->join('districts d','v.district_id=d.id','left')
				->join('regencies r','d.regency_id=r.id','left')
				->join('provinces p','r.province_id=p.id','left');
				
			echo $this->datatables->generate();
		}else{
			die("Not Ajax Request");
		}
	}
}

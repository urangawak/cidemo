<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Select2_search extends CI_Controller
{
	private $path_module='database/Select2_search';
	private $url;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('contoh_helper');
		$this->url=base_url().$this->path_module.'/';
	}
	
	function index()
	{
		$cfg['title']='Select2 Search';
		$cfg['keyword']="Cara Penggunaan Select2 codeigniter,how to use select2 in codeigniter";
		$this->load->view('template/header',$cfg);
		$d['url']=$this->url;
		$d['path_module']=$this->path_module;
		$this->load->view('template/include_template',$d);
		$this->load->view('template/footer');
	}
	
	/* API SEARCH */
	function provinsi()
	{
		if($this->input->is_ajax_request()==TRUE)
		{
			$keyword=$this->input->get('q',TRUE);
			$data=array();
			$this->db->select('id as ID,name as nama');
			$this->db->from('provinces');
			$this->db->where('id IS NOT NULL');
			if(!empty($keyword))
			{
				$this->db->like('name',$keyword,'both');
			}
			$this->db->order_by('name ASC');
			$result=$this->db->get();
			if($result->num_rows() > 0){
				$data=$result->result();
			}
			echo json_encode($data);
		}else{
			die("Not Ajax Request");
		}
	}
	
	function kabupaten()
	{
		if($this->input->is_ajax_request()==TRUE)
		{
			$keyword=$this->input->get('q',TRUE);
			$provinsi=$this->input->get('p',TRUE);
			$data=array();
			if(!empty($provinsi))
			{
				$this->db->select('id as ID,name as nama');
				$this->db->from('regencies');
				$this->db->where('id IS NOT NULL');
				$this->db->where('province_id',$provinsi);
				if(!empty($keyword))
				{
					$this->db->like('name',$keyword,'both');
				}
				$this->db->order_by('name ASC');
				$result=$this->db->get();
				if($result->num_rows() > 0){
					$data=$result->result();
				}
			}
			echo json_encode($data);
		}else{
			die("Not Ajax Request");
		}
	}
	
	function kecamatan()
	{
		if($this->input->is_ajax_request()==TRUE)
		{
			$keyword=$this->input->get('q',TRUE);
			$kabupaten=$this->input->get('k',TRUE);
			$data=array();
			if(!empty($kabupaten))
			{
				$this->db->select('id as ID,name as nama');
				$this->db->from('districts');
				$this->db->where('id IS NOT NULL');
				$this->db->where('regency_id',$kabupaten);
				if(!empty($keyword))
				{
					$this->db->like('name',$keyword,'both');
				}
				$this->db->order_by('name ASC');
				$result=$this->db->get();
				if($result->num_rows() > 0){
					$data=$result->result();
				}
			}
			echo json_encode($data);
		}else{
			die("Not Ajax Request");
		}
	}
	
	function kelurahan()
	{
		if($this->input->is_ajax_request()==TRUE)
		{
			$keyword=$this->input->get('q',TRUE);
			$kecamatan=$this->input->get('k',TRUE);
			$data=array();
			if(!empty($kecamatan))
			{
				$this->db->select('id as ID,name as nama');
				$this->db->from('villages');
				$this->db->where('id IS NOT NULL');
				$this->db->where('district_id',$kecamatan);
				if(!empty($keyword))
				{
					$this->db->like('name',$keyword,'both');
				}
				$this->db->order_by('name ASC');
				$result=$this->db->get();
				if($result->num_rows() > 0){
					$data=$result->result();
				}
			}
			echo json_encode($data);
		}else{
			die("Not Ajax Request");
		}
	}
}

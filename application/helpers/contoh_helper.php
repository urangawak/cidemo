<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists('callback_datatables'))
{
	function callback_datatables($kelurahanID)
	{
		$CI=& get_instance();
		$kecamatanID=db_row('villages',array('id'=>$kelurahanID),'district_id');
		$kabupatenID=db_row('districts',array('id'=>$kecamatanID),'regency_id');
		$provinsiID=db_row('regencies',array('id'=>$kabupatenID),'province_id');
		$output="
		ID Kelurahan : ".$kelurahanID."<br/>
		ID Kecamatan : ".$kecamatanID."<br/>
		ID Kabupaten : ".$kabupatenID."<br/>
		ID Provinsi : ".$provinsiID."<br/>
		";
		return $output;
	}
}

if(!function_exists('db_row'))
{
	function db_row($table,$where=array(),$output)
	{
		$CI=& get_instance();
		if(!empty($where)){
			$CI->db->where($where);
		}
		$CI->db->limit(1);
		$sql = $CI->db->get($table);
		if($sql->num_rows() > 0){
			return $sql->row()->$output;
		} else {
			return "";
		}
	}
}
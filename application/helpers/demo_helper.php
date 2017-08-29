<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists('github_url'))
{
	function github_url()
	{
		$item='<a href="https://github.com/urangawak/cidemo" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-github"></i> Github</a>';
		return $item;
	}
}

if(!function_exists('github_download'))
{
	function github_download()
	{
		$item='<a href="https://github.com/urangawak/cidemo/archive/master.zip" target="_blank" class="btn btn-default btn-flat btn-xs"><i class="fa fa-download"></i> Download</a>';
		return $item;
	}
}
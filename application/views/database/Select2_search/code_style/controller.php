<pre>
<code class="php">
&lt;?php
defined(&#039;BASEPATH&#039;) OR exit(&#039;No direct script access allowed&#039;);
class Contoh extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this-&gt;load-&gt;view(&#039;demo_select2&#039;);
	}
	
	/* API SEARCH */
	function provinsi()
	{
		if($this-&gt;input-&gt;is_ajax_request()==TRUE)
		{
			$keyword=$this-&gt;input-&gt;get(&#039;q&#039;,TRUE);
			$data=array();
			$this-&gt;db-&gt;select(&#039;id as ID,name as nama&#039;);
			$this-&gt;db-&gt;from(&#039;provinces&#039;);
			$this-&gt;db-&gt;where(&#039;id IS NOT NULL&#039;);
			if(!empty($keyword))
			{
				$this-&gt;db-&gt;like(&#039;name&#039;,$keyword,&#039;both&#039;);
			}
			$this-&gt;db-&gt;order_by(&#039;name ASC&#039;);
			$result=$this-&gt;db-&gt;get();
			if($result-&gt;num_rows() &gt; 0){
				$data=$result-&gt;result();
			}
			echo json_encode($data);
		}else{
			die(&quot;Not Ajax Request&quot;);
		}
	}
	
	function kabupaten()
	{
		if($this-&gt;input-&gt;is_ajax_request()==TRUE)
		{
			$keyword=$this-&gt;input-&gt;get(&#039;q&#039;,TRUE);
			$provinsi=$this-&gt;input-&gt;get(&#039;p&#039;,TRUE);
			$data=array();
			if(!empty($provinsi))
			{
				$this-&gt;db-&gt;select(&#039;id as ID,name as nama&#039;);
				$this-&gt;db-&gt;from(&#039;regencies&#039;);
				$this-&gt;db-&gt;where(&#039;id IS NOT NULL&#039;);
				$this-&gt;db-&gt;where(&#039;province_id&#039;,$provinsi);
				if(!empty($keyword))
				{
					$this-&gt;db-&gt;like(&#039;name&#039;,$keyword,&#039;both&#039;);
				}
				$this-&gt;db-&gt;order_by(&#039;name ASC&#039;);
				$result=$this-&gt;db-&gt;get();
				if($result-&gt;num_rows() &gt; 0){
					$data=$result-&gt;result();
				}
			}
			echo json_encode($data);
		}else{
			die(&quot;Not Ajax Request&quot;);
		}
	}
	
	function kecamatan()
	{
		if($this-&gt;input-&gt;is_ajax_request()==TRUE)
		{
			$keyword=$this-&gt;input-&gt;get(&#039;q&#039;,TRUE);
			$kabupaten=$this-&gt;input-&gt;get(&#039;k&#039;,TRUE);
			$data=array();
			if(!empty($kabupaten))
			{
				$this-&gt;db-&gt;select(&#039;id as ID,name as nama&#039;);
				$this-&gt;db-&gt;from(&#039;districts&#039;);
				$this-&gt;db-&gt;where(&#039;id IS NOT NULL&#039;);
				$this-&gt;db-&gt;where(&#039;regency_id&#039;,$kabupaten);
				if(!empty($keyword))
				{
					$this-&gt;db-&gt;like(&#039;name&#039;,$keyword,&#039;both&#039;);
				}
				$this-&gt;db-&gt;order_by(&#039;name ASC&#039;);
				$result=$this-&gt;db-&gt;get();
				if($result-&gt;num_rows() &gt; 0){
					$data=$result-&gt;result();
				}
			}
			echo json_encode($data);
		}else{
			die(&quot;Not Ajax Request&quot;);
		}
	}
	
	function kelurahan()
	{
		if($this-&gt;input-&gt;is_ajax_request()==TRUE)
		{
			$keyword=$this-&gt;input-&gt;get(&#039;q&#039;,TRUE);
			$kecamatan=$this-&gt;input-&gt;get(&#039;k&#039;,TRUE);
			$data=array();
			if(!empty($kecamatan))
			{
				$this-&gt;db-&gt;select(&#039;id as ID,name as nama&#039;);
				$this-&gt;db-&gt;from(&#039;villages&#039;);
				$this-&gt;db-&gt;where(&#039;id IS NOT NULL&#039;);
				$this-&gt;db-&gt;where(&#039;district_id&#039;,$kecamatan);
				if(!empty($keyword))
				{
					$this-&gt;db-&gt;like(&#039;name&#039;,$keyword,&#039;both&#039;);
				}
				$this-&gt;db-&gt;order_by(&#039;name ASC&#039;);
				$result=$this-&gt;db-&gt;get();
				if($result-&gt;num_rows() &gt; 0){
					$data=$result-&gt;result();
				}
			}
			echo json_encode($data);
		}else{
			die(&quot;Not Ajax Request&quot;);
		}
	}
}

</code>
</pre>
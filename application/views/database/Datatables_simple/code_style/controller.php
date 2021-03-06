<pre>
<code class="php">
&lt;?php
defined(&#039;BASEPATH&#039;) OR exit(&#039;No direct script access allowed&#039;);
class Contoh extends CI_Controller
{
	
function __construct()
{
	parent::__construct();
	$this-&gt;load-&gt;database(); //Load Library Database Codeigniter
	$this-&gt;load-&gt;library(&#039;datatables&#039;); //Load Library Ignited Datatables
	$this-&gt;load-&gt;helper(&#039;url&#039;); //Load Codeigniter URL Helper
}

function index()
{
	$this-&gt;load-&gt;view(&#039;demo_datatables&#039;); //Load view
}

function viewajax()
{
	if($this-&gt;input-&gt;is_ajax_request()==TRUE) //Hanya request ajax yang diperbolehkan
	{
		//Protect table caller
		$this-&gt;db-&gt;protect_identifiers(&#039;villages&#039;);
		// panggil 4 field name dari table provinces alias p, regencies as r,district alias d dan villages alias v
		$this-&gt;datatables-&gt;select(&#039;v.name as kelurahan,d.name as kecamatan,r.name as kota,p.name as provinsi&#039;)
			-&gt;from(&#039;villages v&#039;)
			-&gt;join(&#039;districts d&#039;,&#039;v.district_id=d.id&#039;,&#039;left&#039;)
			-&gt;join(&#039;regencies r&#039;,&#039;d.regency_id=r.id&#039;,&#039;left&#039;)
			-&gt;join(&#039;provinces p&#039;,&#039;r.province_id=p.id&#039;,&#039;left&#039;);
			
		echo $this-&gt;datatables-&gt;generate();
	}else{
		die(&quot;Not Ajax Request&quot;);
	}
}
</code>
</pre>
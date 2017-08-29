<pre>
<code class="php">
&lt;?php
defined(&#039;BASEPATH&#039;) OR exit(&#039;No direct script access allowed&#039;);

//Buat Helper contoh_helper.php pada folder application/helpers

if(!function_exists(&#039;callback_datatables&#039;)) //FUNGSI YANG AKAN DIPANGGIL DARI CONTROLLER
{
	function callback_datatables($kelurahanID)
	{
		$CI=&amp; get_instance();
		$kecamatanID=db_row(&#039;villages&#039;,array(&#039;id&#039;=&gt;$kelurahanID),&#039;district_id&#039;);
		$kabupatenID=db_row(&#039;districts&#039;,array(&#039;id&#039;=&gt;$kecamatanID),&#039;regency_id&#039;);
		$provinsiID=db_row(&#039;regencies&#039;,array(&#039;id&#039;=&gt;$kabupatenID),&#039;province_id&#039;);
		$output=&quot;
		ID Kelurahan : &quot;.$kelurahanID.&quot;&lt;br/&gt;
		ID Kecamatan : &quot;.$kecamatanID.&quot;&lt;br/&gt;
		ID Kabupaten : &quot;.$kabupatenID.&quot;&lt;br/&gt;
		ID Provinsi : &quot;.$provinsiID.&quot;&lt;br/&gt;
		&quot;;
		return $output;
	}
}

if(!function_exists(&#039;db_row&#039;)) // FUNGSI UNTUK MEMPERMUDAH AMBIL DATA
{
	function db_row($table,$where=array(),$output)
	{
		$CI=&amp; get_instance();
		if(!empty($where)){
			$CI-&gt;db-&gt;where($where);
		}
		$CI-&gt;db-&gt;limit(1);
		$sql = $CI-&gt;db-&gt;get($table);
		if($sql-&gt;num_rows() &gt; 0){
			return $sql-&gt;row()-&gt;$output;
		} else {
			return &quot;&quot;;
		}
	}
}
</code>
</pre>
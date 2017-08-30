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
		$this-&gt;load-&gt;view(&#039;demo_flip&#039;);
	}
	
	function render_pdf()
	{
		//Fungsi ini berguna agar aplikasi downloader tidak auto download
		$file=base_url().&#039;uploads/document/sample.pdf&#039;;	
		echo file_get_contents($file);
		header(&#039;Content-Type: application/pdf&#039;);
	}
}
</code>
</pre>
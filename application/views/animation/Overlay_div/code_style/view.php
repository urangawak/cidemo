<pre>
<code class="html">
.m-overlay
{
	 position: fixed; //JADIKAN SEBUAH DIV YANG FIXED PADA HALAMAN
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 z-index: 9999999; //JADIKAN MOST TOP (ORDER PALING DEPAN) (**)
  	 background: rgba(0, 0, 0, 0.5);
  	 border-radius: 3px;
  	 overflow: hidden;
  	 //(**) KALAU ADA element dengan z-index lebih atau sama dari ini maka kurangi z-index nya karena maksimal z-index adalah 9999999
}

.m-overlay &gt; .m-overlay-text
{
	position: relative; //DIV DI DALAM class m-overlay dijadikan relative yang dapat disesuaikan posisinya
  	top: 50%; //POSISI ATAS
  	left: 30%; //POSISI KIRI
  	margin-left: -15px;
  	margin-top: -15px;
  	color: #fff;
  	font-size: 30px;
}
&lt;a href=&quot;javascript:;&quot; onclick=&quot;overlay_time();&quot; class=&quot;btn btn-default&quot;&gt;Tampilkan Overlay dalam 5 detik&lt;/a&gt; // PANGGIL FUNCTION overlay_time

&lt;div class=&quot;m-overlay&quot; style=&quot;display: none;&quot;&gt;
	&lt;div class=&quot;m-overlay-text&quot;&gt;
		&lt;i class=&quot;fa fa-spin fa-refresh&quot;&gt;&lt;/i&gt;
		&lt;span id=&quot;m-overlay-title&quot;&gt;Memproses data&lt;/span&gt;
	&lt;/div&gt;
&lt;/div&gt;

&lt;script&gt;

function overlay_time()
{
	show_overlay(); // TAMPILKAN OVERLAY
	setTimeout(function(){ 
		hide_overlay();
	},5000); // SEMBUNYIKAN OVERLAY JIKA SUDAH MENCAPAI 5 DETIK
}

function show_overlay()
{
	$(&quot;.m-overlay&quot;).show();
}

function hide_overlay()
{
	$(&quot;.m-overlay&quot;).hide();
}

&lt;/script&gt;
</code>
</pre>
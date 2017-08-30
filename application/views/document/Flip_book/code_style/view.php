<pre>
<code class="html">
&lt;?php
/*
Untuk mengkonfigurasikan dari awal sangat sulit sekali, jadi saya akan memberikan hasil yang telah jadi untuk kalian
*/

$url_plugin=base_url().&#039;cdn/dflip/&#039;; // Inisialkan tempat plugin DFlip. Biar mudah aja :)
$url_pdf=base_url().&#039;contoh/render_pdf&#039;; // Request PDF dari Controller
?&gt;
&lt;script&gt;
	var dflip_path=&quot;&lt;?=$url_plugin;?&gt;&quot;; // Inisialkan tempat $url_plugin tadi ke bentuk variabel javascript. Varibel ini harus ditulis di atas sebelum container viewernya
&lt;/script&gt;
&lt;!--
Load CSS dan Javascript
--&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=$url_plugin;?&gt;css/dflip.css&quot; /&gt; 
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=$url_plugin;?&gt;css/book.css&quot; /&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=$url_plugin;?&gt;css/themify-icons.css&quot; /&gt;
&lt;script src=&quot;&lt;?=$url_plugin;?&gt;js/dflip.js&quot; &gt;&lt;/script&gt;

&lt;div id=&quot;flipcontainer&quot; style=&quot;height: 100%&quot;&gt; &lt;!-- container viewer --&gt;
	&lt;div class=&quot;_df_book&quot; source=&quot;&lt;?=$url_pdf;?&gt;&quot; id=&quot;ebook&quot;&gt;&lt;/div&gt; &lt;!-- inisialkan source --&gt;
&lt;/div&gt;

&lt;script&gt;
var flipBook=$(&quot;#flipcontainer&quot;).flipBook(&quot;&lt;?=$url_pdf;?&gt;&quot;); // Jalankan engine DFlip
&lt;/script&gt;
</code>
</pre>
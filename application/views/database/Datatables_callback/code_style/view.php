<pre>
<code class="html">

&lt;pre&gt;
&lt;code class=&quot;html&quot;&gt;

&lt;!--
LOAD CSS DAN JAVASCRIPT
--&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=base_url();?&gt;cdn/datatables/DataTables/1.10.10/css/dataTables.bootstrap.min.css&quot; /&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=base_url();?&gt;cdn/datatables/Responsive/2.0.0/css/responsive.bootstrap.min.css&quot; /&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=base_url();?&gt;cdn/datatables/Buttons/1.1.0/css/buttons.dataTables.min.css&quot; /&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/DataTables/1.10.10/js/jquery.dataTables.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/Responsive/2.0.0/js/dataTables.responsive.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/DataTables/1.10.10/js/dataTables.bootstrap.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/Responsive/2.0.0/js/responsive.bootstrap.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/Buttons/1.1.0/js/dataTables.buttons.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/Buttons/1.1.0/js/buttons.flash.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/JSZip/2.5.0/jszip.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/pdfmake/0.1.18/build/pdfmake.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/pdfmake/0.1.18/build/vfs_fonts.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/Buttons/1.1.0/js/buttons.html5.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/datatables/Buttons/1.1.0/js/buttons.print.min.js&quot; &gt;&lt;/script&gt;

&lt;script&gt;
$(document).ready(function(){
		
	$(&#039;#tb&#039;).dataTable().fnDestroy();
	var oTable = $(&#039;#tb&#039;).dataTable({
	    &quot;bProcessing&quot;: true,
	    &quot;bServerSide&quot;: true,
	    &quot;responsive&quot;: true,
	    &quot;sAjaxSource&quot;: &#039;&lt;?=base_url();?&gt;contoh/viewajax&#039;, // PANGGIL FUNCTION DARI CONTROLLER
	    &quot;bJQueryUI&quot;: false,
	    &quot;dom&quot;: &#039;Bfrtip&#039;,
	    &quot;buttons&quot;: [
	        &#039;copy&#039;, &#039;csv&#039;, &#039;excel&#039;, &#039;pdf&#039;, &#039;print&#039;
	    ],
	&quot;sPaginationType&quot;: &quot;full_numbers&quot;,      
	    &quot;iDisplayStart &quot;: 10,
	    &quot;aoColumns&quot;: [{
	         &quot;mData&quot;: &quot;kelurahan&quot; //NAMA FIELD ATAU ALIAS FIELD TABLE PADA CONTROLLER
	     }, {
	         &quot;mData&quot;: &quot;kecamatan&quot; //NAMA FIELD ATAU ALIAS FIELD TABLE PADA CONTROLLER
	     }, {
	         &quot;mData&quot;: &quot;kota&quot; //NAMA FIELD ATAU ALIAS FIELD TABLE PADA CONTROLLER
	     }, {
	         &quot;mData&quot;: &quot;provinsi&quot; //NAMA FIELD ATAU ALIAS FIELD TABLE PADA CONTROLLER
	     }, {
	         &quot;mData&quot;: &quot;aksi&quot; //CALLBACK DARI CONTROLLER (LIHAT edit_column)
	     }],
	    &quot;order&quot;: [[ 0, &quot;asc&quot; ]],
	    &quot;oLanguage&quot;: {
	        &quot;sProcessing&quot;: &#039;&lt;i class=&quot;fa fa-spinner fa-pulse fa-3x&quot;&gt;&lt;/i&gt;&#039;
	    },
	    &quot;fnInitComplete&quot;: function () {
	        oTable.fnAdjustColumnSizing();
	    },
	    &#039;fnServerData&#039;: function (sSource, aoData, fnCallback) {
	        $.ajax
	        ({
	            &#039;dataType&#039;: &#039;json&#039;,
	            &#039;type&#039;: &#039;GET&#039;,
	            &#039;url&#039;: sSource,
	            &#039;data&#039;: aoData,
	            &#039;success&#039;: fnCallback
	        });
	    }
	});
	
});

&lt;/script&gt;

&lt;table class=&quot;table table-bordered&quot; id=&quot;tb&quot;&gt;
	&lt;thead&gt;
		&lt;th&gt;Kelurahan&lt;/th&gt;
		&lt;th&gt;Kecamatan&lt;/th&gt;
		&lt;th&gt;Kota&lt;/th&gt;
		&lt;th&gt;Provinsi&lt;/th&gt;
		&lt;th&gt;&lt;/th&gt; // KOSONGKAN TITLE UNTUK HANDLE CALLBACK NAME aksi
	&lt;/thead&gt;
	&lt;tbody&gt;&lt;/tbody&gt;
&lt;/table&gt;

&lt;/code&gt;
&lt;/pre&gt;

</code>
</pre>
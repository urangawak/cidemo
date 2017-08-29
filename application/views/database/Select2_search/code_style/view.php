<pre>
<code class="html">
&lt;!--
LOAD CSS DAN JAVASCRIPT
--&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?=base_url();?&gt;cdn/select2/css/select2.min.css&quot;/&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/select2/js/select2.full.min.js&quot; &gt;&lt;/script&gt;
&lt;script src=&quot;&lt;?=base_url();?&gt;cdn/select2/js/i18n/id.js&quot; &gt;&lt;/script&gt;

&lt;!--
class pada select box adalah select2
--&gt;

&lt;div class=&quot;form-horizontal&quot;&gt;
	
	&lt;div class=&quot;form-group &quot;&gt;
		&lt;label class=&quot;control-label col-sm-2&quot;&gt;Provinsi&lt;/label&gt;
		&lt;div class=&quot;col-md-10&quot;&gt;
			&lt;select id=&quot;provinsi&quot; class=&quot;form-control select2&quot; style=&quot;width: 100%&quot; required=&quot;&quot; data-placeholder=&quot;Pilih Provinsi&quot;&gt;
				&lt;option&gt;&lt;/option&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;form-group &quot;&gt;
		&lt;label class=&quot;control-label col-sm-2&quot;&gt;Kabupaten&lt;/label&gt;
		&lt;div class=&quot;col-md-10&quot;&gt;
			&lt;select id=&quot;kabupaten&quot; class=&quot;form-control select2&quot; style=&quot;width: 100%&quot; required=&quot;&quot; data-placeholder=&quot;Pilih Kabupaten/Kota&quot;&gt;
				&lt;option&gt;&lt;/option&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;form-group &quot;&gt;
		&lt;label class=&quot;control-label col-sm-2&quot;&gt;Kecamatan&lt;/label&gt;
		&lt;div class=&quot;col-md-10&quot;&gt;
			&lt;select id=&quot;kecamatan&quot; class=&quot;form-control select2&quot; style=&quot;width: 100%&quot; required=&quot;&quot; data-placeholder=&quot;Pilih Kecamatan&quot;&gt;
				&lt;option&gt;&lt;/option&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;form-group &quot;&gt;
		&lt;label class=&quot;control-label col-sm-2&quot;&gt;Kelurahan&lt;/label&gt;
		&lt;div class=&quot;col-md-10&quot;&gt;
			&lt;select id=&quot;kelurahan&quot; class=&quot;form-control select2&quot; style=&quot;width: 100%&quot; required=&quot;&quot; data-placeholder=&quot;Pilih Kelurahan/Desa&quot;&gt;
				&lt;option&gt;&lt;/option&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	
&lt;/div&gt;

&lt;script&gt;
$(document).ready(function(){
	
	//Trigger select2 search
	$(&quot;#provinsi&quot;).select2({
		allowClear:true,
		ajax:{
			url:&quot;&lt;?=$url;?&gt;provinsi&quot;, //url request json
			dataType:&#039;json&#039;,
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			      };
			},
			processResults: function (data,params) {
				params.page = params.page || 1;
		      	return {
			        results: $.map(data, function(obj) {
			            return { id: obj.ID, text: obj.nama }; //ID and nama as callback json
			        }),
		    	};
		    },
		    cache:true
		},
	});
	
	$(&quot;#kabupaten&quot;).select2({
		allowClear:true,
		ajax:{
			url:&quot;&lt;?=$url;?&gt;kabupaten&quot;,
			dataType:&#039;json&#039;,
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			        p:$(&quot;#provinsi&quot;).val()
			      };
			},
			processResults: function (data,params) {
				params.page = params.page || 1;
		      	return {
			        results: $.map(data, function(obj) {
			            return { id: obj.ID, text: obj.nama };
			        }),
		    	};
		    },
		    cache:true
		},
	});
	
	$(&quot;#kecamatan&quot;).select2({
		allowClear:true,
		ajax:{
			url:&quot;&lt;?=$url;?&gt;kecamatan&quot;,
			dataType:&#039;json&#039;,
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			        k:$(&quot;#kabupaten&quot;).val()
			      };
			},
			processResults: function (data,params) {
				params.page = params.page || 1;
		      	return {
			        results: $.map(data, function(obj) {
			            return { id: obj.ID, text: obj.nama };
			        }),
		    	};
		    },
		    cache:true
		},
	});
	
	$(&quot;#kelurahan&quot;).select2({
		allowClear:true,
		ajax:{
			url:&quot;&lt;?=$url;?&gt;kelurahan&quot;,
			dataType:&#039;json&#039;,
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			        k:$(&quot;#kecamatan&quot;).val()
			      };
			},
			processResults: function (data,params) {
				params.page = params.page || 1;
		      	return {
			        results: $.map(data, function(obj) {
			            return { id: obj.ID, text: obj.nama };
			        }),
		    	};
		    },
		    cache:true
		},
	});
	
});

&lt;/script&gt;
</code>
</pre>
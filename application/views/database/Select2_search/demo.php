<link rel="stylesheet" href="<?=base_url();?>assets/select2/4.0.1/css/select2.min.css"/>
<script src="<?=base_url();?>assets/select2/4.0.1/js/select2.full.min.js" ></script>
<script src="<?=base_url();?>assets/select2/4.0.1/js/i18n/id.js" ></script>

<div class="form-horizontal">
	
	<div class="form-group ">
		<label class="control-label col-sm-2">Provinsi</label>
		<div class="col-md-10">
			<select id="provinsi" class="form-control select2" style="width: 100%" required="" data-placeholder="Pilih Provinsi">
				<option></option>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label class="control-label col-sm-2">Kabupaten</label>
		<div class="col-md-10">
			<select id="kabupaten" class="form-control select2" style="width: 100%" required="" data-placeholder="Pilih Kabupaten/Kota">
				<option></option>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label class="control-label col-sm-2">Kecamatan</label>
		<div class="col-md-10">
			<select id="kecamatan" class="form-control select2" style="width: 100%" required="" data-placeholder="Pilih Kecamatan">
				<option></option>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<label class="control-label col-sm-2">Kelurahan</label>
		<div class="col-md-10">
			<select id="kelurahan" class="form-control select2" style="width: 100%" required="" data-placeholder="Pilih Kelurahan/Desa">
				<option></option>
			</select>
		</div>
	</div>
	
</div>

<script>
$(document).ready(function(){
	
	//Trigger select2 search
	$("#provinsi").select2({
		allowClear:true,
		ajax:{
			url:"<?=$url;?>provinsi", //url request json
			dataType:'json',
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
	
	$("#kabupaten").select2({
		allowClear:true,
		ajax:{
			url:"<?=$url;?>kabupaten",
			dataType:'json',
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			        p:$("#provinsi").val()
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
	
	$("#kecamatan").select2({
		allowClear:true,
		ajax:{
			url:"<?=$url;?>kecamatan",
			dataType:'json',
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			        k:$("#kabupaten").val()
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
	
	$("#kelurahan").select2({
		allowClear:true,
		ajax:{
			url:"<?=$url;?>kelurahan",
			dataType:'json',
			delay:0,
			data:function(params){
				return {
			        q: params.term,
			        k:$("#kecamatan").val()
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

function cek_info()
{
	$("#divinfo").toggle();
}

</script>
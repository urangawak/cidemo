<!--
FULL Datatables loader, yang dikasih bintang harus ada
-->
<link rel="stylesheet" href="<?=base_url();?>assets/datatables/DataTables/1.10.10/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" href="<?=base_url();?>assets/datatables/Responsive/2.0.0/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="<?=base_url();?>assets/datatables/Buttons/1.1.0/css/buttons.dataTables.min.css" />
<script src="<?=base_url();?>assets/datatables/DataTables/1.10.10/js/jquery.dataTables.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/Responsive/2.0.0/js/dataTables.responsive.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/DataTables/1.10.10/js/dataTables.bootstrap.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/Responsive/2.0.0/js/responsive.bootstrap.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/Buttons/1.1.0/js/dataTables.buttons.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/Buttons/1.1.0/js/buttons.flash.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/JSZip/2.5.0/jszip.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/pdfmake/0.1.18/build/pdfmake.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/pdfmake/0.1.18/build/vfs_fonts.js" ></script>
<script src="<?=base_url();?>assets/datatables/Buttons/1.1.0/js/buttons.html5.min.js" ></script>
<script src="<?=base_url();?>assets/datatables/Buttons/1.1.0/js/buttons.print.min.js" ></script>

<h5>Demo table Provinces,Regencies,Districts,Villages <a href="javascript:;" onclick="cek_info();">Cek Requirement</a></h5>
Fitur callback (lihat controller) dibuat untuk menghandle fungsi diluar konsep datatables. Contoh kasus :<br/>
Ada table angsuran, lalu kita mau mengetahui sudah berapa kali angsuran yang dibayarkan. Jika tidak memungkinkan membuat query lain untuk menghitung angsuran dibayarkan, maka dibutuhkan sebuah pemanggilan sebuah function pada helper. Nah, nantinya helper tersebut bisa menghandle data lain. Callback ini juga bagus untuk multi koneksi database
<div id="divinfo" style="display: none;">
	<div class="panel">
	<b>1</b> Library Ignited Datatables : <br/>
	Versi : 0.7<br/>
	URL : https://github.com/IgnitedDatatables/Ignited-Datatables <br/>
	<b>2</b> Jquery Datatables : 
	Versi : 1.10.10<br/>
	URL : https://datatables.net/ <br/>
	</div>
</div>

<script>
$(document).ready(function(){
		
	$('#tb').dataTable().fnDestroy();
	var oTable = $('#tb').dataTable({
	    "bProcessing": true,
	    "bServerSide": true,
	    "responsive": true,
	    "sAjaxSource": '<?=base_url();?>database/datatables_callback/viewajax',
	    "bJQueryUI": false,
	    "dom": 'Bfrtip',
	    "buttons": [
	        'copy', 'csv', 'excel', 'pdf', 'print'
	    ],
	"sPaginationType": "full_numbers",      
	    "iDisplayStart ": 10,
	    "aoColumns": [{
	         "mData": "kelurahan"
	     }, {
	         "mData": "kecamatan"
	     }, {
	         "mData": "kota"
	     }, {
	         "mData": "provinsi"
	     }, {
	         "mData": "aksi"
	     }],
	    "order": [[ 0, "asc" ]],
	    "oLanguage": {
	        "sProcessing": '<i class="fa fa-spinner fa-pulse fa-3x"></i>'
	    },
	    "fnInitComplete": function () {
	        oTable.fnAdjustColumnSizing();
	    },
	    'fnServerData': function (sSource, aoData, fnCallback) {
	        $.ajax
	        ({
	            'dataType': 'json',
	            'type': 'GET',
	            'url': sSource,
	            'data': aoData,
	            'success': fnCallback
	        });
	    }
	});
	
});

function cek_info()
{
	$("#divinfo").toggle();
}

</script>

<table class="table table-bordered" id="tb">
	<thead>
		<th>Kelurahan</th>
		<th>Kecamatan</th>
		<th>Kota</th>
		<th>Provinsi</th>
		<th></th>
	</thead>
	<tbody></tbody>
</table>
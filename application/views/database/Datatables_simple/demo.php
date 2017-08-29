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

<script>
$(document).ready(function(){
		
	$('#tb').dataTable().fnDestroy();
	var oTable = $('#tb').dataTable({
	    "bProcessing": true,
	    "bServerSide": true,
	    "responsive": true,
	    "sAjaxSource": '<?=$url;?>viewajax',
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

</script>

<table class="table table-bordered" id="tb">
	<thead>
		<th>Kelurahan</th>
		<th>Kecamatan</th>
		<th>Kota</th>
		<th>Provinsi</th>
	</thead>
	<tbody></tbody>
</table>
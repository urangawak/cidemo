<link rel="stylesheet" href="<?=base_url();?>assets/public/overlay.css" />

<a href="javascript:;" onclick="overlay_time();" class="btn btn-default">Tampilkan Overlay dalam 5 detik</a>

<div class="m-overlay" style="display: none;">
	<div class="m-overlay-text">
		<i class="fa fa-spin fa-refresh"></i>
		<span id="m-overlay-title">Memproses data</span>
	</div>
</div>

<script>

function overlay_time()
{
	show_overlay();
	setTimeout(function(){
		hide_overlay();
	},5000)
}

function show_overlay()
{
	$(".m-overlay").show();
}

function hide_overlay()
{
	$(".m-overlay").hide();
}

</script>
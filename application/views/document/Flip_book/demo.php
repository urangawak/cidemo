<?php
$url_plugin=base_url().'assets/dflip/';
$url_pdf=$url.'render_pdf';
?>
<script>
	var dflip_path="<?=$url_plugin;?>";
</script>
<link rel="stylesheet" href="<?=$url_plugin;?>css/dflip.css" />
<link rel="stylesheet" href="<?=$url_plugin;?>css/book.css" />
<link rel="stylesheet" href="<?=$url_plugin;?>css/themify-icons.css" />
<script src="<?=$url_plugin;?>js/dflip.js" ></script>

<div id="flipcontainer" style="height: 100%">

<div class="_df_book" source="<?=$url_pdf;?>" id="ebook"></div>

<script>
var flipBook=$("#flipcontainer").flipBook("<?=$url_pdf;?>");
</script>
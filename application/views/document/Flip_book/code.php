<div>
  <ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#cf_1"  role="tab" data-toggle="tab">Cara Menggunakan</a></li>
    <li><a href="#ctr" role="tab" data-toggle="tab">Controllers</a></li>
    <li><a href="#vws" role="tab" data-toggle="tab">Views</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="cf_1">
    	<p>&nbsp;</p>
    	<ul>
    		<li>Download paket aplikasi ini <?=github_download();?>
    		</li>
    		<li>Copy paste folder <b>dflip</b> dari folder <b>assets</b> ke folder satu file index.php. Contoh folder <b>cdn/dflip</b>.<br/>
    		Jadi strukturnya :<br/>
    		application<br/>
    		<b>cdn</b><br/>
    		<b>&nbsp;&nbsp; dflip</b><br/>
    		system<br/>
    		index.php<br/>
    		</li>
    		<li>
    			<div class="alert alert-warning">Ini adalah versi web copier, tidak direkomendasikan untuk digunakan project profit. Dan source code ini hanya untuk pembelajaran semata</div>
    		</li>
    	</ul>
    </div>
    <div role="tabpanel" class="tab-pane" id="ctr">
    	<p>&nbsp;</p>
    	<?php
    	$this->load->view($path_module.'/code_style/controller');
    	?>
    </div>
    <div role="tabpanel" class="tab-pane" id="vws">
    	<p>&nbsp;</p>
    	<?php
    	$this->load->view($path_module.'/code_style/view');
    	?>
    </div>
  </div>

</div>
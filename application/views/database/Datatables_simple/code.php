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
    		<li>Untuk contoh data, import database dari paket ini. Asumsi menggunakan Table Provinces,Regencies,Districts,Villages</li>
    		<li>Jangan lupa konfigurasi database</li>
    		<li>Copy paste file <b>Datatables.php</b> dari folder <b>application/libraries</b> ke folder application/libraries project anda</li>
    		<li>Copy paste folder <b>datatables</b> dari folder <b>assets</b> ke folder satu file index.php. Contoh folder <b>cdn/datatables</b>.<br/>
    		Jadi strukturnya :<br/>
    		application<br/>
    		<b>cdn</b><br/>
    		<b>&nbsp;&nbsp; datatables</b><br/>
    		system<br/>
    		index.php<br/>
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
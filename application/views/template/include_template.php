<?php
if(isset($path_module))
{
	$deskripsi_file=APPPATH."views".DIRECTORY_SEPARATOR.$path_module.DIRECTORY_SEPARATOR.'deskripsi.php';
	$demo_file=APPPATH."views".DIRECTORY_SEPARATOR.$path_module.DIRECTORY_SEPARATOR.'demo.php';
	$requirement_file=APPPATH."views".DIRECTORY_SEPARATOR.$path_module.DIRECTORY_SEPARATOR.'requirement.php';
	$code_file=APPPATH."views".DIRECTORY_SEPARATOR.$path_module.DIRECTORY_SEPARATOR.'code.php';
?>
<p>
	<?php
    if(file_exists($deskripsi_file) && is_file($deskripsi_file))
	{
		$this->load->view($path_module.'/deskripsi');
	}
    ?>
</p>
<div class="panel-group" id="detail" role="tablist">
  
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#detail" href="#rqq">
          System Requirement
        </a>
      </h4>
    </div>
    <div id="rqq" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
        <?php
        if(file_exists($requirement_file) && is_file($requirement_file))
		{
			$this->load->view($path_module.'/requirement');
		}
        ?>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#detail" href="#cdd">
          Cara Menggunakan & Code
        </a>
      </h4>
    </div>
    <div id="cdd" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
        <?php
        if(file_exists($code_file) && is_file($code_file))
		{
			$this->load->view($path_module.'/code');
		}
        ?>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#detail" href="#dmm">
          Demo
        </a>
      </h4>
    </div>
    <div id="dmm" class="panel-collapse collapse in" role="tabpanel">
      <div class="panel-body">
        <?php
        if(file_exists($demo_file) && is_file($demo_file))
		{
			$this->load->view($path_module.'/demo');
		}
        ?>
      </div>
    </div>
  </div>
  
  
</div>

<?php
}
?>
<?php
$keyword_call='';
if(isset($keyword))
{
	$keyword_call=",".$keyword;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title;?></title>
    <meta name="description" content="Kumpulan contoh implementasi library,plugins dengan menggunakan Codeigniter">
  	<meta name="keywords" content="contoh codeigniter,belajar codeigniter<?=$keyword_call;?>">
  	<meta name="author" content="Heru Rahmat Akhnuari">
  	<meta name="og:title" content="<?=$title;?>">
	<meta name="og:image" content="<?=base_url();?>assets/codeigniter_logo.png">
	<meta name="og:url" content="<?=base_url();?>">
	<meta name="og:site_name" content="CI Demo Application">
	<meta name="og:locale" content="id_ID">
	<meta name="og:type" content="website">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?=base_url();?>assets/jquery/2.1.4/jquery.min.js"></script>
  </head>
  <style>
  	body {
	  min-height: 2000px;
	  padding-top: 70px;
	}
  </style>
  <body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url();?>">CI DEMO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	<?php
          	$path=APPPATH.'controllers/';
          	$dir=array_slice(scandir($path,SCANDIR_SORT_ASCENDING),2);
          	if(!empty($dir))
          	{
				foreach($dir as $k)
				{
					$path_dir=$path.$k;
					if(is_dir($path_dir))
					{
						?>
						<?php
						$file=array_slice(scandir($path_dir,SCANDIR_SORT_ASCENDING),2);
						if(!empty($file))
						{
							?>
							<li class="dropdown">
				              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=ucwords($k);?> <span class="caret"></span></a>
				              <ul class="dropdown-menu">
							<?php
							foreach($file as $k2)
							{
								$path_file=$path_dir.DIRECTORY_SEPARATOR.$k2;
								$path_ext=pathinfo($path_file,PATHINFO_EXTENSION);
								if(file_exists($path_file) && is_file($path_file))
								{
									if($path_ext=="php")
									{
										$NameOfFile=str_replace(".php","",$k2);
										
										$url_file=base_url().strtolower($k.DIRECTORY_SEPARATOR.$NameOfFile);
										?>
										<li><a href="<?=$url_file;?>"><?=ucwords($NameOfFile);?></a></li>
										<?php
									}
								}
							}
							?>
							  </ul>
							</li>
							<?php
						}else{
							?>
							<li>
								<a href="javascript:;"><?=ucwords($k);?></a>
							</li>
							<?php
						}
					}
				}
			}
          	?>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container">
    	<h3><?=$title;?></h3>
    
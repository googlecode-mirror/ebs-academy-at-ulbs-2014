<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $GLOBALS['sitename'];?></title>
		<link rel="stylesheet" type="text/css" <?php echo 'href="'.WEB_DOMAIN.'/css/style.css"';?> />
                <script type='text/javascript' <?php echo 'src="'.WEB_DOMAIN.'/js/jquery.js"';?>></script>
                <script <?php echo 'src="'.WEB_DOMAIN.'/js/script.js"';?>></script> 
                <script src='https://www.google.com/recaptcha/api.js'></script>
            
	</head>

	<body>
		<div id="frame">
			
				<?php include "header.tpl.php"?>
			
			
			<div id="meniu_div">
				<?php include "meniu.php"?>
			</div>

			<div id="main">
				<?php echo (isset($msg) && is_array($msg)) ? implode("\n",$msg) : ''?>
                            
                                <?php echo (isset($redirect) && is_array($redirect))?' Vei fi redirectat in 3 secunde'
                                                                                    . header( "refresh:3;url=".  myUrl($redirect[0])   )
                                                                                    .' sau apasa <a href='.myUrl($redirect[0]).'>aici</a>':'';?>
			</div>
			
			
				<?php include "footer.tpl.php"?>
			
		</div>
    </body>
</html>
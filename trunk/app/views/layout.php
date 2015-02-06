<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $GLOBALS['sitename'];?></title>
		<link rel="stylesheet" type="text/css" <?php echo 'href="'.WEB_DOMAIN.'/css/style.css"';?> />
	</head>

	<body>
		<div id="frame">
			<div id="header">
				<?php include "header.tpl.php"?>
			</div>
			
			<div id="meniu_div">
				<?php include "meniu.php"?>
			</div>

			<div id="main">
				<?php echo (isset($msg) && is_array($msg)) ? implode("\n",$msg) : ''?>
			</div>
			
			<div id="footer">
				<?php include "footer.tpl.php"?>
			</div>
		</div>
    </body>
</html>
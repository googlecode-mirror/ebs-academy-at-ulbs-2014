<html>
<head>
	<title><?php echo $GLOBALS['sitename'];?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?php include "header.tpl.php";?>
	<?php echo (isset($msg) && is_array($msg)) ? implode("\n",$msg) : ''?>
	<?php include "footer.tpl.php";?>
</body>
</html>
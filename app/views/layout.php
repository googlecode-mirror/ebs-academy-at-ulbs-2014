<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $GLOBALS['sitename']; ?></title>
        <link rel="stylesheet" type="text/css" <?php echo 'href="' . WEB_DOMAIN . '/css/style.css"'; ?> />
        <link rel="stylesheet" <?php echo 'href="' . WEB_DOMAIN . '/css/bootstrap.min.css"'; ?> />
        <script type='text/javascript' <?php echo 'src="' . WEB_DOMAIN . '/js/jquery-2.1.3.js"'; ?>></script>
        <script <?php echo 'src="' . WEB_DOMAIN . '/js/script.js"'; ?>></script> 
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">   
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                    </head>

                    <body class="body">	
                        <?php include "header.tpl.php" ?>

                        <div class="container-fluid">
                            <?php echo (isset($msg) && is_array($msg)) ? implode("\n", $msg) : '' ?>

                            <?php
                            echo (isset($redirect) && is_array($redirect)) ? ' Vei fi redirectat in 2 secunde'
                                    . header("refresh:2;url=" . myUrl($redirect[0]))
                                    . ' sau apasa <a href=' . myUrl($redirect[0]) . '>aici</a>' : '';
                            ?>
                        </div>
                        <div class="footer">
                            <?php include "footer.tpl.php" ?>
                        </div>
                        <script type='text/javascript' <?php echo 'src="' . WEB_DOMAIN . '/js/bootstrap.js"'; ?>></script>
                    </body>
                    </html>
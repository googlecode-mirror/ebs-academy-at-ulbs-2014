<div id="header">
    <?php
	if(isset($_SESSION['uid'])) echo '<p> Welcome to ULBSPlatform User <a href="'.myUrl('main/logout').'">Deconectare</a></p>';
        else 
           echo '<p> Welcome to ULBSPlatform User <a href="'.myUrl('main/logout').'">Login</a></p>';
                ?>
</div>
<?php

function _addGrupa(){
    isUserLoggedIn();
   $data['msg'][]=View::do_fetch(VIEW_PATH.'addGrupa.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
    
    
}

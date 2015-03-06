<?php

function _addMaterii(){
    isUserLoggedIn();
   $data['msg'][]=View::do_fetch(VIEW_PATH.'addMaterii.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
    
    
}


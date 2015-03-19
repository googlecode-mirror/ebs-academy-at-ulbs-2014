<?php

function _addMaterii(){
    isUserLoggedIn();
    $user=new User(getdbh());
    $result['profesori']=$user->fetchByType('profesor');
   $data['msg'][]=View::do_fetch(VIEW_PATH.'addMaterii.tpl.php',$result);
	View::do_dump(VIEW_PATH.'layout.php',$data);
    
    
}


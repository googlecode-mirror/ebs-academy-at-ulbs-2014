<?php

function _addGrupaUsers($id=0){
    isUserLoggedIn();
    $user=new User(getdbh());
    $getUsers=$user->fetchAll();
    
    $result['user']=$getUsers;
    $result['grupaID']=$id;
    $data['msg'][]=View::do_fetch(VIEW_PATH.'addUserGrupa.tpl.php',$result);
    View::do_dump(VIEW_PATH.'layout.php',$data);
}
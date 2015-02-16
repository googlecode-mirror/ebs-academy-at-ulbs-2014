<?php

function _recover_password($token ='') {

    //verificarea daca tokenul mai este valid
    if (!is_null($token) ){
        $user = new User(getdbh());
        $result = $user->checkToken($token);
        if (isset($result['ID']) && isset($result['EMAIL'])) {
          $id['user']=$result;
        $data['msg'][]=View::do_fetch(VIEW_PATH.'new_pass.tpl.php', $id);
	View::do_dump(VIEW_PATH.'layout.php',$data);
           
        } else {
            redirect('error/404');
        }
    }

}

<?php

function _addTemaView() {
    isUserLoggedIn();
    if (getUserType() == 'profesor') {
     
        $grupa=new Grupa(getdbh());
        $result['grupa']=$grupa->fetchAll();
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'addTema.tpl.php',$result);
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

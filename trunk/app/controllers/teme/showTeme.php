<?php

function _showTeme() {
    
    isUserLoggedIn();
    if (getUserType() == 'admin' || getUserType() == 'profesor') {
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'afisareTemeProfesor.tpl.php');
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $tema = new Teme(getdbh());
        $result['tema'] = $tema->fetchTemeStudent();
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'afisareTemeStudent.tpl.php', $result);
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}
<?php

function _add_user() {
    isUserLoggedIn();
    $data['msg'][] = View::do_fetch(VIEW_PATH . 'adaugare_user.tpl.php');
    View::do_dump(VIEW_PATH . 'layout.php', $data);
}

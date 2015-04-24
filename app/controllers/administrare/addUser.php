<?php

function _add_user() {
    isUserLoggedIn();
    $data['msg'][] = View::do_fetch(VIEW_PATH . 'addUser.tpl.php');
    View::do_dump(VIEW_PATH . 'layout.php', $data);
}

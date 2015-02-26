<?php

function _show_users() {
    isUserLoggedIn();
    $user = new User(getdbh());
    $user_details = $user->fetchAll();
    $result['user'] = $user_details;

    $data['msg'][] = View::do_fetch(VIEW_PATH . 'afisare_user.tpl.php', $result);
    View::do_dump(VIEW_PATH . 'layout.php', $data);
}

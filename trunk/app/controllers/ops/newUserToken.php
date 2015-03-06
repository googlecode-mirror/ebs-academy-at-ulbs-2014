<?php

function _newUserToken($token = '') {


    if (!is_null($token)) {
        $user = new User(getdbh());
        $result = $user->checkConfirmationToken($token);
        if (isset($result['ID']) && isset($result['EMAIL'])) {
            if ($setStatus = $user->setStatus($result['ID'], 'NO_GROUP')) {
                $data['msg'][] = 'Emailul a fost confirmat';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
        } else {
            redirect('error/404');
        }
    }
}

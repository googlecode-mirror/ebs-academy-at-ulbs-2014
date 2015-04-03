<?php

function _check_login() {
    //TODO
    //$user = new User(getdbh());
    //$user->checkPassword();
    //redirect fie catre main page fie inapoi catre login
    //$_POST contine datele din form trimise de user

    $user = new User(getdbh());
    $user_details = $user->checkPassword($_POST['email'], $_POST['password']);
    if (count($user_details) == 1) {
        //TODO adauga in sesiune user id, si user type ($user_details['ID'])
        $_SESSION['uid'] = $user_details[0]['ID'];
        $_SESSION['type'] = $user_details[0]['TIP'];

        redirect('main/index');
    } else {
        redirect('main/login');
    }
}

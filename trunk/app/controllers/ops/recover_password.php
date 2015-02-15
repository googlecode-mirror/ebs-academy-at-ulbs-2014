<?php

function _recover_password($token = '') {
//cererea pentru schimbarea parolei
    if (isset($_POST['email'])) {
        $user = new User(getdbh());
        // print_r($_POST);
        $ID = $user->checkEmail($_POST['email']);
        // var_dump($ID);
        if (isset($ID['ID'])) {
            echo $setToken = $user->setRecover($ID['ID'], $_POST['email']);
            redirect('main/index');
        } else {
            redirect('eroare');
        }
    }

    //verificarea daca tokenul mai este valid
    if (isset($_GET['token'])) {
        $user = new User(getdbh());
        $result = $user->checkToken($_GET['token']);
        if (isset($result['ID']) && isset($result['EMAIL'])) {
            $_SESSION['NEW_EMAIL'] = $result['EMAIL'];
            $_SESSION['NEW_ID'] = $result['ID'];
            redirect('main/new_pass');
        } else {
            redirect('error/404');
        }
    }

    // schimbare parola
    //daca sunt date in post si exista emailul pentru care trebuie sa schimbam parola
    if (isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_SESSION['NEW_EMAIL'])) {
        $user = new User(getdbh());
        $result = $user->newPassword($_POST['pass1']);
        if ($result) {
            redirect('main/index');
        } else {
            redirect('eror/eror');
        }
    }
}

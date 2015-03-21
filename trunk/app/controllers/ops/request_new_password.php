<?php

//cererea pentru schimbarea parolei
function _request_new_password() {
    if (isset($_POST['email'])) {
        $user = new User(getdbh());
        $ID = $user->checkEmail($_POST['email']);
        if (isset($ID['ID'])) {
            $setToken = $user->setRecover($ID['ID'], $_POST['email']);

            if ($setToken != false) {
                $body = 'Pentru a schimba parola apasa   <a href="' . WEB_DOMAIN . WEB_FOLDER . 'ops/recover_password/' . $setToken . '"> AICI </a>';
                if (sendEmail('Schimbare parola', $body, 'ulbsPlatform@ebs.ro', $_POST['email'])) {
                    $data['msg'][] = "Emailul cu linkul de resetare a parolei a fost trimis";
                    View::do_dump(VIEW_PATH . 'layout.php', $data);
                } else {
                    $data['msg'][] = "Emailul nu a fost trimis";
                    View::do_dump(VIEW_PATH . 'layout.php', $data);
                }
            } else {
                $data['msg'][] = "Tokenul este gresit sau au trecut mai mult de 2 zile de la cererea de recuperare parola";
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
        } else {
            $data['msg'][] = "Acest user nu exista";
            View::do_dump(VIEW_PATH . 'layout.php', $data);
        }
    } else {
        redirect('main/index');
    }
}

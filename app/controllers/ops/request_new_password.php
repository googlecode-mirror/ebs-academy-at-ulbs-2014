<?php

//cererea pentru schimbarea parolei
function _request_new_password() {
    if (isset($_POST['email'])) {
        $user = new User(getdbh());
        $ID = $user->checkEmail($_POST['email']);
        if (isset($ID['ID'])) {
            $setToken = $user->setRecover($ID['ID'], $_POST['email']);
            if ($setToken == true) {
                $body = 'Pentru a schimba parola apasa   <a href="' . WEB_DOMAIN . WEB_FOLDER . 'ops/recover_password/' . $setToken . '"> AICI </a>';
                if (sendEmail('Schimbare parola', $body, 'ulbsPlatform@ebs.ro', $_POST['email'])) {
                    $data['msg'][] = "Emailul cu linkul de resetare a parolei a fost trimis";
                    View::do_dump(VIEW_PATH . 'layout.php', $data);
                } else {
                    redirect('eroare');
                }
            } else {
                redirect('eroare');
            }
            redirect('main/index');
        } else {
            redirect('eroare');
        }
    } else {
        redirect('main/index');
    }
}

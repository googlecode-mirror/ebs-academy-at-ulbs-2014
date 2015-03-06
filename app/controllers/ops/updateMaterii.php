<?php

function _updateMaterii() {
    isUserLoggedIn();
    $materii = new Materii(getdbh());
    $result = $materii->updateMaterii($_POST['idMaterii'], $_POST['credite'], $_POST['denumire']);
    if ($result) {
        $data['msg'][] = 'Grupa a fost modificata cu success';
        $data['redirect'][] = 'administrare/show_materii';

        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la modificarea materiei";
        $data['redirect'][] = 'administrare/show_materii';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}
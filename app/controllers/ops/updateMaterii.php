<?php

function _updateMaterii() {
    isUserLoggedIn();
    $materii = new Materii(getdbh());
    $result = $materii->updateMaterii($_POST['idMaterie'], $_POST['credite'], $_POST['denumire'],$_POST['idProf']);
    if ($result) {
        $data['msg'][] = 'Materia a fost modificata cu success';
        $data['redirect'][] = 'administrare/show_materii';

        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la modificarea materiei";
        $data['redirect'][] = 'administrare/show_materii';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}
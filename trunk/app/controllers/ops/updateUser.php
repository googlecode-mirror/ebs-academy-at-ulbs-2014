<?php

function _updateUser() {
    isUserLoggedIn();
    $user = new User(getdbh());
    $grupa = new Grupa(getdbh());
    if ($grupa->checkRegister($_POST['grupa'], $_POST['idUser']) == false) {
        $addGrupa = $grupa->addGrupaMember($_POST['grupa'], $_POST['idUser']);
    }
    $result = $user->updateUser($_POST['idUser'], $_POST['email'], $_POST['nume'], $_POST['prenume'], $_POST['type'], $_POST['status']);
    if ($result) {
        $data['msg'][] = 'Userul a fost modificat cu success';
        $data['redirect'][]='administrare/show_users';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la modificarea userului";
        $data['redirect'][] = 'administrare/show_users';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

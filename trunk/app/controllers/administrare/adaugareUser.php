<?php

function _adaugareUser() {
    isUserLoggedIn();
    
    $user = new User(getDbh());
    $result = $user->addUserByProf($_POST['nume'], $_POST['prenume']);
        if ($result) {
            $data['msg'][] = 'Studentul a fost adaugat cu success';
            $data['redirect'][] = 'administrare/show_users';

            View::do_dump(VIEW_PATH . 'layout.php', $data);
        } else {
            $data['msg'][] = "Eroare la adaugarea studentului";
            $data['redirect'][] = 'administrare/show_users';
            View::do_dump(VIEW_PATH . 'layout.php', $data);
        }
    
}
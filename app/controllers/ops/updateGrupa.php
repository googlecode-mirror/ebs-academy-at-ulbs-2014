<?php

function _updateGrupa() {
    isUserLoggedIn();
    $grupa = new Grupa(getdbh());
    if(isset($_POST['sef_grupa'])){
    $result = $grupa->updateGrupa($_POST['idGrupa'], $_POST['nume'], $_POST['an'], $_POST['profil'],$_POST['sef_grupa']);
    }
 else {
            $result = $grupa->updateGrupa($_POST['idGrupa'], $_POST['nume'], $_POST['an'], $_POST['profil']);

    }
    if ($result) {
        $data['msg'][] = 'Grupa a fost modificata cu success';
        $data['redirect'][] = 'administrare/show_grup';

        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la modificarea grupei";
        $data['redirect'][] = 'administrare/show_grup';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

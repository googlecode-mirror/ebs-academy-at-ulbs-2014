<?php

function _deleteGrupaMember() {
    isUserLoggedIn();
    $key = key($_POST);
    $grupaId = explode("_", $key);

    $grupa = new Grupa(getDbh());
    $deleteMember = $grupa->deleteGrupaMember($grupaId[1]);
    if ($deleteMember) {
        $data['msg'][] = "Studentul a fost scos din grupa";
        $data['redirect'][] = 'administrare/show_grup';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la stergerea din grupa";
        $data['redirect'][] = 'administrare/show_grup';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

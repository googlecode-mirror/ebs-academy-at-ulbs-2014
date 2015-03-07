<?php

function _deleteGrupaMember() {
    isUserLoggedIn();

    switch ($_POST['actiune']) {
        
        case 'delete':
            
            reset($_POST);
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
            break;
                
        case 'delete_all':

            $sterse = 0;
            $nesterse = 0;
            $grupa = new Grupa(getDbh());

            foreach ($_POST as $key) {
                if ($key == 'delete_all' || $key == 'Sterge tot') {
                    continue;
                } else {
                    $grupaID = explode("_", $key);
                    $deleteMember = $grupa->deleteGrupaMember($grupaID[1]);
                    if ($deleteMember) {
                        $sterse++;
                    } else {
                        $nesterse++;
                    }
                }
            }

            if ($sterse > 0) {
                $data['msg'][] = $sterse . " studenti au fost stersi cu success";
                $data['redirect'][] = 'administrare/show_grup';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = $nesterse . " studenti nu au fost stersi";
                $data['redirect'][] = 'administrare/show_grup';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;
    }
}

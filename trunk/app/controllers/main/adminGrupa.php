<?php

function _adminGrupa() {
//$_POST['checkbox']  = "id_1"- inseamna ca in interfata s-a selectat checkbox pt user_id 1

    switch ($_POST['actiune']) {
        case 'edit':
            reset($_POST);
            $key = key($_POST);
            $grupa_id = explode("_", $key);

            $grupa = new Grupa(getDbh());
            $grupa_details = $grupa->getGrupaDetails($grupa_id[1]);
            $grupa_users=$grupa->fetchGrupaUsers($grupa_id[1]);
            
            $result['grupa'] = $grupa_details;
            $result['studenti']=$grupa_users;
            $data['msg'][] = View::do_fetch(VIEW_PATH . 'modifica_grupa.tpl.php', $result);
            View::do_dump(VIEW_PATH . 'layout.php', $data);
            break;
        case 'delete':
            $sterse = 0;
            $nesterse = 0;
            $grupa = new Grupa(getDbh());
            foreach ($_POST as $key) {
                if ($key == 'delete') {
                    continue;
                } else {
                    $grupa_id = explode("_", $key);
                    if ($grupa->deleteGrupa($grupa_id[1]) == true) {
                        $sterse++;
                    } else {

                        $nesterse++;
                    }
                }
            }

            if ($sterse > 0) {
                $data['msg'][] = $sterse . " au fost sterse cu success";
                $data['redirect'][] = 'administrare/show_grup';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = $nesterse . "nu au fost sterse";
                $data['redirect'][] = 'administrare/show_grup';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;

        case 'add':
            
            $grupa = new Grupa(getDbh());
            $result = $grupa->addGrupa($_POST['nume'], $_POST['an'], $_POST['profil']);
            if ($result) {
                $data['msg'][] = 'Grupa a fost adaugata cu success';
                $data['redirect'][] = 'administrare/addGrupa';

                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = "Eroare la adaugarea grupei";
                $data['redirect'][] = 'administrare/addGrupa';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }

            break;
        default:
            //echo "wrong action"
            break;
    }
}

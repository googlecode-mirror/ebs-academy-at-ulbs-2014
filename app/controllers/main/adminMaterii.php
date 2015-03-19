<?php

function _adminMaterii() {
    isUserLoggedIn();
//$_POST['checkbox']  = "id_1"- inseamna ca in interfata s-a selectat checkbox pt user_id 1

    switch ($_POST['actiune']) {

        case 'edit':

            reset($_POST);
            $key = key($_POST);
            $materii_id = explode("_", $key);

            $materii = new Materii(getDbh());
            $materii_details = $materii->getMateriiDetails($materii_id[1]);
            
            $user=new User(getdbh());
            $result['profesori']=$user->fetchByType('profesor');
            
            $result['materii'] = $materii_details;
            $data['msg'][] = View::do_fetch(VIEW_PATH . 'modifica_materii.tpl.php', $result);
            View::do_dump(VIEW_PATH . 'layout.php', $data);
            break;

        case 'delete_all':

            $sterse = 0;
            $nesterse = 0;
            $materii = new Materii(getDbh());

            foreach ($_POST as $key) {

                if ($key == 'delete_all' || $key == 'Sterge tot') {
                    continue;
                } else {

                    $materii_id = explode("_", $key);

                    if ($materii->deleteMaterii($materii_id[1]) == true) {
                        $sterse++;
                    } else {

                        $nesterse++;
                    }
                }
            }

            if ($sterse > 0) {
                $data['msg'][] = $sterse . " au fost sterse cu success";
                $data['redirect'][] = 'administrare/show_materii';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = $nesterse . "nu au fost sterse";
                $data['redirect'][] = 'administrare/show_materii';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;

        case 'delete':

            reset($_POST);
            $key = key($_POST);
            $materii_id = explode("_", $key);
            

            $materii = new Materii(getdbh());
            if ($materii->deleteMaterii($materii_id[1]) == true) {
                $data['msg'][] = " Materii a  fost stersa cu success";
                $data['redirect'][] = 'administrare/show_materii';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {

                $data['msg'][] = " Materii nu a fost stersa";
                $data['redirect'][] = 'administrare/show_materii';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }

            break;


        case 'add':

            $materii = new Materii(getDbh());
            $result = $materii->addMaterii($_POST['profesor'],$_POST['credite'], $_POST['denumire']);
            if ($result) {
                $data['msg'][] = 'Materia a fost adaugata cu success';
                $data['redirect'][] = 'administrare/addMaterii';

                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = "Eroare la adaugarea materiei";
                $data['redirect'][] = 'administrare/addMaterii';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }

            break;
        default:
            //echo "wrong action"
            break;
    }
}


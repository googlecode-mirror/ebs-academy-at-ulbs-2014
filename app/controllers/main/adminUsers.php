<?php

function _adminUsers() {
    isUserLoggedIn();
    switch ($_POST['actiune']) {

        case 'edit':
            reset($_POST);
            $key = key($_POST);
            $user_id = explode("_", $key);

            $user = new User(getDbh());
            $user_details = $user->getUserDetails($user_id[1]);

            $grupa = new Grupa(getdbh());
            $groupsDetails = $grupa->fetchAll();
            $result['grupa'] = $groupsDetails;
            $result['user'] = $user_details;
            $result['ID'] = $user_id[1];
            $data['msg'][] = View::do_fetch(VIEW_PATH . 'modifica_user.tpl.php', $result);
            View::do_dump(VIEW_PATH . 'layout.php', $data);
            break;

        case 'delete':
            reset($_POST);
            $key = key($_POST);
            $user_id = explode("_", $key);

            $user = new User(getDbh());
            if ($user->deleteUser($user_id[1]) == true) {
                $data['msg'][] = " Userul a  fost sters cu success";
                $data['redirect'][]='administrare/show_users';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = " Userul nu a fost sters";
                $data['redirect'][]='administrare/show_users';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;

        case 'delete_all':
            $sterse = 0;
            $nesterse = 0;
            $user = new User(getDbh());
            foreach ($_POST as $key) {
                if ($key == 'delete_all') {
                    continue;
                } else {
                    $user_id = explode("_", $key);
                    if ($user->deleteUser($user_id[1]) == true) {
                        $sterse++;
                    } else {
                        $nesterse++;
                    }
                }
            }

            if ($sterse > 0) {
                $data['msg'][] = $sterse . "useri au fost stersi cu success";
                $data['redirect'][]='administrare/show_users';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = $nesterse . "useri nu au fost stersi";
                $data['redirect'][]='administrare/show_users';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;

        default:
            //echo "wrong action"
            break;
    }
}

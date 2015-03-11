<?php

function _adminNews($actiune = '', $id = 0) {

    switch ($actiune) {
        case 'edit':
            $noutate = new Noutati(getdbh());
            $result['noutate'] = $noutate->fetchNews($id);
            $data['msg'][] = View::do_fetch(VIEW_PATH . 'modificaNoutate.tpl.php', $result);
            View::do_dump(VIEW_PATH . 'layout.php', $data);

            break;
        case 'delete':
            $noutate = new Noutati(getdbh());
            $stergere = $noutate->deleteNews($id);
            if ($stergere > 0) {
                $data['msg'][] = "Noutatea a fost stersa cu success";
                $data['redirect'][] = 'news/showNews';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = "Eroare la stergerea noutatii";
                $data['redirect'][] = 'news/showNews';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;
        case 'editDone':
            $noutate = new Noutati(getdbh());

            $editNoutate = $noutate->updateNews($id, $_POST['noutate']);
            if ($editNoutate) {
                $data['msg'][] = "Noutatea a fost modificata cu success ";
                $data['redirect'][] = 'news/showNews';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = "Noutatea nu a  fost modificata";
                $data['redirect'][] = 'news/showNews';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }


            break;
        default :
            redirect('main/index');
            break;
    }
}

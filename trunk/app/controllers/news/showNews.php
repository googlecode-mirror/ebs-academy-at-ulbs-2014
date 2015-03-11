<?php

function _showNews() {

    isUserLoggedIn();
    if (getUserType() == 'admin' || getUserType() == 'profesor') {
        $noutate = new Noutati(getdbh());
        $result['noutate'] = $noutate->fetchAll();
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'noutatiProf.tpl.php', $result);
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {

        $noutate = new Noutati(getdbh());
        $result['noutate'] = $noutate->fetchAll();
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'noutatiStudent.tpl.php', $result);
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

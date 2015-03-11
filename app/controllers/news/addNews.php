<?php

function _addNews() {
    $user = new User(getdbh());
    $userDetails = $user->getUserDetails($_SESSION['uid']);
    $noutate = new Noutati(getdbh());
    
    $autor = $userDetails[0]['NUME'] . " " . $userDetails[0]['PRENUME'];
    
    if ($noutate->addNews($autor, $_POST['noutate'])) {
        $data['msg'][] = 'Noutatea a fost adaugata cu success';
        $data['redirect'][] = 'news/showNews';

        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = 'Noutatea nu a fost adaugata';
        $data['redirect'][] = 'news/showNews';

        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

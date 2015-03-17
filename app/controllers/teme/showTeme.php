<?php

function _showTeme() {
    
    isUserLoggedIn();
    if (getUserType() == 'admin' || getUserType() == 'profesor') {
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'afisareTemeProfesor.tpl.php');
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $grupaMea = new Grupa(getdbh());
        $result= $grupaMea->getGrupaUserCurent(getUserID());
        $idGrupaMea = (int)$result[0]['ID_GRUPA'];

        $tema = new Teme(getdbh());
        $result['tema'] = $tema->getTemeStudentCurent($idGrupaMea);
        $data['msg'][] = View::do_fetch(VIEW_PATH . 'afisareTemeStudent.tpl.php', $result);
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}
<?php

function _updateUser() {
    isUserLoggedIn();
    $user = new User(getdbh());
    $grupa = new Grupa(getdbh());
   
    if($_POST['currentGroup']>0 && $_POST['currentGroup']!=$_POST['grupa']){
        
        $remove=$grupa->removeGroupMember($_POST['currentGroup'], $_POST['idUser']);
         
    }
    
   $check=$grupa->checkRegister($_POST['grupa'], $_POST['idUser']);
    if ($check == false) {
        
        $addGrupa = $grupa->addGrupaMember($_POST['grupa'], $_POST['idUser']);
    }
    $result = $user->updateUser($_POST['idUser'], $_POST['email'], $_POST['nume'], $_POST['prenume'], $_POST['type'], $_POST['status']);
    if ($result) {
        $data['msg'][] = 'Userul a fost modificat cu success';
        $data['redirect'][]='administrare/show_users';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la modificarea userului";
        $data['redirect'][] = 'administrare/show_users';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
}

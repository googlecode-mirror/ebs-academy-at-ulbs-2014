<?php

function _addGrupaMember() {
    isUserLoggedIn();
    $grupa = new Grupa(getdbh());
    $checkGroup=$grupa->checkGroupRegistration($_POST['userID']);
    if($checkGroup!=false){
        if($checkGroup['ID_GRUPA']!=$_POST['grupaID']){
            $delete=$grupa->deleteGrupaMember($checkGroup['ID']); 
        }
       
       
    }
    $check=$grupa->checkRegister($_POST['grupaID'], $_POST['userID']);
    if($check==false){
    $addMember = $grupa->addGrupaMember($_POST['grupaID'], $_POST['userID']);
    if ($addMember) {
        $data['msg'][] = "Studentul a fost inscris in grupa";
        $data['redirect'][] = 'administrare/show_grup';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    } else {
        $data['msg'][] = "Eroare la inscriere";
        $data['redirect'][] = 'administrare/show_grup';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
    
    }
    else
    {
        $data['msg'][] = "Studentul este inscris la aceasta grupa";
        $data['redirect'][] = 'administrare/show_grup';
        View::do_dump(VIEW_PATH . 'layout.php', $data); 
    }
}

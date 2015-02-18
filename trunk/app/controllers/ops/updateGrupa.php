<?php

function _updateGrupa() {

    $grupa = new Grupa(getdbh());
    $result = $grupa->updateGrupa($_POST['idGrupa'], $_POST['nume'], $_POST['an'], $_POST['sef_grupa'], $_POST['profil']);
    if ($result) {
        $data['msg'][]='Grupa a fost modificata cu success';
        $data['redirect'][]='administrare/show_grup';
        
                        View::do_dump(VIEW_PATH.'layout.php',$data);
    } else {
        $data['msg'][]="Eroare la modificarea grupei";
         $data['redirect'][]='administrare/show_grup';
                        View::do_dump(VIEW_PATH.'layout.php',$data);
    }
}

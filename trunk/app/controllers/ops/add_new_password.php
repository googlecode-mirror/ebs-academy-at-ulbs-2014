<?php
 // schimbare parola
    //daca sunt date in post si exista emailul pentru care trebuie sa schimbam parola
function _add_new_password(){

    if (isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['id'])) {
        $user = new User(getdbh());
        $result = $user->newPassword($_POST['password1'],$_POST['id']);
      
        if ($result) {
            $data['msg'][]="Parola a fost schimbata cu success";
            View::do_dump(VIEW_PATH.'layout.php',$data);
        } else {
           $data['msg'][]="Eroare. Parola nu a fost schimbata. Trimite o noua cerere de schimbare a parolei";
            View::do_dump(VIEW_PATH.'layout.php',$data);
        }
    }
}

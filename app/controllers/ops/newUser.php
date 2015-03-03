<?php
function _newUser() {
    $user=new User(getdbh());
        
    $email=$user->checkEmail($_POST['email']);
       
    if(isset($email['ID'])){
        $data['msg'][] = " Acest email nu este disponibil! Va rugam alegeti altul!";
        $data['redirect'][] = 'main/new';
        View::do_dump(VIEW_PATH . 'layout.php', $data);
    }
    else {        
        $result = $user->addUser($_POST['email'], $_POST['password1'], $_POST['nume'], $_POST['prenume'] );
        if ($result) {
            $data['msg'][] = 'Contul de student a fost creat!';
            $data['redirect'][] = 'main/index';
            View::do_dump(VIEW_PATH . 'layout.php', $data);           
        } 
        else {
            $data['msg'][] = "Eroare la crearea contului!";
            $data['redirect'][] = 'main/index';
            View::do_dump(VIEW_PATH . 'layout.php', $data);
        }
    }
}


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
       
        if ($result>0) {
            $setToken = $user->newUserToken($result);
           
            if ($setToken != false) {
                $body = 'Pentru a schimba parola apasa   <a href="' . WEB_DOMAIN . WEB_FOLDER . 'ops/newUserToken/' . $setToken . '"> AICI </a>';
                echo $body;die;
                if (sendEmail('Email confirmare cont', $body, 'ulbsPlatform@ebs.ro', $_POST['email'])) {
                    $data['msg'][] = "Emailul cu linkul de confirmare cont a fost trimis";
                    $data['redirect'][] = 'main/index';
                    View::do_dump(VIEW_PATH . 'layout.php', $data);
                } else {
                    redirect('eroare');
                }
            } else {
                redirect('eroare');
            }
            
            
                      
        } 
        else {
            $data['msg'][] = "Eroare la crearea contului!";
            $data['redirect'][] = 'main/index';
            View::do_dump(VIEW_PATH . 'layout.php', $data);
        }
    }
}


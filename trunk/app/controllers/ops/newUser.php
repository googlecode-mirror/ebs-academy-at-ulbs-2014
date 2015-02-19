<?php
function _newUser() {
	$user=new User(getdbh());
        
       $email=$user->checkEmail($_POST['email']);
       
       if(isset($email['ID'])){//daca in rezultat primesc id atunci emailul nu este disponibil
               $data['msg'][] = " Acest email nu este disponibil";
                $data['redirect'][] = 'main/new';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
       }
       else
       {        //TODO sa adauge in baza de date, sa genereze cod unic sa trimita email
           
            
       }
}


<?php
function _check_login() {
	//TODO
	//$user = new User(getdbh());
	//$user->checkPassword();
	//redirect fie catre main page fie inapoi catre login
	//$_POST contine datele din form trimise de user
require_login();    
  $user=new User(getdbh());
  if($user->checkPassword($_POST['user'],$_POST['pass']) ){
        redirect('main/index');
    }
      else{
        redirect('main/login');
      
  }
}
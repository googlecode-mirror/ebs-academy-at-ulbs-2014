<?php
function _adminUsers() {
//$_POST['checkbox']  = "id_1"- inseamna ca in interfata s-a selectat checkbox pt user_id 1
    print_r($_POST);
    foreach ($_POST as $id => $value){
        echo $id.' '.$value.' ';
    }
	switch ($_POST['actiune']) {
		case 'edit':
			//TODO add edit actions
			//$user_id = explode($_POST['checkbox'], "_")[1];
			//$user = new User();
			//$user->editUser($user_id, ...)
		case 'delete':
			//TODO add delete actions
	}
}
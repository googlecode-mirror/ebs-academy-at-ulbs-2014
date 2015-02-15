<?php
function _adminUsers() {
//$_POST['checkbox']  = "id_1"- inseamna ca in interfata s-a selectat checkbox pt user_id 1

	switch ($_POST['actiune']) {
		case 'edit':
			$user_id = explode("_", $_POST['1'])[1];
			$user = new User(getDbh());
			$user_details = $user->getUserDetails($user_id);
			$result['user'] = $user_details;
			$data['msg'][]=View::do_fetch(VIEW_PATH.'modifica_user.tpl.php', $result);
			View::do_dump(VIEW_PATH.'layout.php',$data);
			//$user->updateUser($id, $nume, $prenume, $status);
			break;
		case 'delete':
			$user_id = explode("_", $_POST['1'])[1];
			$user = new User(getDbh());
			$user->deleteUser($user_id);
			$data['msg'][]=View::do_fetch(VIEW_PATH.'afisare_user.tpl.php');
			View::do_dump(VIEW_PATH.'layout.php',$data);
			break;
		default:
		//echo "wrong action"
		break;
	}
}
<?php
function _index() {
	$data['msg'][]=View::do_fetch(VIEW_PATH.'afisare_user.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
}	
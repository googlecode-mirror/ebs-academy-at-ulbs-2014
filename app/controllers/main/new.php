<?php
function _new() {
	$data['msg'][]=View::do_fetch(VIEW_PATH.'newUser.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
}




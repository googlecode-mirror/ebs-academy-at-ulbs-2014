<?php
function _login() {
	$data['msg'][]=View::do_fetch(VIEW_PATH.'login.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
}


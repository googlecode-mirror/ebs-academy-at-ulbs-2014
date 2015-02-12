<?php
function _new_pass() {
	$data['msg'][]=View::do_fetch(VIEW_PATH.'new_pass.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
     
}
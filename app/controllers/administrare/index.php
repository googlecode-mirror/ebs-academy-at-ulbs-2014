<?php
function _index() {
	$data['msg'][]=View::do_fetch(VIEW_PATH.'administrare.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
}	
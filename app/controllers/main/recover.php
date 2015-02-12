<?php
function _recover() {
	$data['msg'][]=View::do_fetch(VIEW_PATH.'uitare_parola.tpl.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
     
}


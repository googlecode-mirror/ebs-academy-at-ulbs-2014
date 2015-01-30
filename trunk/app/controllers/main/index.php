<?php
function _index($msg='Hello World!') {
	isUserLoggedIn();
  $view = new View(APP_PATH.'views/index_logat.tpl.php');
  $view->set('msg',$msg);
  $view->dump();
}
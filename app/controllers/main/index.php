<?php
function _index($msg='Hello World!') {
  $view = new View(APP_PATH.'views/confirmare_cont.tpl.php');
  $view->set('msg',$msg);
  $view->dump();
}
<?php
function _index($msg='Hello World!') {
  $view = new View(APP_PATH.'views/afis_prezente.tpl.php');
  $view->set('msg',$msg);
  $view->dump();
}
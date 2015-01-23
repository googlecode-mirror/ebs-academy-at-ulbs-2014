<?php
function _index($msg='Hello World!') {
  $view = new View(APP_PATH.'views/afis_prezente_prof.tpl.php');
  $view->set('msg',$msg);
  $view->dump();
}
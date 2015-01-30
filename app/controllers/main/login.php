<?php

$data['msg'] = View::do_fetch(VIEW_PATH.'main/login.tpl.php');
View::do_dump(VIEW_PATH.'layout.php',$data);
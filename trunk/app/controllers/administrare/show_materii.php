<?php
function _show_materii(){
    $materii=new Materii(getdbh());
    $allMaterii=$materii->fetchAll();
    $result['materii']=$allMaterii;
    $data['msg'][]=View::do_fetch(VIEW_PATH.'afisare_materii.tpl.php',$result);
    View::do_dump(VIEW_PATH.'layout.php',$data);
}


<?php
function _showAllMat(){
    $materie=new Materii(getdbh());
    $result['materii']=$materie->fetchMaterii();
     $data['msg'][]=View::do_fetch(VIEW_PATH.'showAllMat.tpl.php',$result);
    View::do_dump(VIEW_PATH.'layout.php',$data);
    
}

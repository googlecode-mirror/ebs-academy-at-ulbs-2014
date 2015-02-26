<?php
function _showGrupaDetails($id=0, $numeGrupa=''){
    isUserLoggedIn();
    $grupa=new Grupa(getdbh());
    $result['users']=$grupa->fetchGrupaUsers($id);
    $result['nume']=$numeGrupa;
    $result['id']=$id;
    $data['msg'][]=View::do_fetch(VIEW_PATH.'showGrupaDetails.tpl.php',$result);
    View::do_dump(VIEW_PATH.'layout.php',$data);
}
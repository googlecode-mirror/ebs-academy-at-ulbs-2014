<?php
function _showGrupaDetails($id=0, $numeGrupa=''){
    $grupa=new Grupa(getdbh());
    $result['users']=$grupa->fetchGrupaUsers($id);
    $result['nume']=$numeGrupa;
    $data['msg'][]=View::do_fetch(VIEW_PATH.'showGrupaDetails.tpl.php',$result);
    View::do_dump(VIEW_PATH.'layout.php',$data);
}
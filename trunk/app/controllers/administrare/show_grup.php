    <?php
function _show_grup(){
    isUserLoggedIn();
    $grupa=new Grupa(getdbh());
    $allGroups=$grupa->fetchAll();
    $result['grupa']=$allGroups;
    $data['msg'][]=View::do_fetch(VIEW_PATH.'afisare_grupa.tpl.php',$result);
    View::do_dump(VIEW_PATH.'layout.php',$data);
}

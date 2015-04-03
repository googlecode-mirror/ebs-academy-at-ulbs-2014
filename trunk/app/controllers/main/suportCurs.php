<?php
function _suportCurs() {
isUserLoggedIn();

if(getUserType()=='student'){
	$data['msg'][]=View::do_fetch(VIEW_PATH.'suport_curs_stud.php');
	View::do_dump(VIEW_PATH.'layout.php',$data);
    }
else{
        $grupa=new Grupa(getdbh());
        $getGroups=$grupa->fetchAll();
        $result['grupa']=$getGroups;
        
        $materie=new Materii(getdbh());
        $getMaterii=$materie->fetchGroupaAndMateria();
        $result['materie']=$getMaterii;
                
        $data['msg'][]=View::do_fetch(VIEW_PATH.'suport_curs_prof.php',$result);
        View::do_dump(VIEW_PATH.'layout.php',$data);
    }

}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


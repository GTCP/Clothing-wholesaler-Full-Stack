<?php

require_once('libs/Smarty.class.php');


class UserView {
    private $Smarty;
    function __construct(){
        $this->Smarty = new Smarty();
    }

    public function DisplayLogin(){

        $this->Smarty->assign('titulo',"Login");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->display('templates/login.tpl');
    }
    public function ShowUsers($Users,$User){
        
        $this->Smarty->assign('titulo',"Users");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('Users',$Users);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/users.tpl');
    }
    public function ShowEditUser($UserEdit,$User){
       
        $this->Smarty->assign('titulo',"FormEditUser");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('UserEdit',$UserEdit);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/formedituser.tpl');
    }
}
?>
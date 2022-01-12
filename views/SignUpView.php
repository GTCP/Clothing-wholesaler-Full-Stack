<?php

require_once('libs/Smarty.class.php');


class SignUpView {
    private $Smarty;
    function __construct(){
        $this->Smarty = new Smarty();
    }
    public function DisplaySignUp(){

        $this->Smarty->assign('titulo',"SignUp");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->display('templates/signup.tpl');
    }
}
?>
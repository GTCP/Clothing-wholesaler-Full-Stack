<?php

require_once('libs/Smarty.class.php');


class CategoryView {
    private $Smarty;
    function __construct(){
        $this->Smarty = new Smarty();
    }

    public function DisplayCategoriaId($Category){

        $this->Smarty->assign('titulo',"Categoria");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Category',$Category);
        $this->Smarty->display('templates/categoria.tpl');
    }
    public function DisplayCategoriaLog($Category,$User){
        $this->Smarty->assign('titulo',"Categorialog");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Category',$Category);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/categorialog.tpl');
    }
    public function DisplayEditCategoriaId($Category,$User){

        $this->Smarty->assign('titulo',"EditCategoria");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Category',$Category);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/editcategoria.tpl');

    }
    public function DisplayFormEditCategory(){

        $this->Smarty->assign('titulo',"FormEditCategory");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->display('templates/formeditcategory.tpl');

    }
    public function VerFormEditCategory($category,$User){

        $this->Smarty->assign('titulo',"FormEditCategory");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('category',$category);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/formeditcategory.tpl');

    }
}
?>
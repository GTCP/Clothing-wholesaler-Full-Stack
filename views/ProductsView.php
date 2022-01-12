<?php

require_once('libs/Smarty.class.php');


class ProductsView {
    private $Smarty;
    function __construct(){
        $this->Smarty = new Smarty();
    }

    public function DisplayProductsId($Products){

        $this->Smarty->assign('titulo',"Products");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Products',$Products);
        $this->Smarty->display('templates/products.tpl');

    }
    public function ProductWithComments($Products,$User){
        $this->Smarty->assign('titulo',"Products");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Products',$Products);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/showproductwithcomments.tpl');
    }


    public function DisplayEditProductsId($Products,$Category,$User){

        $this->Smarty->assign('titulo',"EditProducts");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Products',$Products);
        $this->Smarty->assign('list_Category',$Category);
        $this->Smarty->assign('User',$User);
        $this->Smarty->display('templates/editproducts.tpl');

    }
    public function DisplayFormEditProduct($Products,$Category){
        $this->Smarty->assign('titulo',"FormEditProducts");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('list_Products',$Products);
        $this->Smarty->assign('list_Category',$Category);
        $this->Smarty->display('templates/formeditproduct.tpl');

    }
    public function VerFormEditProduct($Product,$category,$User,$images){
        $this->Smarty->assign('titulo',"FormEditProducts");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('product',$Product);
        $this->Smarty->assign('category',$category);
        $this->Smarty->assign('User',$User);
        $this->Smarty->assign('Images', $images);
        $this->Smarty->display('templates/formeditproduct.tpl');

    }
    public function MostrarImages($product,$Images){
        $this->Smarty->assign('titulo',"MostrarImagesDeProduct");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('product',$product);
        $this->Smarty->assign('Images', $images);
        $this->Smarty->display('templates/Product.tpl');
    }
    public function DisplayOnlyProductId($Product,$Images){

        $this->Smarty->assign('titulo',"product");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('product',$Product);
        $this->Smarty->assign('Images', $Images);
        $this->Smarty->display('templates/product.tpl');

    }
    public function DisplayOnlyProductIdLog($Product, $User,$Images){

        $this->Smarty->assign('titulo',"product");
        $this->Smarty->assign('BASE_URL',BASE_URL);
        $this->Smarty->assign('product',$Product);
        $this->Smarty->assign('User',$User);
        $this->Smarty->assign('Images', $Images);
        $this->Smarty->display('templates/productlog.tpl');

    }
}
?>  
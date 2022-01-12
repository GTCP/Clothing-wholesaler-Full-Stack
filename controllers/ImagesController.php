<?php
require_once "./models/ImagesModel.php";
require_once "ProductsController.php";
class ImagesController{
    private $model;
    private $view;
    private $controllerproduct;
	function __construct(){
        $this->model = new ImagesModel();
        $this->controllerproduct = new ProductsController();
    }
    
    function addImages($id){
        $this->controllerproduct->checkLogIn();
        if ($_FILES['image']['name'] == null){
            header('Location: ' . URL_PRODUCTSADM);
        }else{
            if ($_FILES['image']['name']) {
                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png") {
                    $this->model->addImages($id,$_FILES['image']);              
                }
            }
        }
        header('Location: ' . URL_PRODUCTSADM);
    }
    public function deleteImage($id_image){
        $this->model->deleteImage($id_image);
       // $id_product=$_POST['id_product'];
        
        header('Location: ' . URL_PRODUCTSADM);
        
    }
}
?>
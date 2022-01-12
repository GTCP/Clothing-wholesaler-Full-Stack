<?php
require_once "./Models/ProductsModel.php";
require_once "./Views/ProductsView.php";
require_once "./Models/ProductsModel.php";
require_once "./Models/ImagesModel.php";


class ProductsController {

    private $model;
    private $view;
    private $modelcate;
    private $viewcate;
    private $userView;
    private $userModel;
    private $modelimages;
    private $viewimages;
	function __construct(){
        
        $this->model = new ProductsModel();
        $this->view = new ProductsView();
        $this->modelcate = new CategoryModel();
        $this->viewcate = new CategoryView();
        $this->userModel = new UserModel();
        $this->userView = new UserView();
        $this->modelimages = new ImagesModel();

    }
    public function MostrarProductss(){
        $this->view->DisplayProducts();
    }
    //Chequeo si esta logueado
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    //Todas las funciones del visitante
    public function GetProducts(){
        $Products = $this->model->GetProducts();
        $this->view->DisplayProductsId($Products);
        
    }
    public function GetProductsByOrder(){
        $Products = $this->model->GetProductsByOrderCategory();
        $this->view->DisplayProductsId($Products);

    }
    public function DetailsProduct($id){
        $Product = $this->model->GetProductId($id);
        $Images = $this->modelimages->GetImages($id);
        $this->view->DisplayOnlyProductId($Product,$Images);
    }
    //Todas las funciones del Usuario administrador
    public function GetProductsAdmin(){
        $this->checkLogIn();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $Products = $this->model->GetProducts();
        $Category = $this->modelcate->GetCategoria();
        $this->view->DisplayEditProductsId($Products,$Category,$User);
    }    
    public function GetEditProducts(){
        $this->checkLogIn();
        $id_product = $_POST["id_product"];
        $name= $_POST["name"];
        $description= $_POST["description"];
        $price= $_POST["price"];
        $stock= $_POST["stock"];
        $id_category =$_POST['id_category'];
        $this->model->SaveEditProduct($name,$description,$price,$stock,$id_category,$id_product);
        header("Location: " . URL_PRODUCTSADM);

    }
    public function InsertProduct(){
        $this->checkLogIn(); 
        $name= $_POST['name'];
        $description= $_POST['description'];
        $price= $_POST['price'];
        $stock= $_POST['stock'];
        $id_category =$_POST['id_category'];
        $this->model->InsertProduct($name,$description,$price,$stock,$id_category);
        header("Location: " . URL_PRODUCTSADM);  
    }
    public function BorrarOneProduct($id_product){
        $this->checkLogIn();
        $this->model->BorrarOneProduct($id_product);
        header("Location: " . URL_PRODUCTSADM);


    }
    public function VerFormEditProduct($id_product){
        $this->checkLogIn();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $product = $this->model->GetProductId($id_product);
        $category = $this->modelcate->GetCategoria();
        $images = $this->modelimages->GetImages($id_product);
        $this->view->VerFormEditProduct($product,$category,$User,$images);
    }
    //Todas las funciones del usuario logueado
    public function GetProductsLog(){
        $this->checkLogIn();
        $Products = $this->model->GetProducts();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $this->view->ProductWithComments($Products,$User);
    }
    public function GetProductsByOrderLog(){
        $this->checkLogIn();
        $Products = $this->model->GetProductsByOrderCategory();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $this->view->ProductWithComments($Products,$User);

    }
    public function DetailsProductLog($id){
        $this->checkLogIn();
        $Product = $this->model->GetProductId($id);
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $images = $this->modelimages->GetImages($id);
        $this->view->DisplayOnlyProductIdLog($Product,$User,$images);
    }
}

?>
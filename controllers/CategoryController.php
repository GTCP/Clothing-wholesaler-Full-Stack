<?php
require_once "./Models/CategoryModel.php";
require_once "./Views/CategoryView.php";
require_once "ProductsController.php";
require_once "UserController.php";

class CategoryController {

    private $model;
    private $view;
    private $controller;
    private $controlleruser;
    private $userModel;

	function __construct(){
        
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->controller = new ProductsController();
        $this->controlleruser = new UserController();
        $this->userModel = new UserModel;  
    }
    //Todas las funciones del Visitante
    public function MostrarCategoria(){
        $this->view->DisplayCategoria();
    }
    public function GetCategoria(){
        $Category = $this->model->GetCategoria();
        $this->view->DisplayCategoriaId($Category);  
    }
    //Todas las funciones del Usuario Logueado
    public function GetCategoriaLog(){
        $this->controller->checkLogIn();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $Category = $this->model->GetCategoria();
        $this->view->DisplayCategoriaLog($Category, $User);
    }
    //Todas las funciones del Usuario Administrador 
    public function GetEditCategoria(){
        $this->controller->checkLogIn();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $Category = $this->model->GetCategoria();
        $this->view->DisplayEditCategoriaId($Category, $User);  
    }
    public function GetEditCategoriaId($id_category){
        $this->controller->checkLogIn();
        $Category = $this->model->GetCategoriaId($id_category);
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $this->view->VerFormEditCategory($Category,$User);
    }
    public function SaveEditCategory(){
        $this->controller->checkLogIn();
        $id_category = $_POST['id_category']; 
        $name= $_POST['name'];
        $description= $_POST['description'];
        $this->model->SaveEditCategory($name,$description,$id_category);
        $Category = $this->model->GetCategoria();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $this->view->DisplayEditCategoriaId($Category, $User);  
    }
    public function BorrarOneCategory($id_category){
        $this->controller->checkLogIn();
        $this->model->BorrarOneCategory($id_category);
        $Category = $this->model->GetCategoria();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $this->view->DisplayEditCategoriaId($Category, $User);  

    }
    public function InsertCategory(){
        $this->controller->checkLogIn(); 
        $name= $_POST['name'];
        $description= $_POST['description']; 
        $this->model->InsertCategory($name,$description);
        $Category = $this->model->GetCategoria();
        $user_id = $_SESSION['userId'];
        $User = $this->userModel->GetUser($user_id);
        $this->view->DisplayEditCategoriaId($Category, $User);  

    }
}
?>
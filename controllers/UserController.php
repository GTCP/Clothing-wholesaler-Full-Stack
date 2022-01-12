<?php
require_once "./models/UserModel.php";
require_once "./views/UserView.php";
require_once "./controllers/SignUpController.php";
require_once "./controllers/ProductsController.php";



class UserController {
    private $model;
    private $view;
    private $controller;
	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->controller = new ProductsController();

    }
    public function iniciarSesion(){
        $password = $_POST['password'];
        $usuario = $this->model->getPassword($_POST['user']);
        if (isset($usuario) && password_verify($password, $usuario->pass)){
            var_dump(password_verify($password, $usuario->pass));
            session_start();
            $_SESSION['user'] = $usuario->usuario;
            $_SESSION['userId'] = $usuario->id_usuario;
            if ($usuario->is_admin==1) {
                header("Location: " . URL_PRODUCTSADM );
            }
            elseif($usuario->is_admin==0) {
                
                header("Location: " . URL_PRODUCTSLOG);
            }
        }else{
            header("Location: " . URL_LOGIN);
        }
    }
    public function ShowUsers(){
        $this->controller->checkLogIn();
        $user_id = $_SESSION['userId'];
        $User = $this->model->GetUser($user_id);
        $Users = $this->model->GetUsers();
        $this->view->ShowUsers($Users,$User);
    }
    public function DeleteUser($id_user){
        $this->controller->checkLogIn();
        $this->model->DeleteUser($id_user);
        header("Location: " . BASE_URL . "/users");

    }
    public function EditUser($id){
        $this->controller->checkLogIn();
        $user_id = $_SESSION['userId'];
        $User = $this->model->GetUser($user_id);
        $User_edit = $this->model->GetUser($id);
        $this->view->ShowEditUser($User_edit,$User);
    }
    public function SaveEditUser(){
        $this->controller->checkLogIn();
        $id_user = $_POST["id_usuario"];
        $is_admin = $_POST["is_admin"];
        $this->model->SaveEditUser($is_admin, $id_user);
        header("Location: " . BASE_URL . "users");
    }
    public function login(){
        $this->view->DisplayLogin();
    }
    public function logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }

}
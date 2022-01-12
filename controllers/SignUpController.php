<?php
require_once "./Views/SignUpView.php";
require_once "./Models/UserModel.php";

class SignUpController {

    private $model;
    private $view;
    private $view2;
    private $userController;
	function __construct(){
        $this->view = new SignUpView();
        $this->model = new UserModel();
        $this->view2 = new UserView();
    }
    public function SignUp(){
        $this->view->DisplaySignUp();
    }
    public function registrarse(){
        $usuario= $_POST['usuario'];
        $pass= $_POST['pass'];
        $email= $_POST['email'];
        $name= $_POST['name'];
        $lastname= $_POST['lastname'];

        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $this->model->InsertarUsuario($usuario,$hash,$email,$name,$lastname);
        $this->iniciarSesion();
    }
    public function iniciarSesion(){
        $pass = $_POST['pass'];
        $usuario = $this->model->getPassword($_POST['usuario']);
        if (isset($usuario) && password_verify($pass, $usuario->pass)){
            var_dump(password_verify($pass, $usuario->pass));
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
}
?>
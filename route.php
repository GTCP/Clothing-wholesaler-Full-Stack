<?php


require_once "controllers/UserController.php";
require_once "controllers/SignUpController.php";
require_once "controllers/ProductsController.php";
require_once "controllers/CategoryController.php";
require_once "controllers/ImagesController.php";



$action = $_GET["action"];

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_PRODUCTS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/products');
define("BASE_FORMEDITPRODUCT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/formeditproduct');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_SIGNUP", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/signup');
define("URL_PRODUCTSADM", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productsadm');
define("URL_PRODUCTSLOG", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productslog');

define("URL_EDITCATEGORIA", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/editcategoria');

$controller = new ProductsController();
$controllercate = new CategoryController();
$controllerUser = new UserController();
$controllerSignUp = new SignUpController();
$controllerImages = new ImagesController();


if($action == ''){
    $controller->GetProducts();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        
        if($partesURL[0] == "products"){
            $controller->GetProducts();
        }elseif($partesURL[0] == "FormEditProduct") {
            $controller->VerFormEditProduct($partesURL[1]);
        }elseif($partesURL[0] == "productsbyorder") {
            $controller->GetProductsByOrder();
        }elseif($partesURL[0] == "productsbyorderlog") {
            $controller->GetProductsByOrderLog();
        }elseif($partesURL[0] == "UpdateProduct") {
            $controller->GetEditProducts();
        }elseif($partesURL[0] == "productsadm"){
            $controller->GetProductsAdmin();
        }elseif($partesURL[0] == "productslog"){
            $controller->GetProductsLog();
        }elseif($partesURL[0] == "insertproduct") {
            $controller->InsertProduct();
        }elseif($partesURL[0] == "product") {
            $controller->DetailsProduct($partesURL[1]);
        }elseif($partesURL[0] == "productlog") {
            $controller->DetailsProductLog($partesURL[1]);
        }elseif($partesURL[0] == "BorrarOneProduct") {
            $controller->BorrarOneProduct($partesURL[1]);
        }elseif($partesURL[0] == "category") {
            $controllercate->GetCategoria();
        }elseif($partesURL[0] == "categorylog") {
            $controllercate->GetCategoriaLog();
        }elseif($partesURL[0] == "editcategory") {
            $controllercate->GetEditCategoria();
        }elseif($partesURL[0] == "insertcategory") {
            $controllercate->InsertCategory();
        }elseif($partesURL[0] == "BorrarOneCategory") {
            $controllercate->BorrarOneCategory($partesURL[1]);
        }elseif($partesURL[0] == "EditCategory") {
            $controllercate->GetEditCategoriaId($partesURL[1]);
        }elseif($partesURL[0] == "UpdateCategory") {
            $controllercate->SaveEditCategory();
        }elseif($partesURL[0] == "login") {
            $controllerUser->Login();
        }elseif($partesURL[0] == "signin") {
            $controllerUser->Login();
        }elseif($partesURL[0] == "iniciarSesion") {
            $controllerUser->IniciarSesion();
        }elseif($partesURL[0] == "users") {
            $controllerUser->ShowUsers();
        }elseif($partesURL[0] == "deleteUser") {
            $controllerUser->DeleteUser($partesURL[1]);
        }elseif($partesURL[0] == "editUser") {
            $controllerUser->EditUser($partesURL[1]);
        }elseif($partesURL[0] == "UpdateUser") {
            $controllerUser->SaveEditUser();
        }elseif($partesURL[0] == "logout") {
            $controllerUser->Logout();
        }elseif($partesURL[0] == "signup") {
            $controllerSignUp->SignUp();
        }elseif($partesURL[0] == "registrarse") {
            $controllerSignUp->registrarse();
        }elseif($partesURL[0] == "addImages") {
            $controllerImages->addImages($partesURL[1]);
        }elseif($partesURL[0] == "deleteImage") {
            $controllerImages->deleteImage($partesURL[1]);
        }
    }
}
?>
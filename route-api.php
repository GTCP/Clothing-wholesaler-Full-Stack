<?php
require_once("Router.php");
require_once("./api/controllers/CommentsApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo

$router->addRoute("comments", "GET", "CommentsApiController", "GetComments");
$router->addRoute("comments/:ID", "GET", "CommentsApiController", "GetCommentsProduct");

$router->addRoute("comment/:ID", "GET", "CommentsApiController", "GetComment");
$router->addRoute("comment/:ID", "DELETE", "CommentsApiController", "DeleteComment");
$router->addRoute("comments/:ID", "POST", "CommentsApiController", "AddComment");
$router->addRoute("comment/:ID", "PUT", "CommentsApiController", "UpdateComment");



// rutea
$router->route($resource, $method);

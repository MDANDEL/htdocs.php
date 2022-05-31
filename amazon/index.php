<?php

session_start();

require_once 'functions.php';
require_once 'model/Cart.php';
require_once 'model/Category.php';
require_once 'model/Product.php';
require_once 'model/User.php';
require_once 'controller/ProductController.php';
require_once 'controller/RegisterController.php';

$url = parse_url(urldecode($_SERVER['REQUEST_URI']));

switch ($url['path']) {
    case "/login":
        require_once 'controller/LoginController.php';
        break;
    case "/catalogue":
        ProductController::list();
        break;
    case "/catalogue/produit":
        ProductController::show();
        break;
    case "/register":
        RegisterController::register();
        break;
    case "/addproduct":
        ProductController::addProducts();
        break;
    case "/addproduct":
        ProductController::addProducts();
        break;
    default:
        echo "404";
}
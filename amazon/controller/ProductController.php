<?php

require_once 'functions.php';

class ProductController {
    public static function list() {
        echo "lister les produits";
        var_dump (getProducts());
    }

    public static function show() {
        $id = $_GET['id'];
        $product = getProduct($id);

        if ($product){
            $title = $product->name;
            require_once 'views/product/show.php';
        }
        else{
            echo "produit non trouvé";
        }
    }

    public static function addProducts() {

        require_once 'views/product/addproduct.php';

        
        $name = $_POST['product'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        if(isset($_POST['product']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['category']) && isset($_POST['price']))
        {
            addProduct($name, $description, $image, $category, $price);
        }
        
    }

    public static function deleteProducts(){
        require_once 'views/product/deleteproduct.php';
    }
}
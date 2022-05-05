<?php

require_once 'functions.php';

class ProductController {
    public static function list() {
        echo "lister les produits";
        var_dump (getProducts());
    }

    public static function show() {
        echo "voir un produits";
    }


}
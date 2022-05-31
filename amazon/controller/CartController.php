<?php
require_once 'functions.php';

class CartController {
    public static function addToCart() {
        if (isset($_POST['username']) && isset($_POST['password'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $emailcheck = $_POST['emailcheck'];
            $password = $_POST['password'];
            $passwordcheck = $_POST['passwordcheck'];
 
            if ($email != $emailcheck){
                echo "Vos entrés de mail ne correspondent pas";
            }
            elseif ($password != $passwordcheck){
                echo "Vos mots de passe ne correspondent pas";
            }
            elseif ($email === $emailcheck && $password === $passwordcheck){
                $user = createUser($username, $email, $password);
            }
           
        } 
        require_once 'views/register.php';
    }
}
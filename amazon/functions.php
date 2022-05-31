<?php

require_once 'model/User.php';

function getDb(): PDO
{
    return new PDO(
        'mysql:host=localhost;dbname=amazon;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

function getProducts(): array
{
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM product ORDER BY id DESC');
    $stmt->execute();

    $products = $stmt->fetchAll();


    foreach ($products as $p) {
        $product = new Product();
        $product->id = $p['id'];
        $product->name = $p['name'];
        $product->description = $p['description'];
        $product->price = $p['price'];

        $products[] = $product;
    }

    return $products;
}


function getProduct(int $id): ?Product
{
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->execute(['id' => $id]);

    $data = $stmt->fetch();


    if ($data) {
        $product = new Product();
        $product->id = $data['id'];
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];

        return $product;
    }

    return null;
}

function authUser(string $username, string $password): ?User
{
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $stmt->execute([
        'username' => $username,
        'password' => $password,
    ]);

    $user = $stmt->fetch();

    if ($user) {
        return new User(
            $user['id'],
            $user['username'],
            $user['email'],
            $user['password'],

        );
    }

    return null;
}


function createUser(string $username, string $email, string $password): void
{
    $db = getDb();
    $stmt = $db->prepare("
    INSERT INTO user (username, password, email)
    VALUES(:username, :password, :email);");
    $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);

}

function userAlreadyExist (string $newUsername, string $newEmail): void {
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM user ORDER BY id DESC');
    $stmt->execute();

    $users = $stmt->fetchAll();

    foreach($users as $user){
        if ($user->username === $newUsername)
        {
            echo "Ce pseudo existe déjà, veuillez en choisir un autre";
        }
        elseif ($user->email === $newEmail)
        {
            echo "Un compte existe déjà avec cette adresse email. Si vous avez oublié votre mot de passe, cliquez sur mot de passe oublié";
        }
    }
}

function addProduct(string $name, string $description, string $image, string $category, int $price): void
{
    $db = getDb();
    $stmt = $db->prepare('INSERT INTO product(name, description, price, category, image)
    VALUES (:name, :description, :price, :category, :image)');
    $stmt->execute([
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'category' => $category,
        'image' => $image,
    ]);

    


}
<?php

function getDb(): PDO {
    return new PDO(
        'mysql:host=localhost;dbname=amazon;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

function getProducts():  array{
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM product ORDER BY id DESC');
    $stmt->execute();

    $products = $stmt->fetchAll();


    foreach ($products as $p)
    {
       $product = new Product();
       $product->id = $p['id'];
       $product->name = $p['name'];
       $product->description = $p['description'];
       $product->price = $p['price'];

       $products[]= $product;
    }

    return $products;
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
            $user['screen_name'],
            $user['username'],
            $user['password']
        );
    }

    return null;
}





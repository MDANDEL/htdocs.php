<?php

require_once 'class/Tweet.php';
require_once 'class/User.php';

function getDb(): PDO
{
    return new PDO(
        'mysql:host=localhost;dbname=twitter;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}

function getTweets(): array
{
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM tweet WHERE is_deleted = 0');
    $stmt->execute();

    $tweets = $stmt->fetchAll();


    foreach ($tweets as $tweet) {
        $validTweet[] = new Tweet(
            $tweet['message'],
            getUser($tweet['id_user']),
            $tweet['likes'],
            !!$tweet['is_deleted']
        );
    }

    return $validTweet;
}

function getUser(int $id): ?User
{
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM user WHERE id = :id');
    $stmt->execute([
        'id' => $id
    ]);

    $user = $stmt->fetch();

    return new User(
        $user['screen_name'],
        $user['username'],
        $user['password']
    );
}

function authUser (string $username, string $password): ?User {
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $stmt->execute([
        'username' => $username,
        'password' => $password,
    ]);

    $user = $stmt->fetch();

    if ($user) {
        return new User (
            $user['screen_name'],
            $user['username'],
            $user['password']
        );
    }

    return null;
}

function createTweet (string $message, string $username): void {
    $db = getDb();
    $stmt = $db->prepare("
    INSERT INTO tweet (message, likes, is_deleted, id_user)
    VALUES(:message, 0, 0, (SELECT id FROM user WHERE username = :username LIMIT 1));");
    $stmt->execute(['message'=>$message, 'username'=>$username]);
}

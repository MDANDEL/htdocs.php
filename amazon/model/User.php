<?php

class User {
    public int $id;
    public string $email;
    public string $password;
    public string $username;

    public function __construct(
        int $id,
        string $username,
        string $email,
        string $password,
        
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
}
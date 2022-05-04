<?php

Class User {

    public string $screenName;
    public string $username;
    public string $password;

    public function __construct(
        string $screenName,
        string $username,
        string $password
    )
    {
        $this->screenName = $screenName;
        $this->username = $username;
        $this->password = $password;
    }

}

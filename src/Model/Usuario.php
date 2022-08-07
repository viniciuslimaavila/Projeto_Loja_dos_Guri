<?php

namespace APP\Model;

class Usuario
{
    private string $name;
    private string $email;
    private string $password;
    private bool $isActive;

    public function __construct(
        string $name,
        string $email,
        string $password,
        bool $isActive=true
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->isActive = $isActive;
    }
    public function __get($attribute)
    {
        return $this->$attribute;
    }
}



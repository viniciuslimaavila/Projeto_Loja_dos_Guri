<?php

namespace APP\Model;

class Cadastrar
{
    private string $name;
    private string $email;
    private string $password;
    private string $confirmpassword;
    private bool $isActive;

    public function __construct(
        string $name,
        string $email,
        string $password,
        string $confirmpassword,
        bool $isActive=true
    )
    {
        $this-> $name = $name;
        $this-> $email = $email;
        $this-> $password = $password;
        $this-> $confirmpassword = $confirmpassword;
        $this-> $isActive = $isActive;
    }
}



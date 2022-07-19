<?php

namespace APP\Model;

class Validation
{
    public static function validateName($name): bool
    {
        return mb_strlen($name) >4;
    }

    public static function validateEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validatePassword($password): bool
    {
        return $password >8;
    }

    public static function validateConfirmPassword($confirmpassword): bool
    {
        return $confirmpassword >8;
    }
}
?>
<?php
namespace APP\Controller;

use APP\Model\Cadastrar;
use APP\Model\Login;
use APP\Model\Validation;
use APP\Utils\Redirect;

require_once"../../vendor/autoload.php";

if (empty($_POST)){
    Redirect::redirect(
        message:"Requisição inválida!!",
        type :"error"
    );
}

$LoginName=$_POST["name"];
$LoginEmail=$_POST["email"];
$LoginPassword=$_POST["password"];


$error = array();

if(!Validation::validateName($LoginName)){
   array_push($error, "O nome deve conter apenas letras!!");
}

if(!Validation::validateEmail($LoginEmail)){
   array_push($error, "Email inválido!!");
}

if(!Validation::validatePassword($LoginPassword)){
    array_push($error, "Senha inválida!!");
 }


 if($error){
    Redirect::redirect(
        message: $error,
        type:'warning'
    );
 }else{
    $Cadastrar = new Login(
        name: $LoginName,
        email: $LoginEmail,
        password: $LoginPassword,
        
    );
    

    Redirect::redirect(
        message: "Login feito com sucesso!!!"
    );

}
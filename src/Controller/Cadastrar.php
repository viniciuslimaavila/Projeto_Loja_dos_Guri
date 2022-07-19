<?php
namespace APP\Controller;

use APP\Model\Cadastrar;
use APP\Model\Validation;
use APP\Utils\Redirect;

require_once"../../vendor/autoload.php";

if (empty($_POST)){
    Redirect::redirect(
        message:"Requisição inválida!!",
        type :"error"
    );
}

$CadastrarName=$_POST["name"];
$CadastrarEmail=$_POST["email"];
$CadastrarPassword=$_POST["password"];
$CadastrarConfirmpassword=$_POST["confirmpassword"];

$error = array();

if(!Validation::validateName($CadastrarName)){
   array_push($error, "O nome deve conter apenas letras!!");
}

if(!Validation::validateEmail($CadastrarEmail)){
   array_push($error, "O email deve conter @!!");
}

if(!Validation::validatePassword($CadastrarPassword)){
    array_push($error, "A senha deve conter no minimo 8 digitos!!");
 }

 if(!Validation::validateConfirmPassword($CadastrarConfirmpassword)){
    array_push($error, "A senha não é a mesma!!");
 }

 if($error){
    Redirect::redirect(
        message: $error,
        type:'warning'
    );
 }else{
    $Cadastrar = new Cadastrar(
        name: $cadastrarName,
        email: $cadastrarEmail,
        password: $cadastrarPassword,
        confirmpassword: $cadastrarConfirmpassword
    );
    

    Redirect::redirect(
        message: "Usúario cadastrado com sucesso!!!"
    );

}
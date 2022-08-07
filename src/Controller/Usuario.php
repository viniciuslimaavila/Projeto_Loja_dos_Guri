<?php

namespace APP\Controller;

use APP\Model\Usuario;
use APP\Model\Validation;
use APP\Utils\Redirect;
use APP\Model\DAO\UsuarioDAO;

require_once "../../vendor/autoload.php";

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi informada!!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'inserir':
        inserirUsuario();
        break;
    case 'list':
        removeUsuario();
        break;
    default:
        Redirect::redirect(message: 'Operação inválida!!!', type: 'error');
}

function inserirUsuario()
{
    if (empty($_POST)) {
        Redirect::redirect(
            message: "Requisição inválida!!",
            type: "error"
        );
    }

    $usuarioName = $_POST["name"];
    $usuarioEmail = $_POST["email"];
    $usuarioPassword = $_POST["password"];


    $error = array();

    if (!Validation::validateName($usuarioName)) {
        array_push($error, "O nome deve conter apenas letras!!");
    }

    if (!Validation::validateEmail($usuarioEmail)) {
        array_push($error, "O email deve conter @!!");
    }

    if (!Validation::validatePassword($usuarioPassword)) {
        array_push($error, "A senha deve conter no minimo 8 digitos!!");
    }



    if ($error) {
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $usuario = new Usuario(
            name: $usuarioName,
            email: $usuarioEmail,
            password: $usuarioPassword
        );

        $dao = new UsuarioDAO();
        $result = $dao->insert($usuario);
        if($result){
            Redirect::redirect(
                message: "Usúario cadastrado com sucesso!!!"
            );
        }else{
            Redirect::redirect(
                message: "Não foi possível cadastrar o usuário!!!",
                type:'error'
            );
        }
    }
}

function removeUsuario()
{
    if (empty($_GET['code'])) {
        Redirect::redirect(message: 'Nenhum código de produto foi encontrado!', type: 'error');
    }

    if (!Validation::validateNumber($_GET['code'])) {
        Redirect::redirect(message: 'O código do produto é inválido!!!', type: 'error');
    }

    $dao = new UsuarioDAO();
    $result = $dao->delete($_GET['code']);

    if ($result) {
        Redirect::redirect(message: 'Produto removido com sucesso!!!');
    } else {
        Redirect::redirect(message: 'Não foi possível remover o produto!!!');
    }
}

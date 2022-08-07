<?php
namespace APP\MODEL\DAO;

use APP\MODEL\Connection;
use APP\MODEL\Usuario;
use PDO;


class UsuarioDAO{
    public function insert(Usuario $usuario)
{

    $connection = Connection::getConnection();
    $stmt = $connection->prepare("INSERT INTO usuario VALUES(null,?,?,?)");
    $stmt->bindParam(1, $usuario->name);
    $stmt->bindParam(2, $usuario->email);
    $stmt->bindParam(3, $usuario->password);
    return $stmt->execute();
}

public function findAll():array
{
    $connection = Connection::getConnection();
    $stmt = $connection->query('select * from usuario');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function delete($id): bool
{
    $connection = Connection::getConnection();
    $stmt = $connection->prepare('delete from usuario where usuario_code = ?');
    $stmt->bindParam(1, $id);
    return $stmt->execute();
}

}
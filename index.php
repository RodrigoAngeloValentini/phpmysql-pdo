<?php

require_once "Cliente.php";

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}catch(\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados ");
}

$cliente = new Cliente($conexao);

//$cliente->setNome("Rodrigo")
//        ->setEmail("rodrigo@rodrigo.com.br")
//;

//$cliente->setId(1)
//    ->setNome("Rodrigo Angelo")
//    ->setEmail("rodrigo@rodrigo.com.br")
//;

$resultado = $cliente->find(2);

echo $resultado['nome'];

//foreach($cliente->listar("id desc") as $c) {
//    echo $c['nome'] . '<br>';
//}
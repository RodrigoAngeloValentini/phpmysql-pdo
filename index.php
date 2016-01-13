<?php

require_once "EntidadeInterface.php";
require_once "Cliente.php";
require_once "ServiceDb.php";

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");
}catch(\PDOException $e){
    die("Não foi possível estabelecer a conexão com o banco de dados ");
}

//$cliente = new Cliente($conexao);

//$cliente->setNome("Rodrigo")
//        ->setEmail("rodrigo@rodrigo.com.br")
//;

//$cliente->setId(1)
//    ->setNome("Rodrigo Angelo")
//    ->setEmail("rodrigo@rodrigo.com.br")
//;

//$resultado = $cliente->find(2);
//
//echo $resultado['nome'];

//foreach($cliente->listar("id desc") as $c) {
//    echo $c['nome'] . '<br>';
//}

$cliente = new Cliente();

$cliente->setNome("Rodrigo Angelo")
    ->setEmail("rodrigo@rodrigo.com.br")
;

$serviceDb = new ServiceDb($conexao, $cliente);

foreach($serviceDb->listar("id desc") as $c) {
    echo $c['nome'] . '<br>';
}


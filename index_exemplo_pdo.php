<?php

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo","root","root");

//  $query = "insert into clientes(nome, email) values ('rodrigo','rodrigo@desbravador.com.br')";
//  $resultado = $conexao->exec($query);

//  $query = "Select * from clientes";
//  $stmt = $conexao->query($query);
//  $resultado = $stmt->fetchAll(\PDO::FETCH_CLASS);
//  foreach($resultado as $cliente){
//    echo $cliente->nome."<br>";
//  }

//  $query = "Select * from clientes";
//  $stmt = $conexao->query($query);
//  $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
//
//  echo '<pre>';
//  print_r($resultado);

//  foreach($conexao->query($query) as $cliente){
//    echo $cliente['nome']."<br>";
//  }

    $query = "Select * from clientes where id=:id";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $resultado= $stmt->execute();

    print_r($stmt->fetchAll());



}catch(\PDOException $e){
    echo "Não foi possível estabelecer a conexão com o banco de dados ";
    echo "Erro código: ".$e->getCode().": ".$e->getMessage();
}



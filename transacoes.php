<?php

//conexão
include "conexao.php";
$pdo = conectar();

//Inicio da transação
$pdo->beginTransaction();

//Cadastro dos dados
$dados = $pdo->query("INSERT INTO dados(status) VALUES ('1')");

if(!$dados){
    die("Houve um erro no cadastro de dados!");
}

//Cadastro final
$cadastro = $pdo->query("INSERT INTO usuarios(nome, email, status) VALUES ('Josival da Silva', 'JavaeLento@gmail.com','1')");

if(!$cadastro){
    $pdo->rollBack();//Rollback cancela todas as querys anteriores, sempre deve colocar nas condiçoes seguintes
    die("Erro no cadastro final dos dados!");
}

//Confirmação da transação
$pdo->commit();
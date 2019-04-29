<?php

include("conexao.php");

$pdo = conectar();//Gera a conexao com o bd

$nome = "Biririu Silva";//Variavel com os valores
$email = "JavaeMeuOvo@gmail.com";//Variavel com os valores

//Prepara o cadastro
$insert = $pdo->prepare("INSERT INTO usuarios(nome,email)VALUES(:nome,:email)");//Query sendo preparada
$insert->bindValue(":nome",$nome);//Seta o parametro acima com a variavel, PARAM_tipoPrimitivo para receber o valor correto
$insert->bindValue(":email",$email);//Seta o parametro acima com a variavel, PARAM_tipoPrimitivo para receber o valor correto

//Valida o cadastro
$validar = $pdo->prepare("SELECT *FROM usuarios WHERE email=?");
$validar->execute(array($email));//Array serve para poder entrar na interrogação

if ($validar->rowCount() == 0){//0 e para saber se existe
    $insert->execute();//Executa a query
}else{
    echo "Usuario com o email $email já existe, tente outro email.";
}
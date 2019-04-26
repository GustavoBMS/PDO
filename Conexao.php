<?php

try{
    //Executando conexao, se nao conectar ele vai pro catch
    $pdo = new PDO("mysql:host=localhost;dbname=pdoyt;","root","");
    echo "Conexão efetuada com sucesso\n";
}catch (PDOException $e){//$e salva o erro na variavel
    echo $e->getMessage()."<br>";//mostra mensagem de erro
    echo $e->getCode()."<br>";//mostra codigo do erro
    echo $e->getFile()."<br>";//mostra o arquivo do erro
    echo $e->getLine()."<br>";//mostra a linha do erro
}

/*
$insert=$pdo->query("SELECT * FROM usuarios WHERE idusuarios = 1");
A query acima não é recomendada para ser utilizada, pois nao e segura
*/

//Insert \/

$nome = "Gustavo Brito";//Variavel com os valores
$email = "JavaeMeuOvo@gmail.com";//Variavel com os valores

//Prepara o cadastro
$insert = $pdo->prepare("INSERT INTO usuarios(nome,email)VALUES(:nome,:email)");//Query sendo preparada
$insert->bindValue(":nome",$nome);//Seta o parametro acima com a variavel
$insert->bindValue(":email",$email);//Seta o parametro acima com a variavel

//Valida o cadastro
$validar = $pdo->prepare("SELECT *FROM usuarios WHERE email=?");
$validar->execute(array($email));//Array serve para poder entrar na interrogação

if ($validar->rowCount() == 0){//0 e para saber se existe
    $insert->execute();//Executa a query
}else{
    echo "Usuario com o email:$email já existe, tente outro.";
}
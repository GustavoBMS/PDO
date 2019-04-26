<?php

try{
    //Executando conexao, se nao conectar ele vai pro catch
    $pdo = new PDO("mysql:host=localhost;dbname=pdoyt;","root","");
    echo "Conexão efetuada com sucesso";
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

$insert = $pdo->prepare("INSERT INTO usuarios(nome,email)VALUES(:nome,:email)");//Query sendo preparada
$insert->bindValue(":nome",$nome);//Seta o parametro com a variavel acima
$insert->bindValue(":email",$email);//Seta o parametro com a variavel acima
$insert->execute();//Executa a query

echo $insert->rowCount();//Conta as linhas alteradas
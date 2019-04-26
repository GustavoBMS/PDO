<?php

try{
    //Executando conexao, se nao conectar ele vai pro catch
    $pdo = new PDO("mysql:host=localhostt;dbname=pdoyt;","root","");
    echo "Conexão efetuada com sucesso";
}catch (PDOException $e){//$e salva o erro na variavel
    echo $e->getMessage()."<br>";//mostra mensagem de erro
    echo $e->getCode()."<br>";//mostra codigo do erro
    echo $e->getFile()."<br>";//mostra o arquivo do erro
    echo $e->getLine()."<br>";//mostra a linha do erro
}

<?php

function conectar()
{
    try {
        //Executando conexao, se nao conectar ele vai pro catch
        $pdo = new PDO("mysql:host=localhost;dbname=pdoyt;", "root", "");
        echo "Conexão efetuada com sucesso.\n\n";
    } catch (PDOException $e) {//$e salva o erro na variavel
        echo $e->getMessage() . "<br>";//mostra mensagem de erro
        echo $e->getCode() . "<br>";//mostra codigo do erro
        echo $e->getFile() . "<br>";//mostra o arquivo do erro
        echo $e->getLine() . "<br>";//mostra a linha do erro
    }
    return $pdo;
}

/*
$insert=$pdo->query("SELECT * FROM usuarios WHERE idusuarios = 1");
A query acima não é recomendada para ser utilizada, pois nao e segura
*/
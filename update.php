<?php

//Conexão
include "conexao.php";
$pdo=conectar();

    //Recebendo dados
    $nome= "Jacinto Pereira";
    $email= "JavaeMeuSaco@gmail.com";
    $id= 2;

    //Realizando consulta
    $updateUsuario=$pdo->prepare("UPDATE usuarios SET nome=:nome, email=:email WHERE idusuarios=:id");//Lembre-se, sempre que criar uma variavel relacionada a coneaxao, SEMPRE ligar a mesma com a variavel de conexao
    $updateUsuario->bindValue(":nome",$nome);
    $updateUsuario->bindValue(":email",$email);
    $updateUsuario->bindValue(":id",$id);
    $updateUsuario->execute();

    //Feedback se houve atualização
    if($updateUsuario->rowCount() > 0){
        echo "Usuario atualizado com sucesso.";
    }else{
        echo "Usuario nao atualizado.";
    }
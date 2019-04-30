<?php

//Conexão
include "conexao.php";
$pdo=conectar();

if(empty($id)){

//Recebendo dados
    $id = 2;

//Realizando consulta
    $deleteUsuario=$pdo->prepare("DELETE FROM usuarios WHERE idusuarios=?");//Lembre-se, sempre que criar uma variavel relacionada a coneaxao, SEMPRE ligar a mesma com a variavel de conexao
    $deleteUsuario->bindValue(1,$id);
    $deleteUsuario->execute();

//Feedback se houve atualização
    if($deleteUsuario->rowCount() > 0){
        echo "Usuario deletado com sucesso.";
    }else{
        echo "Delete não completado.";
    }

}else{
    echo "Você não colocou os dados necessarios para efetuar o delete.";
}
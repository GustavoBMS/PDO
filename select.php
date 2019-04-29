<?php

/*
 * fetchAll retorna um array associativo com os dados desejados da tabela
 * fetch retorna todos os dados
 * FETCH_ASSOC retorna os valores em um array associativo
 * No fetch voce coloca como o valor sera retornado, como objeto, array...
 * quando usar o where, utilizar o bindValue
 */

include "conexao.php";

$pdo = conectar();

$buscarUsuario = $pdo->prepare("SELECT * FROM usuarios");
$buscarUsuario->execute();

$linha = $buscarUsuario->fetchAll(PDO::FETCH_ASSOC);

//Se for utilizado FETCH_ASSOC, utilizar esse tipo de query \/
foreach ($linha as $listar) {
    echo "Email:".$listar['email']."\n";
}

/*
//Se for FETCH_OBJ, utilizar esse tipo de query

foreach ($linha as $listar) {
    echo "Email:".$listar->valorDesejado."\n";
}
*/
<?php

require_once '../functions.php';
require_once '../config.php';
require_once '../conexao.php';
require_once '../database.php';
require_once '../validador.php';

$cpf = addslashes($_GET['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);


$sql = dbDelete("aluno", "cpf = '$cpf'");

if ($sql[0]) {
    flash("mensagem", "registro apagado com sucesso!", "success", "check-circle");
    header("location: ../../aluno_consultar.php");
}
else {
    printf("Erro ao tentar executar a query: (%d) %s", $sql[1], $sql[2]);
}

?>





?>
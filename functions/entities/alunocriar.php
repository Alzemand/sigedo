<?php

require_once '../functions.php';
require_once '../config.php';
require_once '../conexao.php';
require_once '../database.php';
require_once '../validador.php';


$cpf = addslashes($_POST['cpf']);
$cpf = preg_replace("/[^0-9]/", "", $cpf);
$rg = addslashes($_POST['rg']);
$nome = addslashes($_POST['nome']);
$nome = formataCampo($nome);
$periodo = addslashes($_POST['periodo']);
$curso = addslashes($_POST['curso']);
$estado_civil = addslashes($_POST['estado_civil']);
$data_nascimento = addslashes($_POST['data_nascimento']);
$email = addslashes($_POST['email']);
$endereco = addslashes($_POST['endereco']);
$telefone = addslashes($_POST['telefone']);
$matricula = addslashes($_POST['matricula']);

$dados = [

    'cpf' => $cpf,
    'identidade' => $rg,
    'matricula' => $matricula,
    'nome' => $nome,
    'civil' => $estado_civil,
    'data_nascimento' => $data_nascimento,
    'curso' => $curso,
    'periodo' => $periodo,
    'endereco' => $endereco,
    'email' => $email,
    'telefone' => $telefone,
    'is_active' => 1

];

if (validaCPF($cpf) == true) {
    $sql = dbCreate("aluno", $dados);
    if ($sql[0]) {
        flash("mensagem", "O Aluno: " . $nome . " foi cadastrado com sucesso!", "success", "check-circle");
        header("location: ../../aluno_cadastrar.php");
    }elseif ($sql[1] == 1062) {
        flash("mensagem", "O CPF:" . mask($cpf, '###.###.###-##') . " Já está cadastrado no sistema.", "danger", "exclamation-octagon");
        $_SESSION['aluno'] = $dados;
        header("location: ../../aluno_cadastrar.php?");
    }
    else {
        printf("Erro ao tentar executar a query: (%d) %s", $sql[1], $sql[2]);
    }
} 
else {
    header("location: ../entities/aluno/aluno_cadastrar.php?get_cpf=erro");
}

?>

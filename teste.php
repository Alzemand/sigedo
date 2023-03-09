<?php

require_once 'functions/functions.php';



$cpf = '14923271744';
$rg = '2112221';
$nome = 'edilson';
$periodo = '1';
$curso = 'SI';
$estado_civil = 'solteiro';
$data_nascimento = '1995-01-16';
$email = 'alzemand@Outlook.com';
$endereco = 'rua';
$telefone = '229922';
$matricula = 'ola';

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

$_SESSION['aluno'] = $dados;

$aluno = $_SESSION['aluno'];
unset($_SESSION['aluno']);

echo ($aluno['cpf']);
echo ($aluno[1]);
echo ($aluno[2]);
echo ($aluno[3]);
echo ($aluno[4]);
echo ($aluno[5]);
echo ($aluno[6]);
echo ($aluno[7]);
echo ($aluno[8]);
echo ($aluno[9]);
echo ($aluno[10]);
echo ($aluno[11]);

?>
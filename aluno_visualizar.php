<!DOCTYPE html>
<html lang="pt-br">

<?php

require_once 'functions/functions.php';
require_once 'functions/validador.php';
require_once 'functions/database.php';

$title = 'Detalhes do Aluno';
include('head.php');

echo ('<body>');

include('header.php');


$aluno = dbRead("aluno", "WHERE cpf = '" . addslashes($_GET['cpf']). "'");

?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed show" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Aluno</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapsed show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="aluno_cadastrar.php" >
              <i class="bi bi-circle"></i><span>Cadastro</span>
            </a>
          </li>
          <li>
            <a href="aluno_consultar.php" class="active">
              <i class="bi bi-circle"></i><span>Consultar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Detalhes aluno</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Aluno</li>
          <li class="breadcrumb-item active">Consultar (detalhes)</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section">
      <div class="row">

        <div class="col-lg-2"></div>

        <div class="col-lg-8" style="margin-bottom: 100px;">

        <div class="card">
            <div class="card-body">
              <div class="text-center"><h1 style="padding: 0px; margin-top: 20px; color: #012970;"><i class="bi bi-person-lines-fill"></i></h1></div>
              <div class="text-center"><h5 class="card-title" style="padding: 0px; margin-bottom: 20px;">Detalhes do aluno</h5></div>

              

              <!-- Floating Labels Form -->
              <form id="aluno_form" method="POST" action="functions/entities/alunocriar.php" class="row g-3 needs-validation" novalidate style="padding: 20px">
                <div class="col-md-12">
                  <h6>Nome</h6>
                  <h4><?=$aluno[0]['nome']?></h4>
                </div>
                <div class="col-md-6">
                  <h6>CPF</h6>
                  <h4><?=$aluno[0]['cpf']?></h4>
                </div>
                <div class="col-md-6">
                  <h6>Identidade</h6>
                  <h4><?=$aluno[0]['identidade']?></h4>
                </div>
                <div class="col-md-6">
                  <h6>Periodo</h6>
                  <h4><?=$aluno[0]['periodo']?></h4>
                </div>
                <div class="col-md-6">
                <h6>Curso</h6>
                <h4><?=$aluno[0]['curso']?></h4>
                </div>
                <div class="col-md-6">
                  <h6>Estado civil</h6>
                  <h4><?=$aluno[0]['civil']?></h4>
                </div>
                <div class="col-md-6">
                <h6>Data nascimento</h6>
                <h4><?=dateExport($aluno[0]['data_nascimento'])?></h4>
                </div>
                <div class="col-md-12">
                  <h6>e-mail</h6>
                  <h4><?=$aluno[0]['email']?></h4>
                </div>
                <div class="col-12">
                <h6>Endereço</h6>
                <h4><?=$aluno[0]['endereco']?></h4>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div>
                      <h6>Telefone</h6>
                      <h4><?=$aluno[0]['telefone']?></h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div>
                    <h6>Matricula</h6>
                    <h4><?=$aluno[0]['matricula']?></h4>
                    </div>
                  </div>
                </div>
                <div class="text-right">
                  <a class="btn btn-secondary" href="aluno_consultar.php" role="button">Voltar</a>
                  <a class="btn btn-danger" href="#" onclick="excluirAluno(<?=$aluno[0]['cpf']?>)"  role="button">Apagar</a>
                  <a class="btn btn-primary" href="aluno_editar.php?cpf=<?=$aluno[0]['cpf']?>" role="button">Editar</a>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>

        <div class="col-lg-2">
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
  include('footer.php');
?>

<?=getFlash('mensagem');?>

</body>

</html>
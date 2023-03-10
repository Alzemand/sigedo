<!DOCTYPE html>
<html lang="pt-br">

<?php

require_once 'functions/functions.php';
require_once 'functions/validador.php';
require_once 'functions/database.php';

$cont = 1;
$title = 'Consultar Aluno';
include('head.php');

echo ('<body>');

include('header.php');

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
            <a href="aluno_cadastrar.php">
              <i class="bi bi-circle"></i><span>Cadastro</span>
            </a>
          </li>
          <li>
            <a href="aluno.consultar" class="active">
              <i class="bi bi-circle"></i><span>Consultar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Consultar alunos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Aluno</li>
          <li class="breadcrumb-item active">Consultar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="col">
    <div class="row">
      <div class="col-md-2 col-lg-2">
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="box">
          <form method="POST" action="aluno_consultar.php">
            <div class="row">
              <div class="col-sm-10 col-md-10 col-lg-10">
                <input type="text" name="pesquisa" class="form-control" placeholder="Digite aqui para pesquisar alunos">
              </div>
              <div class="col-sm-2 col-lg-2 col-md-2" align="center">
                <button type="submit" class="btn btn-primary left">Pesquisar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2 col-lg-2">
      </div>
    </div>
  </div>
    
    <section class="section">
      <br><br>
    <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabela de informações</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Ações</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php $alunos = dbRead("aluno", "WHERE nome LIKE '%".$_POST['pesquisa']."%'");
                  if($alunos):
                  foreach ($alunos as $aluno):
                  ?>
                  <tr>
                    <td scope="row"><?=$cont?></td>
                    <td><?=$aluno['nome']?></td>
                    <td><?=mask($aluno['cpf'] , '###.###.###-##')?></td>
                    <td><?=$aluno['email']?></td>
                    <td><?=$aluno['matricula']?></td>
                    <td><?=$aluno['curso']?></td>
                    <td>
                    <a class="btn btn-primary" href="" role="button" ><i class="bi bi-search" title="Visualizar informações completas" aria-hidden="true"></i></a>
                      <a class="btn btn-primary" href="" role="button"><i class="bi bi-pencil" title="Editar dados" aria-hidden="true"></i></a>
                      <a class="btn btn-danger" href="#" onclick="" role="button"><i class="bi bi-trash" title="Apagar" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  <?php $cont++; ?>
                  <?php endforeach; ?>
              <?php else: ?>
              <tr>
                  <td colspan="5" class="text-center">Nenhum registro encontrado</td>
              </tr>
              <?php endif; ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
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
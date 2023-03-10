<!DOCTYPE html>
<html lang="pt-br">

<?php

require_once 'functions/functions.php';
require_once 'functions/validador.php';

$aluno = $_SESSION['aluno'];
unset($_SESSION['aluno']);

$title = 'Cadastrar Aluno';
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
            <a href="aluno_cadastrar.php" class="active">
              <i class="bi bi-circle"></i><span>Cadastro</span>
            </a>
          </li>
          <li>
            <a href="aluno_consultar.php">
              <i class="bi bi-circle"></i><span>Consultar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cadastrar aluno</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Aluno</li>
          <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section">
      <div class="row">

        <div class="col-lg-2"></div>

        <div class="col-lg-8" style="margin-bottom: 100px;">

        <div class="card">
            <div class="card-body">
              <div class="text-center"><h1 style="padding: 0px; margin-top: 20px; color: #012970;"><i class="bi bi-person-fill-add"></i></h1></div>
              <div class="text-center"><h5 class="card-title" style="padding: 0px; margin-bottom: 20px;">Cadastrar aluno</h5></div>

              

              <!-- Floating Labels Form -->
              <form id="aluno_form" method="POST" action="functions/entities/alunocriar.php" class="row g-3 needs-validation" novalidate>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="nome" value="<?=$aluno['nome']?>" type="text" class="form-control" id="nome" placeholder="Nome" required>
                    <div class="valid-feedback">
                      Campo preenchido.
                    </div>
                    <div class="invalid-feedback">
                      Preencha um nome válido.
                    </div>
                    <label for="nome">Nome</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input name="cpf" value="<?=$aluno['cpf']?>" type="text" class="form-control" id="cpf" placeholder="CPF" required>
                    
                    <div class="valid-feedback">
                      Campo preenchido.
                    </div>
                    <div class="invalid-feedback">
                      CPF inválido.
                    </div>
                    <label for="cpf">CPF</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input name="rg" value="<?=$aluno['identidade']?>" type="text" class="form-control" placeholder="Identidade">
                    <label for="identidade">Identidade</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input name="periodo" value="<?=$aluno['periodo']?>" type="number" class="form-control"  placeholder="Periodo" required>
                    <label for="periodo">Periodo</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input name="curso" value="<?=$aluno['curso']?>" type="text" class="form-control" placeholder="Curso" required>
                    <label for="curso">Curso</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select name="estado_civil" class="form-select" id="floatingSelect" aria-label="Estado civil">
                      <option selected="<?=$aluno['civil']?>"><?=empty($aluno['civil']) ? 'Selecione' : $aluno['civil'];?></option>
                      <option value="solteiro">Solteiro</option>
                      <option value="casado">Casado</option>
                      <option value="viuvo">Viúvo</option>
                    </select>
                    <label for="estado_civil">Estado civil</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input name="data_nascimento" value="<?=$aluno['data_nascimento']?>" type="date" class="form-control" id="date" placeholder="Data nascimento">
                    <label for="data_nascimento">Data nascimento</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="email" value="<?=$aluno['email']?>" type="email" class="form-control" id="email" placeholder="Email" required>
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea name="endereco" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"><?=$aluno['endereco']?></textarea>
                    <label for="endereco">Endereço</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input name="telefone" value="<?=$aluno['telefone']?>" type="text" class="form-control" id="telefone" placeholder="Telefone">
                      <label for="telefone">Telefone</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input name="matricula" value="<?=$aluno['matricula']?>" type="text" class="form-control" id="matricula" placeholder="Matrícula">
                      <label for="matricula">Matrícula</label>
                    </div>
                  </div>
                </div>
                <div class="text-right">
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                  <a href="index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                  <button type="submit" class="btn btn-primary">Enviar</button>
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
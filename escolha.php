<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    try {
      // Consulta num itens da tabela
      $query = "SELECT COUNT(sim) AS sim FROM opcao";
      
      // Executa a consulta
      foreach ($conexao->query($query) as $key => $value){

        $sim = $value['sim'];
      }
        } catch(PDOException $e) {
            // Erro
            echo "Erro: " . $e->getMessage();
        }
  try {
    // Consulta num de itens na tabela
    $query = "SELECT COUNT(nao) AS nao FROM opcao";
    
    // Executa a consulta
    foreach ($conexao->query($query) as $key => $value){

      $nao = $value['nao'];
    }
      } catch(PDOException $e) {
          // Erro
          echo "Erro: " . $e->getMessage();
      }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="img2_tcc.png">
<script src="https://cdn.tailwindcss.com"></script>    
<title>Controle</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="(https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap%27);" />
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
<style>
@import url(https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap%27); 
        body{
            font-family: Montserrat;
        }  

</style>
</head>
  <body class="h-full w-fyll #f8ac79 bg-gray-100 place-itens-center text-black">
    <div class="row justify-content-center">
      <div class="col-lg-7 position-relative z-index-2">
        <div class="card card-plain mb-4">
          <div class="card-body p-3">
            <div class="row mt-48 text-xl">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
      <h2 class="bb-0 text-black mb-0 text-3xl">Controle Merenda</h2>
    </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row font-bold">
      <div class="col-lg-5 col-sm-5">
        <div class="card mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">done</i>
    </div>
    <div class="text-end pt-1 text-6xl">
      <p class="text-xl bb-0 text-capitalize font-bold">Merendarão</p>
      <!--  COUNT bd escolha sim-->
      <div class="">
        <?php print_r($sim)?>
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
        <div class="card mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">close</i>
    </div>
    <div class="text-end pt-1 text-6xl">
      <p class="text-xl mb-0 text-capitalize font-bold">Não merendarão</p>
            <!-- COUNT bd escolha nao-->
            <div class="">
              <?php print_r($nao)?>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div> 
       </main>
  </body>

</html>

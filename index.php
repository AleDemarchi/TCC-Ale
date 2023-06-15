<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);

    if (isset($_GET["merenda"])) {
      $merenda = $_GET["merenda"];
      $turno = $_GET["turno"];
  
      if ($merenda == "sim" || $merenda == "nao") {
          $query = "INSERT INTO pedidos (merenda, turno) VALUES ('$merenda', '$turno')";
          $conexao->query($query);
      }
  }
  
  $tableName = "pedidos";
  $columnName = "merenda";
  $manha = "manhã";
  $tarde = "tarde";
  $noite = "noite";
  
  // Consulta SQL para contar o número de registros com valor "sim" no turno da manhã
  $querySimManha = "SELECT COUNT(*) AS count_sim_manha FROM $tableName WHERE $columnName = 'sim' AND turno = '$manha'";
  $resultSimManha = $conexao->query($querySimManha);
  $countSimManha = $resultSimManha->fetch_assoc()['count_sim_manha'];
  
  // Consulta SQL para contar o número de registros com valor "sim" no turno da tarde
  $querySimTarde = "SELECT COUNT(*) AS count_sim_tarde FROM $tableName WHERE $columnName = 'sim' AND turno = '$tarde'";
  $resultSimTarde = $conexao->query($querySimTarde);
  $countSimTarde = $resultSimTarde->fetch_assoc()['count_sim_tarde'];
  
  // Consulta SQL para contar o número de registros com valor "sim" no turno da noite
  $querySimNoite = "SELECT COUNT(*) AS count_sim_noite FROM $tableName WHERE $columnName = 'sim' AND turno = '$noite'";
  $resultSimNoite = $conexao->query($querySimNoite);
  $countSimNoite = $resultSimNoite->fetch_assoc()['count_sim_noite'];
  
  // Consulta SQL para contar o número de registros com valor "não" no turno da manhã
  $queryNaoManha = "SELECT COUNT(*) AS count_nao_manha FROM $tableName WHERE $columnName = 'não' AND turno = '$manha'";
  $resultNaoManha = $conexao->query($queryNaoManha);
  $countNaoManha = $resultNaoManha->fetch_assoc()['count_nao_manha'];
  
  // Consulta SQL para contar o número de registros com valor "não" no turno da tarde
  $queryNaoTarde = "SELECT COUNT(*) AS count_nao_tarde FROM $tableName WHERE $columnName = 'não' AND turno = '$tarde'";
  $resultNaoTarde = $conexao->query($queryNaoTarde);
  $countNaoTarde = $resultNaoTarde->fetch_assoc()['count_nao_tarde'];
  
  // Consulta SQL para contar o número de registros com valor "não" no turno da noite
  $queryNaoNoite = "SELECT COUNT(*) AS count_nao_noite FROM $tableName WHERE $columnName = 'não' AND turno = '$noite'";
  $resultNaoNoite = $conexao->query($queryNaoNoite);
  $countNaoNoite = $resultNaoNoite->fetch_assoc()['count_nao_noite'];
  
    $conexao->close();
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
  <form action="logout.php" method="POST">
    <input type="submit" name="logout" value="Sair">
  </form>    
  <div class="row justify-content-center">
      <div class="col-lg-7 position-relative z-index-2 pb-100">
        <div class="card card-plain mb-4 h-32 pt-sm-0">
            <div class="row mt-48 text-xl">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100 mb-32">
                  <h2 class="bb-0 text-black mb-0 text-3xl">Controle Merenda</h2>
                </div>
              </div>
          </div>
        </div>
        <div class="card card-plain mb-4 pt-sm-0">
          <div class="card-body p-3 pb-4">
            <div class="row mt-48 text-xl">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <h2 class="bb-0 text-black mb-0 text-3xl">Controle Manha</h2>
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
                <?php echo $countSimManha;?>
                </div>
            </div>
          </div>
      </div>
    </div>
<div class="col-lg-5 col-sm-5 mt-sm-0 mt-4 ml-20">
  <div class="card mb-2">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">close</i>
        </div>
        <div class="text-end pt-1 text-6xl">
              <p class="text-xl bb-0 text-capitalize font-bold">Não Merendarão</p>
                <!--  COUNT bd escolha sim-->
                <div class="">
                <?php echo $countNaoManha;?>
                </div>
            </div>
      </div>
  </div>
</div>
<div class="card card-plain mb-4">
          <div class="card-body p-3">
            <div class="row mt-48 text-xl">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <h2 class="bb-0 text-black mb-0 text-3xl">Controle Tarde</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                <?php echo $countSimTarde;?>
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-5 col-sm-5 ml-20">
    <div class="card mb-2">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">close</i>
        </div>
            <div class="text-end pt-1 text-6xl">
              <p class="text-xl bb-0 text-capitalize font-bold">Não Merendarão</p>
                <!--  COUNT bd escolha sim-->
                <div class="">
                <?php echo $countNaoTarde;?>
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="card card-plain mb-4">
          <div class="card-body p-3">
            <div class="row mt-48 text-xl">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <h2 class="bb-0 text-black mb-0 text-3xl">Controle Noite</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
    <div class="col-lg-5 col-sm-5 pb-32">
      <div class="card mb-2">
        <div class="card-header p-3 pt-2 bg-transparent">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success shadow text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">done</i>
          </div>
        <div class="text-end pt-1 text-6xl">
          <p class="text-xl mb-0 text-capitalize font-bold">Merendarão</p>
                <!-- COUNT bd escolha nao-->
                <div class="">
                  <?php echo $countSimNoite;?>
                </div>
        </div>
      </div>
  </div>
</div>
<div class="col-lg-5 col-sm-5 mt-sm-0 mt-4 ml-20">
  <div class="card mb-2">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">close</i>
        </div>
        <div class="text-end pt-1 text-6xl ml-32">
              <p class="text-xl bb-0 text-capitalize font-bold">Não Merendarão</p>
                <!--  COUNT bd escolha sim-->
                <div class="">
                <?php echo $countNaoNoite;?>
                </div>
            </div>
      </div>
  </div>
</div>
</div>

</main>
</body>
</html>

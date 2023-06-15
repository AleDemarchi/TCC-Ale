<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if ((!isset($_SESSION['nome'])) && (!isset($_SESSION['senha'])) && (!isset($_SESSION['cpf']))) {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        unset($_SESSION['cpf']);
        header('Location: login.html');
        exit;
    }
    
    $logado = $_SESSION['nome'];
    
    // Verifica a conexão com o banco de dados
    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }
    
    if (isset($_GET["merenda"])) {
        $merenda = $_GET["merenda"];
        if ($merenda == "sim") {
            $query = "INSERT INTO pedidos (merenda) VALUES ('sim')";
            $conexao->query($query);
        } elseif ($merenda == "nao") {
            $query = "INSERT INTO pedidos (merenda) VALUES ('nao')";
            $conexao->query($query);
        }
    }
    
    $conexao->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> SISTEMA </title>
    <link rel="stylesheet" type="text/css" href="style.css">

 
</head>
<body>
<form action="logout.php" method="POST">
    <input type="submit" name="logout" value="Sair">
  </form>    
<div class="logado w-full text-center mx-auto mt-32 pb-48"> 
    <?php
        echo "<b>Obrigada pela contribuição $logado!</b>";
    ?> 

</div>

</body>
</html>
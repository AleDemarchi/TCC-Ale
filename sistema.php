<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: login.html');
    }

    $logado = $_SESSION['nome'];

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> SISTEMA </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap%27); 
        body{
            font-family: Montserrat;
        }
    </style>
 
</head>
<body class="bg-gradient-to-r from-orange-300 via-orange-400 to-orange-500">

<div class="logado w-full text-center mx-auto mt-48 pb-32"> 
    <?php
        echo "<b>Vai merendar $logado ?</b>";
    ?> 

</div>


    <div class="sistema bg-white px-6 py-4 my-3 w-72 mx-auto shadow rounded-md flex items-center shadow-[0px_10px_40px_#993d03]">
    <div class="w-full text-center mx-auto">
        <a href="last.php?merenda=sim">
        <button
          type="button"
          class="bg-orange-400 font-black border-orange text-black rounded-full px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-white focus:outline-none focus:shadow-outline">
          Sim
        </button>
        </a>
        <a href="last.php?merenda=nao">
        <button
          type="button"
          class=" bg-orange-400 font-black border-orange text-black rounded-full px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-white focus:outline-none focus:shadow-outline">
          Não
        </button>
      </a>
      </div>
</div>
</body>
</html>
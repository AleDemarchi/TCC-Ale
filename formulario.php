<?php
include_once('config.php');

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $tipo = $_POST['tipo'];
    $turno = $_POST['turno'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados
    $conexao = new mysqli('localhost', 'root', '', 'formulario');

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Preparar a consulta SQL para verificar se o CPF já existe
    $consulta = $conexao->prepare("SELECT COUNT(*) FROM usuarios WHERE cpf = ?");
    $consulta->bind_param("s", $cpf);
    $consulta->execute();

    // Obter o resultado da consulta
    $resultado = $consulta->get_result()->fetch_row();

    // Verificar se o CPF já existe
    if ($resultado[0] > 0) {
       echo "CPF já cadastrado";
    } else {
        // Preparar a consulta SQL para inserir o novo usuário
        $inserir = $conexao->prepare("INSERT INTO usuarios (nome, cpf, tipo, turno, senha) VALUES (?, ?, ?, ?, ?)");
        $inserir->bind_param("sssss", $nome, $cpf, $tipo, $turno, $senha);
        
        // Executar a consulta de inserção
        if ($inserir->execute()) {
            echo "Usuário cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar usuário: " . $conexao->error;
        }

        // Fechar a consulta de inserção
        $inserir->close();
    }

    // Fechar a consulta de verificação do CPF
    $consulta->close();

    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img2_tcc.png">
    <style> 
    @import url(https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap%27); 
    body{
            font-family: Montserrat;
        }
    </style>
</head> 
<body class="bg-gradient-to-r from-orange-300 via-orange-400 to-orange-500"> 
    <div class="flex flex-col justify-center items-center w-screen h-screen pt-12">
    <form action="logout.php" method="POST">
    <input type="submit" name="logout" value="Voltar">
  </form>    
    <form action="formulario.php" method="POST">
                <div class="bg-white flex flex-col items-center rounded-lg shadow-lg shadow-orange-500/50 p-10 box-content w-56 h-96"> 
                   <div class="w-64 h-60">  
                   <div class="pt-2 pb-4">
                        <label for="nome">  <b> Nome completo: </b> </label>
                        <input type="text" name="nome" id="nome" class="w-64 h-7 bg-orange-50 rounded-lg" required>
                    </div>
                    <div class="pt-2 pb-4">
                        <label for="cpf"> <b> CPF: </b></label>
                        <input type="number" name="cpf" id="cpf" class="w-64 h-7 bg-orange-50 rounded-lg" required>
                    </div>
                    <div class="pt-2 pb-4">
                        <label for="tipo"> <b> Tipo: </b></label>
                        <input type="text" name="tipo" id="tipo" class="w-64 h-7 bg-orange-50 rounded-lg" required>
                    </div>
                    <div class="pt-2 pb-4">
                        <label for="turno"> <b> Turno: </b></label>
                        <input type="text" name="turno" id="turno" class="w-64 h-7 bg-orange-50 rounded-lg" required>
                    </div>
                    <div class="pt-2 pb-4">
                        <label for="senha"> <b> Senha: </b></label>
                        <input type="text" name="senha" id="senha" class="w-64 h-7 bg-orange-50 rounded-lg" required>
                    </div>
                    </div>  
                 </div>
                <div class="pt-8 px-18 py-0">
                        <input type="submit" name="submit" value="Cadastrar" class="botaocadastro justify-center h-8 w-48 ml-14 bg-orange-500 items-center rounded-lg transition duration-500 ease select-none hover:bg-white focus:outline-none focus:shadow-outline">
                </div>       
        </form>                    
    </div>
</body>
</html>
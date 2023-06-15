<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['senha'])) {
    include_once('config.php');
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    print_r('Nome: ' . $nome);
    print_r('cpf: ' . $cpf);
    print_r('Senha: ' . $senha);

    $sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND cpf = '$cpf' AND senha = '$senha'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tipo = $row['tipo'];

        if ($tipo == 'aluno') {
            $_SESSION['nome'] = $nome; // Armazena o nome do aluno na sessão
            header('Location: sistema.php');
            exit;
        } elseif ($tipo == 'cozinha' || $tipo == 'coordenacao') {
            $_SESSION['nome'] = $nome; // Armazena o nome do usuário na sessão
            header('Location: index.php');
            exit;
        }
    } 
}
?>
<?php
include_once('config.php');
    session_start();

    // Verifica se o botão de logout foi clicado
    if (isset($_POST['logout'])) {
        // Limpa todas as variáveis de sessão
        session_unset();

        // Destroi a sessão
        session_destroy();

        // Redireciona o usuário para a página de login
        header('Location: login.html');
        exit;
    }
?>
<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['tipo']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        unset($_SESSION['cpf']); 
        unset($_SESSION['tipo']);
        header('Location: login.html');
    }

    $logado = $_SESSION['nome'];

    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $result = $conexao->query($sql);

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> CONTROLE </title>
    <link rel="stylesheet" type="text/css" href="style.css">

 
</head>
<body>
    
    <div>
            <table>
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">cpf</th>
                    <th scope="col">tipo</th>
                    <th scope="col">turno</th>
                    <th scope="col">senha</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            echo"<tr>";
                            echo"<td>".$user_data['id']."</td>";
                            echo"<td>".$user_data['nome']."</td>";
                            echo"<td>".$user_data['cpf']."</td>";
                            echo"<td>".$user_data['tipo']."</td>";
                            echo"<td>".$user_data['turno']."</td>";
                            echo"<td>".$user_data['senha']."</td>";
                        }
                ?>
                </tbody>
            </table>
    </div>
</body>
</html>
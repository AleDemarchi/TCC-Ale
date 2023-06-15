<?php
$dbHost = 'localhost';
$dbName = 'formulario';
$dbPassaword = '';
$dbUsername = 'root';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassaword,$dbName);

if($conexao->connect_errno)
{
    echo "Erro";
}
else
{
    echo"";
}
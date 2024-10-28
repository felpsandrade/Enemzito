<?php
// Configurações do banco de dados
$hostname = "localhost";
$username = "root";
$password = "1234";
$database = "Enemzito";

// Criando a conexão
$conn = new mysqli($hostname, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

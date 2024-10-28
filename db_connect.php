<?php
// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "1234"; // Sua senha do MySQL
$dbname = "Enemzito"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

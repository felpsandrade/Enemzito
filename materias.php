<?php
session_start();

// Conexão com o banco de dados
$host = 'localhost';
$db = 'Enemzito';
$user = 'root';
$pass = '1234';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$isGuest = isset($_SESSION['role']) && $_SESSION['role'] === 'guest';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha a Matéria</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #e8f5e9; /* Fundo verde claro */
        color: #333;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    /* Estilo para contêineres */
    .container {
        text-align: center;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 90%;
    }

    /* Estilo para o cabeçalho */
    h1 {
        font-size: 1.8em;
        color: #388e3c; /* Verde escuro */
        margin-bottom: 20px;
    }

    /* Estilo para os botões */
    .button {
        background-color: #66bb6a; /* Verde médio */
        color: white;
        padding: 12px 20px;
        margin: 10px 0; /* Margem vertical para espaçamento */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-size: 1em;
        width: 100%; /* Largura total do botão */
        transition: background-color 0.3s, transform 0.2s;
    }

    .button:hover {
        background-color: #43a047;
        transform: scale(1.05);
    }

    /* Container para os botões */
    .button-container {
        display: flex;
        flex-direction: column;
        align-items: center; /* Centraliza os botões */
        gap: 10px; /* Espaçamento entre os botões */
        margin-top: 30px;
    }

    /* Estilo para contêineres e itens do layout geral */
    .container-layout {
        display: flex; /* Usando Flexbox */
        flex-wrap: wrap; /* Permite que os itens se ajustem na próxima linha */
        max-width: 1200px; /* Largura máxima para o contêiner */
        margin: 0 auto; /* Centraliza o contêiner */
        padding: 20px; /* Espaçamento interno */
    }

    .item {
        flex: 1; /* Cada item ocupa espaço igual */
        min-width: 200px; /* Largura mínima para os itens */
        margin: 10px; /* Margem entre os itens */
        background-color: #fff; /* Fundo branco para os itens */
        padding: 20px; /* Espaçamento interno */
        border-radius: 5px; /* Bordas arredondadas */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
    }

    /* Imagens responsivas */
    img {
        max-width: 100%; /* Imagem se ajusta ao contêiner */
        height: auto; /* Mantém a proporção */
    }

    /* Wrapper para vídeos responsivos */
    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* Proporção 16:9 */
        height: 0;
        overflow: hidden; /* Esconde o overflow */
    }

    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Estilo para o rodapé */
    footer {
        text-align: center;
        padding: 20px;
        background-color: #333;
        color: white;
        position: relative;
        bottom: 0;
        width: 100%;
    }

    /* Media Queries para responsividade */
    @media (max-width: 600px) {
        .item {
            flex-basis: 100%; /* Empilha os itens em telas pequenas */
        }
    }

    @media (min-width: 601px) {
        .item {
            flex-basis: 50%; /* Dois itens por linha em telas médias */
        }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Escolha uma Matéria</h1>
        
        <div class="button-container">
            <a href="prova_linguagens.php" class="button">Linguagens e Códigos</a>
            <a href="prova_matematica.php" class="button">Matemática</a>
            <a href="prova_ciencias_natureza.php" class="button">Ciências da Natureza</a>
            <a href="prova_ciencias_humanas.php" class="button">Ciências Humanas</a>
            <?php if (!$isGuest): ?>
                <a href="simulado.php" class="button">Simulado</a>
            <?php endif; ?>
            <a href="simulado.php" class="button">Simulado</a> <!-- Novo botão adicionado -->
        </div>

        <div class="button-container">
            <?php if (!$isGuest): ?>
                <a href="index.php" class="button">Desconectar-se</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
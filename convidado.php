<?php
session_start();

// Define se o usuário está acessando como convidado
$_SESSION['role'] = 'guest';
$isGuest = true;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo, Convidado</title>
    <style>

body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Estilo para contêineres e itens */
    .container {
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

    /* Estilo para botões */
    button {
        padding: 15px 20px; /* Área de toque maior */
        font-size: 16px; /* Tamanho de fonte legível */
        background-color: #28a745; /* Cor de fundo verde */
        color: white; /* Cor do texto */
        border: none; /* Remove borda */
        border-radius: 5px; /* Bordas arredondadas */
        cursor: pointer; /* Cursor de ponteiro */
        transition: background-color 0.3s; /* Transição suave */
    }

    button:hover {
        background-color: #218838; /* Cor de fundo ao passar o mouse */
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

    /* Estilo para o cabeçalho */
    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px; /* Margem superior */
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

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #e8f5e9; /* Fundo verde claro */
            color: #333;
        }
        .button {
            background-color: #66bb6a; /* Verde médio */
            color: white;
            padding: 12px 20px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #43a047;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo ao Enemzito!</h1>

    <p>Convidados podem acessar as matérias e realizar o Simulado.</p>

    <div>
        <a href="materias.php" class="button">Acessar Matérias</a>
        <a href="simulado.php" class="button">Realizar Simulado</a>
        <a href="login.php" class="button">Fazer Login</a>
        <a href="cadastrar.php" class="button">Cadastrar</a>
    </div>
</body>
</html>

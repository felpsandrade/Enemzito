<?php
$host = 'localhost';
$db = 'Enemzito';
$user = 'root';
$pass = '1234';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$questoes = $conn->query("SELECT * FROM perguntas WHERE materia = 'Ciências da Natureza e suas Tecnologias' ORDER BY RAND() LIMIT 10");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova de Ciências da Natureza</title>
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
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 800px; /* Limita a largura do formulário */
            margin: 0 auto; /* Centraliza o formulário */
            background: #fff; /* Fundo branco para o formulário */
            padding: 20px; /* Espaçamento interno */
            border-radius: 8px; /* Bordas arredondadas */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        .questao {
            margin-bottom: 20px; /* Espaçamento entre as questões */
            padding: 15px; /* Espaçamento interno */
            border: 1px solid #ddd; /* Borda suave */
            border-radius: 5px; /* Bordas arredondadas */
            background-color: #fafafa; /* Fundo suave */
            transition: transform 0.2s; /* Animação suave ao passar o mouse */
        }

        .questao:hover {
            transform: scale(1.02); /* Aumenta ligeiramente ao passar o mouse */
        }

        .questao img {
            max-width: 100%; /* Imagem responsiva */
            height: auto; /* Mantém a proporção da imagem */
            border-radius: 5px; /* Bordas arredondadas para a imagem */
            display: block; /* Faz a imagem ocupar uma linha inteira */
            margin: 0 auto 10px; /* Centraliza a imagem e adiciona margem abaixo */
        }

        .alternativas {
            margin-left: 20px; /* Espaçamento à esquerda para as alternativas */
        }

        input[type="radio"] {
            margin-right: 5px; /* Espaçamento entre o botão de rádio e o texto */
        }

        .button {
            display: block; /* Faz o botão ocupar toda a largura */
            width: 100%; /* Largura total */
            padding: 10px; /* Espaçamento interno */
            background-color: #28a745; /* Cor de fundo do botão */
            color: white; /* Cor do texto */
            border: none; /* Remove borda */
            border-radius: 5px; /* Bordas arredondadas */
            font-size: 16px; /* Tamanho da fonte */
            cursor: pointer; /* Cursor de ponteiro */
            margin-top: 20px; /* Espaçamento acima do botão */
            transition: background-color 0.3s; /* Animação suave para a cor de fundo */
        }

        .button:hover {
            background-color: #218838; /* Cor do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <h1>Prova de Ciências da Natureza</h1>
    <form method="POST" action="resultado.php">
    <?php
        $indice = 0;

        if ($questoes->num_rows > 0) {
            while ($questao = $questoes->fetch_assoc()) {
                $imagem = $questao['imagem'];
                $alternativa_correta = $questao['alternativa_correta'];

                echo "<div class='questao'>";
                echo "<img src='uploads/$imagem' alt='Questão $indice'><br>";
                echo "<p>Escolha a resposta correta:</p>";
                echo "<input type='radio' name='respostas[$indice]' value='A' required> A<br>";
                echo "<input type='radio' name='respostas[$indice]' value='B'> B<br>";
                echo "<input type='radio' name='respostas[$indice]' value='C'> C<br>";
                echo "<input type='radio' name='respostas[$indice]' value='D'> D<br>";
                echo "<input type='radio' name='respostas[$indice]' value='E'> E<br>";
                echo "<input type='hidden' name='respostas_certas[$indice]' value='$alternativa_correta'>";
                echo "</div>";
                $indice++;
            }
        } else {
            echo "<p>Não há questões disponíveis para esta matéria.</p>";
        }
        ?>
        <input type="submit" value="Enviar Respostas" class="button">
    </form>
</body>
</html>

<?php
$conn->close();
?>

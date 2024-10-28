<?php
session_start(); // Inicia a sessão

// Conexão com o banco de dados
$host = 'localhost';
$db = 'Enemzito';
$user = 'root';
$pass = '1234';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o user_id está definido na sessão
if (!isset($_SESSION['user_id'])) {
    die("Erro: user_id não está definido. Faça login para continuar.");
}

// Defina o simulado_id (isso deve ser gerado ou recuperado conforme a lógica do seu aplicativo)
$simulado_id = 1; // Exemplo de simulado_id, altere conforme necessário

// Matéria prioritária (exemplo)
$query_erro = "SELECT materia, COUNT(*) AS erros FROM erros GROUP BY materia ORDER BY erros DESC LIMIT 1";
$result_erro = $conn->query($query_erro);
$materia_prioritaria = $result_erro->num_rows > 0 ? $result_erro->fetch_assoc()['materia'] : "Ciências da Natureza e suas Tecnologias";

// Selecionar perguntas com base em matéria prioritária
$query_prioritaria = "SELECT * FROM perguntas WHERE materia = '$materia_prioritaria' ORDER BY RAND() LIMIT 6";
$result_prioritaria = $conn->query($query_prioritaria);

// Selecionar perguntas de outras matérias
$materias = ["Matemática e suas Tecnologias", "Linguagens, Códigos e suas Tecnologias", "Ciências Humanas e suas Tecnologias"];
$questoes = [];
if ($result_prioritaria->num_rows > 0) {
    while ($row = $result_prioritaria->fetch_assoc()) {
        $questoes[] = $row;
    }
}

// Adicione as perguntas de outras matérias, se necessário
foreach ($materias as $materia) {
    $query_outros = "SELECT * FROM perguntas WHERE materia = '$materia' ORDER BY RAND() LIMIT 4";
    $result_outros = $conn->query($query_outros);
    if ($result_outros->num_rows > 0) {
        while ($row = $result_outros->fetch_assoc()) {
            $questoes[] = $row;
        }
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($questoes as $indice => $questao) {
        $respostaUsuario = $_POST["respostas"][$indice] ?? null;
        $correto = ($respostaUsuario === $_POST["respostas_certas"][$indice]) ? 1 : 0;

        // Insere os resultados no banco de dados
        $stmt = $conn->prepare("INSERT INTO resultados (user_id, materia, resposta, correto, simulado_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issii", $_SESSION['user_id'], $questao['materia'], $respostaUsuario, $correto, $simulado_id);
        $stmt->execute();
    }

    // Redirecionar para a página de resultados
    header("Location: resultadoSimulado.php?simulado_id=$simulado_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado Dinâmico</title>
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

        .question {
            margin-bottom: 20px; /* Espaçamento entre as questões */
            padding: 15px; /* Espaçamento interno */
            border: 1px solid #ddd; /* Borda suave */
            border-radius: 5px; /* Bordas arredondadas */
            background-color: #fafafa; /* Fundo suave */
            transition: transform 0.2s; /* Animação suave ao passar o mouse */
        }

        .question:hover {
            transform: scale(1.02); /* Aumenta ligeiramente ao passar o mouse */
        }

        .question img {
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
    <div class="container">
        <h1>Simulado Dinâmico</h1>
        <form method="POST" action="">
            <?php
            $indice = 0;
            foreach ($questoes as $questao) {
                echo "<div class='question'>";
                echo "<img src='uploads/{$questao ['imagem']}' alt='Imagem da Pergunta'><br>";
                echo "<p>Escolha a resposta correta:</p>";
                foreach (['A', 'B', 'C', 'D', ' E'] as $opcao) {
                    echo "<label><input type='radio' name='respostas[$indice]' value='$opcao' required> $opcao</label><br>";
                }
                echo "<input type='hidden' name='respostas_certas[$indice]' value='{$questao['alternativa_correta']}'>";
                echo "</div>";
                $indice++;
            }
            ?>
            <input type="hidden" name="simulado_id" value="<?php echo $simulado_id; ?>"> <!-- Adicione este campo oculto -->
            <input type="submit" value="Enviar Respostas">
        </form>
        <a href="materias.php" class="back-button">Voltar para Matérias</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
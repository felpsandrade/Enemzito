<?php
session_start(); // Inicia a sessão

// Verifica se o user_id está definido na sessão
if (!isset($_SESSION['user_id'])) {
    die("Erro: Você precisa estar logado para ver os resultados.");
}

// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "1234", "Enemzito"); // Altere username e password

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Obtém o simulado_id da URL (GET)
$simulado_id = isset($_GET['simulado_id']) ? $_GET['simulado_id'] : null;

if ($simulado_id === null) {
    die("Erro: Simulado não especificado.");
}

// Consulta para obter o número de perguntas por matéria para o simulado específico
$queryMaterias = "SELECT materia, COUNT(*) as total FROM resultados WHERE user_id = ? AND simulado_id = ? GROUP BY materia";
$stmtMaterias = $conn->prepare($queryMaterias);
$stmtMaterias->bind_param("ii", $_SESSION['user_id'], $simulado_id);
$stmtMaterias->execute();
$resultMaterias = $stmtMaterias->get_result();
$materias = [];
while ($row = mysqli_fetch_assoc($resultMaterias)) {
    $materias[] = $row;
}

// Consulta para obter o número de acertos e erros por matéria para o simulado específico
$queryResultados = "SELECT 
                        p.materia, 
                        COUNT(DISTINCT CASE WHEN r.correto = 1 THEN r.id END) as acertos, 
                        COUNT(DISTINCT CASE WHEN r.correto = 0 THEN r.id END) as erros
                    FROM resultados r
                    JOIN perguntas p ON r.materia = p.materia
                    WHERE r.user_id = ? AND r.simulado_id = ?
                    GROUP BY p.materia";

$stmtResultados = $conn->prepare($queryResultados);
$stmtResultados->bind_param("ii", $_SESSION['user_id'], $simulado_id);
$stmtResultados->execute();
$resultadoMaterias = $stmtResultados->get_result();
$resultadosPorMateria = [];

while ($row = mysqli_fetch_assoc($resultadoMaterias)) {
    $resultadosPorMateria[] = $row;
}

// Consulta para obter detalhes dos erros do usuário no simulado
$queryErrosDetalhes = "SELECT 
                            materia, 
                            alternativa_correta, 
                            resposta_usuario 
                        FROM erros 
                        WHERE user_id = ? AND simulado_id = ?";

$stmtErrosDetalhes = $conn->prepare($queryErrosDetalhes);
$stmtErrosDetalhes->bind_param("ii", $_SESSION['user_id'], $simulado_id);
$stmtErrosDetalhes->execute();
$resultadoErrosDetalhes = $stmtErrosDetalhes->get_result();

// Fechar a conexão
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Simulado</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Inclui Chart.js -->
    <style>
        /* Estilos conforme solicitado */
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
            padding: 20px;
            text-align: center;
        }
        h1, h2 {
            color: #28a745; /* Verde */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease; /* Animação suave */
        }
        th {
            background-color: #28a745; /* Cabeçalho verde */
            color: white;
        }
        tr:hover td {
            background-color: rgba(40, 167, 69, 0.1); /* Efeito de hover */
        }
        canvas {
            max-width: 100%;
            border-radius: 10px; /* Bordas arredondadas para o gráfico */
            box-shadow: 0 2px 10px rgba (0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<h1>Resultado do Simulado</h1>
<h2>Resumo das Matérias</h2>
<table border="1">
    <thead>
        <tr>
            <th>Matéria</th>
            <th>Número de Questões Acertadas</th>
            <th>Número de Questões Erradas</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $totalAcertos = 0;
        $totalErros = 0;

        foreach ($resultadosPorMateria as $resultado): 
            $totalAcertos += $resultado['acertos'];
            $totalErros += $resultado['erros'];
        ?>
            <tr>
                <td><?php echo htmlspecialchars($resultado['materia']); ?></td>
                <td><?php echo htmlspecialchars($resultado['acertos']); ?></td>
                <td><?php echo htmlspecialchars($resultado['erros']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th><?php echo htmlspecialchars($totalAcertos); ?></th>
            <th><?php echo htmlspecialchars($totalErros); ?></th>
        </tr>
    </tfoot>
</table>

<h2>Feedback para Usuários</h2>
<table border='1'>
    <thead><tr><th>Matéria</th><th>Resposta Dada</th><th>Resposta Correta</th></tr></thead><tbody>
    <?php while ($row = mysqli_fetch_assoc($resultadoErrosDetalhes)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['materia']); ?></td>
            <td><?php echo htmlspecialchars($row['resposta_usuario']); ?></td>
            <td><?php echo htmlspecialchars($row['alternativa_correta']); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<h2>Gráfico de Resultados</h2>
<canvas id="graficoResultados"></canvas>
<script>
    const ctx = document.getElementById('graficoResultados').getContext('2d');
    const graficoResultados = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($resultadosPorMateria, 'materia')); ?>,
            datasets: [{
                label: 'Número de Questões Acertadas',
                data: <?php echo json_encode(array_column($resultadosPorMateria, 'acertos')); ?>,
                backgroundColor: 'rgba(40, 167, 69, 0.2)', // Verde claro
                borderColor: 'rgba(40, 167, 69, 1)', // Verde
                borderWidth: 1
            }, {
                label: 'Número de Questões Erradas',
                data: <?php echo json_encode(array_column($resultadosPorMateria, 'erros')); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Vermelho claro
                borderColor: 'rgba(255, 99, 132, 1)', // Vermelho
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 50 // Define o máximo do eixo Y como o número total de questões do simulado
                }
            }
        }
    });
</script>
</body>
</html>
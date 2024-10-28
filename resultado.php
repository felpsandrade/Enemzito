<?php
$host = 'localhost';
$db = 'Enemzito';
$user = 'root';
$pass = '1234';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recupera as respostas enviadas
$respostas_certas = $_POST['respostas_certas'] ?? [];
$respostas_usuario = $_POST['respostas'] ?? [];
$materia = $_POST['materia'] ?? ''; // Verifica se a matéria foi enviada

$total_questoes = count($respostas_certas);
$total_erros = 0;
$feedback = [];

// Insere erros no banco de dados e coleta feedback
foreach ($respostas_certas as $indice => $alternativa_correta) {
    $resposta_usuario = $respostas_usuario[$indice] ?? '';

    if ($resposta_usuario !== $alternativa_correta) {
        $total_erros++;
        $feedback[] = [
            'questao' => $indice + 1,
            'correta' => $alternativa_correta,
            'usuario' => $resposta_usuario,
            'resultado' => 'Incorreta'
        ];

        // Registra o erro no banco de dados
        $query = "INSERT INTO erros (materia, alternativa_correta, resposta_usuario, user_id, simulado_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $user_id = $_SESSION['user_id'] ?? 0; // Substitua por uma lógica real para obter o ID do usuário
        $simulado_id = 1; // Substitua pelo ID do simulado real se necessário
        $stmt->bind_param('ssssi', $materia, $alternativa_correta, $resposta_usuario, $user_id, $simulado_id);
        $stmt->execute();
    } else {
        $feedback[] = [
            'questao' => $indice + 1,
            'correta' => $alternativa_correta,
            'usuario' => $resposta_usuario,
            'resultado' => 'Correta'
        ];
    }
}

// Calcula a porcentagem de acertos
$percentual_acertos = (($total_questoes - $total_erros) / $total_questoes) * 100;
$mensagem_positiva = $percentual_acertos > 50 ? "Parabéns, continue se esforçando!" : "Não desanime! Continue estudando e melhorando!";

// Consulta para obter erros por matéria
$queryErrosPorMateria = "SELECT 
                            materia, 
                            COUNT(*) AS total_erros 
                         FROM erros 
                         WHERE user_id = ? 
                         GROUP BY materia";

$stmtErros = $conn->prepare($queryErrosPorMateria);
$stmtErros->bind_param("i", $user_id);
$stmtErros->execute();
$resultadoErros = $stmtErros->get_result();

$errosPorMateria = [];
while ($row = mysqli_fetch_assoc($resultadoErros)) {
    $errosPorMateria[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Prova</title>
    <style>
        /* Estilos do CSS aqui (mantidos do seu código) */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .container {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 600px;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }
        h1 {
            color: #4CAF50;
            margin: 0 0 15px;
        }
        .feedback-table {
            width: 100%;
            margin: 20px 0 ;
            border-collapse: collapse;
        }
        .feedback-table th, .feedback-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .feedback-table th {
            background-color: #f5f5f5;
            color: #333;
        }
        .feedback-table tr.correct td {
            background-color: #e0f7fa;
            color: #4caf50;
        }
        .feedback-table tr.incorrect td {
            background-color: #ffebee;
            color: #e53935;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado da Prova</h1>
        <p>Você acertou <strong><?php echo $total_questoes - $total_erros; ?></strong> de <strong><?php echo $total_questoes; ?></strong> questões.</p>
        <p>Percentual de acertos: <strong><?php echo number_format($percentual_acertos, 2); ?>%</strong></p>
        <p><?php echo $mensagem_positiva; ?></p>
        
        <table class="feedback-table">
            <tr>
                <th>Questão</th>
                <th>Sua Resposta</th>
                <th>Resposta Correta</th>
                <th>Resultado</th>
            </tr>
            <?php foreach ($feedback as $resposta): ?>
                <tr class="<?php echo strtolower($resposta['resultado']); ?>">
                    <td><?php echo $resposta['questao']; ?></td>
                    <td><?php echo $resposta['usuario'] ?: '-'; ?></td>
                    <td><?php echo $resposta['correta']; ?></td>
                    <td><?php echo $resposta['resultado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Análise de Desempenho</h2>
        <table border='1'>
            <thead><tr><th>Matéria</th><th>Total de Erros</th></tr></thead><tbody>
            <?php foreach ($errosPorMateria as $erro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($erro['materia']); ?></td>
                    <td><?php echo htmlspecialchars($erro['total_erros']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="materias.php" class="button">Voltar para Matérias</a>
    </div>
</body>
</html>
<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "1234", "Enemzito"); // Altere username e password

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Consulta para buscar perguntas prioritárias
$questionIds = [];

// Exemplo de como priorizar as perguntas
$queryPrioritarias = "SELECT id FROM perguntas WHERE materia = 'Ciências da Natureza e suas Tecnologias' LIMIT 6";
$resultPrioritarias = mysqli_query($conn, $queryPrioritarias);
while ($row = mysqli_fetch_assoc($resultPrioritarias)) {
    $questionIds[] = $row['id'];
}

// Seleciona 4 perguntas de outras matérias
$queryOutras = "SELECT id FROM perguntas WHERE materia != 'Ciências da Natureza e suas Tecnologias' LIMIT 4";
$resultOutras = mysqli_query($conn, $queryOutras);
while ($row = mysqli_fetch_assoc($resultOutras)) {
    $questionIds[] = $row['id'];
}

// Busca as perguntas pelo id
$query = "SELECT * FROM perguntas WHERE id IN (" . implode(',', $questionIds) . ")";
$result = mysqli_query($conn, $query);
$perguntas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<form method="POST" action="">
    <?php foreach ($perguntas as $pergunta): ?>
        <div>
            <img src="uploads/<?php echo $pergunta['imagem']; ?>" alt="Pergunta">
            <p><?php echo "Pergunta: " . $pergunta['id']; ?></p>
            <label>
                <input type="radio" name="resposta_<?php echo $pergunta['id']; ?>" value="A"> A
            </label>
            <label>
                <input type="radio" name="resposta_<?php echo $pergunta['id']; ?>" value="B"> B
            </label>
            <label>
                <input type="radio" name="resposta_<?php echo $pergunta['id']; ?>" value="C"> C
            </label>
            <label>
                <input type="radio" name="resposta_<?php echo $pergunta['id']; ?>" value="D"> D
            </label>
            <label>
                <input type="radio" name="resposta_<?php echo $pergunta['id']; ?>" value="E"> E
            </label>
        </div>
    <?php endforeach; ?>
    <button type="submit">Enviar Respostas</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acertos = 0; // Contador de acertos
    $feedback = [];

    foreach ($perguntas as $pergunta) {
        $respostaUsuario = $_POST["resposta_" . $pergunta['id']] ?? null; // Resposta do usuário
        if ($respostaUsuario === null) {
            $feedback[] = "Pergunta " . $pergunta['id'] . ": Não respondida!";
        } elseif ($respostaUsuario === $pergunta['resposta_correta']) {
            $acertos++;
            $feedback[] = "Pergunta " . $pergunta['id'] . ": Correta!";
        } else {
            $feedback[] = "Pergunta " . $pergunta['id'] . ": Incorreta. Resposta correta: " . $pergunta['resposta_correta'];
        }
    }

    // Exibir feedback
    echo "Você acertou " . $acertos . " de " . count($perguntas) . " perguntas.<br>";
    foreach ($feedback as $f) {
        echo $f . "<br>";
    }
}

// Fechar a conexão
mysqli_close($conn);
?>

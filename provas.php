<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "1234", "Enemzito");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materia = $_POST['materia'];

    $stmt = $conn->prepare("SELECT * FROM perguntas WHERE materia = ? ORDER BY RAND() LIMIT 10");
    $stmt->bind_param("s", $materia);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<form action="feedback.php" method="post">';
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<p>' . $row['pergunta'] . '</p>';
            foreach (['A', 'B', 'C', 'D', 'E'] as $opcao) {
                echo "<input type='radio' name='respostas[{$row['id']}]' value='$opcao'> $opcao: " . $row["alternativa_$opcao"] . "<br>";
            }
            echo '</div>';
        }
        echo '<input type="submit" value="Enviar Respostas">';
        echo '</form>';
    } else {
        echo 'Nenhuma questão encontrada para esta matéria.';
    }

    $stmt->close();
} else {
    echo 'Método de requisição inválido.';
}

$conn->close();
?>

<?php
// Conexão com o banco de dados
$hostname = 'localhost';
$username = 'root';
$password = '1234';
$database = 'Enemzito';

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['materia']) && isset($_POST['alternativa'])) {
        $materia = $_POST['materia'];
        $alternativa_correta = $_POST['alternativa'];

        if (isset($_FILES['images']) && is_array($_FILES['images']['name'])) {
            foreach ($_FILES['images']['name'] as $key => $image_name) {
                $upload_dir = 'uploads/';
                $upload_file = $upload_dir . basename($image_name);

                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $upload_file)) {
                    $stmt = $conn->prepare("INSERT INTO perguntas (imagem, materia, alternativa_correta) VALUES (?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("sss", $image_name, $materia, $alternativa_correta);
                        $stmt->execute();
                        $stmt->close();
                    } else {
                        echo "Erro ao preparar a consulta: " . $conn->error;
                    }
                } else {
                    echo "Erro ao enviar o arquivo: " . $image_name;
                }
            }
            echo "Imagens enviadas com sucesso.";
        } else {
            echo "Nenhuma imagem selecionada.";
        }
    } else {
        echo "Matéria ou alternativa não definida.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Desenvolvedor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Inserir Perguntas</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="materia">Selecione a Matéria:</label>
        <select name="materia" id="materia" required>
            <option value="Ciências Humanas e suas Tecnologias">Ciências Humanas e suas Tecnologias</option>
            <option value="Ciências da Natureza e suas Tecnologias">Ciências da Natureza e suas Tecnologias</option>
            <option value="Linguagens, Códigos e suas Tecnologias">Linguagens, Códigos e suas Tecnologias</option>
            <option value="Matemática e suas Tecnologias">Matemática e suas Tecnologias</option>
        </select>

        <label for="images">Selecione as Imagens:</label>
        <input type="file" name="images[]" id="images" multiple required>

        <label for="alternativa">Selecione a Alternativa Correta:</label>
        <select name="alternativa" id="alternativa" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select>

        <button type="submit">Enviar Perguntas</button>
    </form>
</body>
</html>
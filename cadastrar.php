<?php
// Dados de conexão
$host = 'localhost';
$db = 'Enemzito';
$user = 'root';
$pass = '1234';

// Criar conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$msg = ""; // Variável para mensagens de erro ou sucesso

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o usuário já existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $msg = "Este e-mail já está cadastrado.";
    } else {
        // Cadastrar novo usuário
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT); // Criptografando a senha e armazenando em uma variável
        $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $senha_hash); // Agora passando a variável
        if ($stmt->execute()) {
            $msg = "Usuário cadastrado com sucesso!";
        } else {
            $msg = "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
            background-color: #F4F4F9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .login-btn {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <?php if (isset($msg)) echo "<p style='color: red;'>$msg</p>"; ?>
        <form method="post" action="">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <button type="submit" class="button">Cadastrar</button>
        </form>
        <a href="login.php" class="login-btn">Já tem uma conta? Faça login aqui.</a> <!-- Link para redirecionar para login.php -->
    </div>
</body>
</html>
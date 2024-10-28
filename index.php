<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Enemzito!</title>
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









        b/* Reset para remover margens e padding padrão */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif; /* Modifique aqui para a fonte específica do site */
}

/* Corpo da página */
body {
    font-family: "Open Sans", sans-serif;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    animation: fadeInPage 0.5s ease-in-out;
}

/* Animação de transição suave ao carregar a página */
@keyframes fadeInPage {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Estrutura da área de conteúdo principal */
.container {
    width: 90%;
    max-width: 800px;
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Títulos e Subtítulos */
h1, h2 {
    color: #4CAF50;
    margin-bottom: 20px;
    text-align: center;
}

h2 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 1.8rem;
}

/* Estilização dos botões */
.button, input[type="submit"] {
    display: inline-block;
    background-color: #4CAF50;
    color: #fff;
    padding: 12px 24px;
    margin: 10px;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 500;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    text-decoration: none;
}

.button:hover, input[type="submit"]:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

/* Estilos dos formulários e inputs */
form {
    width: 100%;
    display: flex;<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Enemzito!</title>
    <style>
        b/* Reset para remover margens e padding padrão */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif; /* Modifique aqui para a fonte específica do site */
}

/* Corpo da página */
body {
    font-family: "Open Sans", sans-serif;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    animation: fadeInPage 0.5s ease-in-out;
}

/* Animação de transição suave ao carregar a página */
@keyframes fadeInPage {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Estrutura da área de conteúdo principal */
.container {
    width: 90%;
    max-width: 800px;
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Títulos e Subtítulos */
h1, h2 {
    color: #4CAF50;
    margin-bottom: 20px;
    text-align: center;
}

h2 {
    color: #2c3e50;
    font-weight: 600;
    font-size: 1.8rem;
}

/* Estilização dos botões */
.button, input[type="submit"] {
    display: inline-block;
    background-color: #4CAF50;
    color: #fff;
    padding: 12px 24px;
    margin: 10px;
    border: none;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 500;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    text-decoration: none;
}

.button:hover, input[type="submit"]:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

/* Estilos dos formulários e inputs */
form {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

input[type="email"], input[type="password"], select {
    width: 100%;
    max-width: 400px;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s ease;
}

input[type="email"]:focus, input[type="password"]:focus, select:focus {
    border-color: #4CAF50;
}

/* Estilização dos blocos de perguntas */
.questao {
    padding: 15px;
    margin: 15px 0;
    border: 1px solid #ddd;
    border-radius: 12px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

/* Estilização das imagens e opções */
img {
    max-width: 100%;
    height:
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

input[type="email"], input[type="password"], select {
    width: 100%;
    max-width: 400px;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s ease;
}

input[type="email"]:focus, input[type="password"]:focus, select:focus {
    border-color: #4CAF50;
}

/* Estilização dos blocos de perguntas */
.questao {
    padding: 15px;
    margin: 15px 0;
    border: 1px solid #ddd;
    border-radius: 12px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

/* Estilização das imagens e opções */
img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 10px;
}

/* Opções de respostas com estilo mais leve */
input[type="radio"] {
    margin-right: 8px;
    accent-color: #4CAF50; /* Define a cor da opção de rádio */
}

/* Estilos para animação de resultado */
.resultado {
    background-color: #ecf9ec;
    border-radius: 10px;
    padding: 15px;
    animation: fadeInPage 0.8s ease;
}

/* Links */
a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: 500;
}

a:hover {
    color: #388e3c;
    text-decoration: underline;
}

    </style>
</head>
<body>
    <img src="Enemzito.png" alt="Descrição da imagem" style="width: 300px; height: auto;">    
    <h1>Bem-vindo ao Enemzito!</h1>
    <p>Escolha uma opção:</p>
    <a href="cadastrar.php" class="button">Cadastrar</a>
    <a href="login.php" class="button">Login</a>
    <a href="convidado.php" class="button">Entrar como Convidado</a>
    <a href="desenvolvedor.php" class="button">Desenvolvedor</a>
    <!--<a href="materias.php" class="button">Iniciar Prova</a>-->
</body>
</html>

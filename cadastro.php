<?php
$hostname = "localhost";
$bancodedados = "site_virtual_center";
$usuario = "root";
$senha = "";

// Criar uma conexão global
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verificar a conexão
if ($mysqli->connect_errno) {
    die("Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulário de Login
    if (isset($_POST["loginUsername"]) && isset($_POST["loginPassword"])) {
        // Coleta os dados do formulário
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];

        // Query SQL para verificar o usuário no banco de dados
        $consulta = "SELECT * FROM usuarios WHERE nome='$username'";
        $resultado = $mysqli->query($consulta);

        /// Verifica se o usuário foi encontrado
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Verifica se a senha está correta
    if (password_verify($password, $row["senha"])) {
        echo "Login realizado com sucesso!";
        header("Location: produtos.php?user=" . urlencode($username));
                exit();

    } else {
        echo "Senha incorreta.";
        echo ($row["senha"]);

    }
} else {
    echo "Usuário não encontrado.";
}

        // Libera o resultado da consulta
        $resultado->free_result();
    }

    // Formulário de Cadastro
    if (isset($_POST["cadastroUsername"]) && isset($_POST["cadastroEmail"])) {
        // Coleta os dados do formulário
        $username = $_POST["cadastroUsername"];
        $email = $_POST["cadastroEmail"];
        $cpf = $_POST["cadastroCPF"];
        $cep = $_POST["cadastroCEP"];
        $cidade = $_POST["cadastroCidade"];
        $bairro = $_POST["cadastroBairro"];
        $rua = $_POST["cadastroRua"];
        $password = $_POST["cadastroPassword"];

        // Hash da senha (recomendado para armazenamento seguro)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Query SQL para inserir dados na tabela 'usuarios'
        $inserir = "INSERT INTO usuarios (nome, email, cpf, cep, bairro, rua, senha) VALUES ('$username', '$email', '$cpf', '$cep', '$bairro', '$rua', '$hashedPassword')";
echo $hashedPassword;
        // Executa a query
        if ($mysqli->query($inserir)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $mysqli->error;
        }
    }
}

// Fecha a conexão no final do script
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Center</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        img {
            width: 150px; /* ajuste o tamanho conforme necessário */
            height: auto; /* mantém a proporção original da imagem */
        }
        nav {
            background-color: #555;
            padding: 1em;
            text-align: center;
        }
        nav a {
            text-decoration: none;
            color: #fff;
            padding: 0.5em 1em;
            margin: 0 1em;
        }
        section {
            padding: 2em;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
</head>
<body>
    
<header>
        <h1>Pagina de Login</h1>
        <img src="virtual center.jpg" alt="Logo do Site">
    </header>

    <nav>
        <a href="index.php">Nossa Historia</a>
        <a href="produtos.php">Produtos</a>
        <a href="cadastro.php">Cadastro</a>
        <a href="carrinho.php">Carrinho</a>
    </nav>

    <div class="container">
        <!-- Formulário de Login -->
        <h2>Login</h2>
        <form action="cadastro.php" method="post">
            <label for="loginUsername">Nome de Usuário:</label>
            <input type="text" id="loginUsername" name="loginUsername" required>

            <label for="loginPassword">Senha:</label>
            <input type="password" id="loginPassword" name="loginPassword" required>

            <button type="submit">Entrar</button>
        </form>

        <!-- Formulário de Cadastro -->
        <h2>Cadastro</h2>
        <form action="cadastro.php" method="post">
            <label for="cadastroUsername">Nome de Usuário:</label>
            <input type="text" id="cadastroUsername" name="cadastroUsername" required>

            <label for="cadastroEmail">E-mail:</label>
            <input type="email" id="cadastroEmail" name="cadastroEmail" required>

            <label for="cadastroCPF">CPF:</label>
            <input type="CPF" id="cpf" name="cadastroCPF" required>

            <!-- Campos de endereço -->
            <label for="cadastroCEP">CEP:</label>
            <input type="CEP" id="cep" name="cadastroCEP" required>

            <label for="cadastroCEP">Cidade:</label>
            <input type="cidade" id="localidade" name="cadastroCidade" required>

            <label for="cadastroCEP">Bairro:</label>
            <input type="bairro" id="bairro" name="cadastroBairro" required>

            <label for="cadastroCEP">Rua:</label>
            <input type="rua" id="logradouro" name="cadastroRua" required>
            <!-- *************** -->

            <label for="cadastroPassword">Senha:</label>
            <input type="password" id="cadastroPassword" name="cadastroPassword" required>

            <button type="submit" onclick="conferir_campos()">Cadastrar</button>
        </form>
    </div>

    <footer>
        <p>&copy; 3°DS - Letícia, Mateus e Rafael</p>
    </footer>
<script src="cadastro_js.js"></script>

  

</body>
</html>
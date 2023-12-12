<?php
// Certifique-se de que a variável Produtos está definida
if (isset($_GET['Produtos'])) {
    $produtosString = $_GET['Produtos'];
    
    // Conecte-se ao seu banco de dados (substitua os valores conforme necessário)
    $hostname = "localhost";
    $bancodedados = "site_virtual_center";
    $usuario = "root";
    $senha = "";

    // Crie uma conexão
    $conn = new mysqli($hostname, $usuario, $senha, $bancodedados);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Converta a string de produtos de volta para um array
    $produtosArray = explode(',', $produtosString);
    $usuarioString = $_GET['Usuario'];
    // Prepare e execute a declaração de inserção (substitua "sua_tabela" e "nome_produto" pelos valores corretos)
    $stmt = $conn->prepare("INSERT INTO compras (data, produto, nome_usuario) VALUES (NOW(), ?, $usuarioString)");

    if (!$stmt) {
        die("Erro na preparação da declaração: " . $conn->error);
    }

    // Vincule os parâmetros e insira cada produto
    $stmt->bind_param("s", $produto);

    foreach ($produtosArray as $produto) {
        if ($stmt->execute()) {
            echo "Produto cadastrado: $produto\n";
        } else {
            echo "Erro ao cadastrar produto: $produto. Erro: " . $stmt->error . "\n";
        }
    }

    // Feche a declaração e a conexão com o banco de dados
    $stmt->close();
    $conn->close();

    echo 'Compra finalizada. Produtos cadastrados no banco de dados.';
} else {
    echo 'Erro: A variável Produtos não está definida.';
}
?>

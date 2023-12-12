<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Center</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
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
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        .btn {
  border: none;
  font-family: 'Lato';
  font-size: inherit;
  color: inherit;
  background: none;
  cursor: pointer;
  padding: 25px 0px;
  text-align: center;
  display: inline-block;
  margin: 15px 0px;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 700;
  outline: none;
  position: relative;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.btn:after {
  content: '';
  position: absolute;
  z-index: -1;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

/* Pseudo elements for icons */
.btn:before {
  font-family: 'FontAwesome';

  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  position: relative;
  -webkit-font-smoothing: antialiased;
}


/* Icon separator */
.btn-sep {
  padding: 20px 40px 25px 40px;
}

.btn-sep:before {
  background: rgba(0,0,0,0.15);
}
.btn-2 {
  background: #555;
  color: #fff;
}

.btn-2:hover {
  background: #0f0f0f;
}

.btn-2:active {
  background: #0f0f0f;
  top: 2px;
}

.btn-2:before {
  position: absolute;
  height: 100%;
  left: 0;
  top: 0;
  line-height: 3;
  font-size: 140%;
  width: 60px;
}
.div-select {
    width: 250px;
    /* Tamanho final do select */
    overflow: hidden;
    /* Esconde o conteúdo que passar do tamanho especificado */
}

.div-select select {
    background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-select.gif) no-repeat #555;
    /* Imagem de fundo (Seta) */
    background-position: 205px center;
    /*Posição da imagem do background*/
    width: 270px;
    /* Tamanho do select, maior que o tamanho da div "div-select" */
    height: 48px;
    /* altura do select, importante para que tenha a mesma altura em todo os navegadores */
    font-family: Arial, Helvetica, sans-serif;
    /* Fonte do Select */
    font-size: 18px;
    /* Tamanho da Fonte */
    padding: 13px 20px 13px 12px;
    /* Configurações de padding para posicionar o texto no campo */
    color: #fff;
    /* Cor da Fonte */
    text-indent: 0.01px;
    /* Remove seta padrão do FireFox */
    text-overflow: "";
}

/* Remove seta padrão do FireFox */
.div-select select::-ms-expand {
    display: none;
}
/* Remove seta padrão do IE*/
    </style>
</head>
<body>

<header>
    <h1>Carrinho</h1>
    <img src="virtual center.jpg" alt="Logo do Site">
</header>

<nav>
    <a href="index.php">Nossa Historia</a>
    <a href="produtos.php">Produtos</a>
    <a href="cadastro.php">Cadastro</a>
    <a href="carrinho.php">Carrinho</a>
</nav>

<?php
    // Tabela de preços associando o nome do produto ao seu preço
    $tabelaPrecos = array(
        "chinelo tubarão" => 80,
        "paleta de maquiagem" => 45,
        "moletom masculino" => 90,
        "boné infantil" => 35,
        "tênis all star" => 100,
        "fone de ouvido" => 198
    );

    // Verifica se a variável Produtos está definida na URL
    if (isset($_GET['Produtos'])) {
        // Obtém a string de produtos da URL
        $produtosString = $_GET['Produtos'];
        
        // Converte a string de produtos de volta para um array
        $produtosArray = explode(',', $produtosString);

        // Inicializa o total
        $total = 0;

        // Soma os preços dos produtos
        foreach ($produtosArray as $produto) {
            // Verifica se o produto está na tabela de preços
            if (array_key_exists($produto, $tabelaPrecos)) {
                // Adiciona o preço do produto ao total
                $total += $tabelaPrecos[$produto];
            }
        }

        
        // Exibe os produtos e o total
        echo '<h2 style="margin: 0px 0px 0px 20px; padding: 5px;">Produtos Selecionados:</h2>';
        echo '<ul>';
        foreach ($produtosArray as $produto) {
            echo '<li>' . $produto . '</li>';
        }
        echo '</ul>';

        echo '<h4 id="total">Preço: R$ ' . number_format($total, 2, ',', '.') . '</h4>';
    } else {
        echo '<p id="p_teste">Nenhum produto selecionado.</p>';
    }

    
?>

<h2 style="padding: 0px 0px 0px 20px;">Frete</h2>

<div>
    <label for="cepDestino">CEP de Destino:</label>
    <input type="text" id="cepDestino" placeholder="Digite o CEP de destino">
    <button onclick="calcularFrete()">Calcular</button>
</div>
<div id="resultado"></div>

<h4 id="totalFrete">Total a pagar (com frete): R$ 0.00</h4>
<!-- Modos de pagamento -->
<h2 style="padding: 0px 0px 0px 20px;">Formas de pagamentos</h2>
<div class="div-select">
    <select style="margin: 0px 0px 0px 20px; padding: 5px;" name="formas_pagemento" id="pag">
        <option value="pix">PIX</option>
        <option value="cartao">CARTÃO</option>
        <option value="dimdim">DINHEIRO</option>
    </select>
</div>

<section id="checkout">
    <!-- Adicione formulários ou botões de checkout aqui -->
    <button id="btm_fin" class="btn btn-2 btn-sep icon-cart">Finalizar compra</button>
</section>
<?php
// Substitua pelos detalhes de conexão ao banco de dados
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

// Substitua 'usuario_id_logado' pelo ID do usuário logado
$usuario_id_logado = 1; // Altere conforme sua lógica de autenticação

// Consulta SQL para recuperar histórico de compras
$query = "SELECT produto, data FROM compras WHERE nome_usuario = $usuario_id_logado";
$resultado = $conn->query($query);

// Exiba o histórico
if ($resultado->num_rows > 0) {
    echo '<h2>     Histórico de Compras</h2>';
    echo '<ul>';
    while ($row = $resultado->fetch_assoc()) {
        echo '<li>' . $row['produto'] . ' em ' . $row['data'] . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Nenhum histórico de compras disponível.</p>';
}

// Feche a conexão
$conn->close();
?>
<footer>
    <p>&copy; 3°DS - Letícia, Mateus e Rafael</p>
</footer>

<script>
    var produtosArray = [];

    <?php
    // Verifica se a variável Produtos está definida na URL
    if (isset($_GET['Produtos'])) {
        // Obtém a string de produtos da URL
        $produtosString = $_GET['Produtos'];
        
        // Converte a string de produtos de volta para um array
        $produtosArrayPHP = explode(',', $produtosString);
    ?>
        // Adiciona os produtos do PHP à lista produtosArray em JavaScript
        produtosArray = <?php echo json_encode($produtosArrayPHP); ?>;
    <?php
    }
    ?>
    <?php
    // Verifica se a variável Produtos está definida na URL
    if (isset($_GET['User_logado'])) {
        // Obtém a string de produtos da URL
        $usuarioString = $_GET['User_logado'];
        
    ?>
        // Adiciona os produtos do PHP à lista produtosArray em JavaScript
        Usuario_logado = <?php echo json_encode($usuarioString); ?>;
    <?php
    }
    ?>

window.onload = function() {
        calcularFrete();

        btm_fin.addEventListener("click", function() {
            var minhaDiv = document.getElementById('p_teste');
            if (minhaDiv !== null) {
                // A div com o ID especificado existe
                alert('Não existem produtos no carrinho');
            } else {
                // A div com o ID especificado não existe
                alert('Compra finalizada');

                // Chama o arquivo PHP para cadastrar os produtos
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "finalizar_compra.php?Usuario = " + Usuario_logado + "& Produtos=" + encodeURIComponent(produtosArray.join(',')), true);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        // O arquivo finalizar_compra.php foi chamado com sucesso
                        console.log(xhr.responseText);
                    } else {
                        // Ocorreu um erro ao chamar o arquivo finalizar_compra.php
                        console.error('Erro ao chamar finalizar_compra.php. Status: ' + xhr.status);
                    }
                };
                xhr.send();
            }
        });
    };

    function calcularFrete() {
        var cepDestino = document.getElementById('cepDestino').value;
        var resultadoDiv = document.getElementById('resultado');
        var totalDiv = document.getElementById('totalFrete');

        // Validação básica
        if (!cepDestino) {
            resultadoDiv.innerHTML = 'Por favor, digite o CEP de destino.';
            return;
        }

        // Definindo o custo fixo do frete
        var custoFreteFixo = 45.00;

        // Exibindo o valor do frete
        resultadoDiv.innerHTML = 'Frete: R$ ' + custoFreteFixo.toFixed(2);

        // Calcular o total (preço dos produtos + frete fixo)
        var totalProdutos = parseFloat(document.getElementById('total').innerHTML.replace('Preço: R$ ', '').replace(',', '.'));
        var totalComFrete = totalProdutos + custoFreteFixo;

        // Exibir o total (preço dos produtos + frete fixo)
        totalDiv.innerHTML = 'Total a pagar (com frete): R$ ' + totalComFrete.toFixed(2);
    }

    btm_fin.addEventListener("click", function() {
    var minhaDiv = document.getElementById('p_teste');
    if (minhaDiv !== null) {
        // A div com o ID especificado existe
        alert('Não existem produtos no carrinho');
    } else {
        // A div com o ID especificado não existe
        alert('Compra finalizada');

        // Chama o arquivo PHP para cadastrar os produtos
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "finalizar_compra.php?Produtos=" + encodeURIComponent(produtosArray.join(',')), true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                // O arquivo finalizar_compra.php foi chamado com sucesso
                console.log(xhr.responseText);
            } else {
                // Ocorreu um erro ao chamar o arquivo finalizar_compra.php
                console.error('Erro ao chamar finalizar_compra.php. Status: ' + xhr.status);
            }
        };
        xhr.send();
    }
});
</script>
</body>
</html>
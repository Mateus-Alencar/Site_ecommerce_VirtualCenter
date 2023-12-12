<!DOCTYPE html>
<html lang="en">
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
        .produto {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    text-align: center;
}
.custom-button {
            background-image: url('carrinho.png');
            background-size: cover; /* Para cobrir todo o botão */
            width: 40px; /* Largura do botão */
            height: 40px; /* Altura do botão */
            border: 2px solid green; /* Remover borda padrão do botão */
            color:transparent; /* Cor do texto no botão */
            font-size: 16px; /* Tamanho da fonte do texto */
            cursor: pointer; /* Altera o cursor ao passar sobre o botão */
            margin: 5;
        }
        @import url('https://fonts.googleapis.com/css?family=Lato:100&display=swap');

        .btn {
          width: 180px;
          height: 60px;
          cursor: pointer;
          background: transparent;
          border: 1px solid green;
          outline: none;
          transition: 1s ease-in-out;
        }

        svg {
          position: absolute;
          left: 0;
          top: 0;
          fill: none;
          stroke: black;
          stroke-dasharray: 150 480;
          stroke-dashoffset: 150;
          transition: 1s ease-in-out;
        }

        .btn:hover {
          transition: 1s ease-in-out;
          background: green;
        }

        .btn:hover svg {
          stroke-dashoffset: -480;
        }

        .btn span {
          color: black;
          font-size: 18px;
          font-weight: 100;
        }
        #loginBtn {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-right: auto; /* Isso posicionará o botão à esquerda */
            margin-left: 10px; /* Adicionando um pequeno espaço à esquerda */
        }
    </style>
</head>

<body>
<header>
    <h1>Produtos</h1>
    <img src="virtual center.jpg" alt="Logo do Site">
    
</header>

<nav>
    <a href="index.php">Nossa Historia</a>
    <a href="produtos.php">Produtos</a>
    <button id="botao_carrinho" style="border:0; background-color: transparent; color:white; font-size:15px" >Carrinho</button>
    <a href="Cadastro.php">Cadastro</a>
    <!-- Adicionei o botão de login aqui -->
    <button id="loginBtn" onclick="location.href='login.php'">Login</button>
</nav>


<div style="display: flex; text-align: center;" class="barra_produtos">
  <h1>Produtos</h1>
  <div style="position: relative; margin-left: auto;">
      <span id="span_num" style="position: absolute; top: 5px; left: 20px; background-color: #4285f4; color: #fff; border-radius: 50%; padding: 5px;">0</span>
      <button id="btn_compras" style="background: transparent; border: transparent;" onclick="updateCartBox()">
        <img style="max-width: 70px; max-height: 30px; width: auto; height: auto; margin-right: 30px; margin-top: 20px;" src="carrinho.png">
    </button>
           <div id="caixaDeCompras" style="display: none; position: fixed; top: 280px; right: 55px; width: 150px; height: 200px; overflow: auto; background-color: #fff; border: 1px solid #ccc; padding: 10px;"></div>

  </div>
</div>

    <div class="produto">
        <img src="fone.jpg" alt="Produto 1">
        <h2>Fone de Ouvido Bluetooth Gamer in-ear sem fio WB Bits</h2>
        <p>- Design Inovador
            - Modo Jogo
            - Som 360°
            - Resistência a líquidos
            - Controle por Toque
            - Bateria
            - Qualidade Sonora</p>
        <p>Preço: R$ 198,00
            <div class="container">
                <div class="center">
                  <button class="btn" onclick="incrementNum('fone de ouvido')">
                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                    </svg>
                    <span>Comprar</span>
                  </button>
                </div>
              </div></p>
    </div>

    <div class="produto">
        <img src="tenisallstar.jpg" alt="Produto 2">
        <h2>Tênis All Star Feminino Chunky</h2>
        <p>Disponivel nas cores:
            -Preto
            -Branco
            -Lilas
            -Rosa
            -Azul
            -Verde
            -Amarelo
            -Vermelho
            -Roxo
            Do 34 ao 49
        </p>
        <p>Preço: R$ 180,00
            <div class="container">
                <div class="center">
                  <button class="btn" onclick="incrementNum('tênis All Star')">
                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                    </svg>
                    <span>Comprar</span>
                  </button>
                </div>
              </div>
        </p>
    </div>

    <div class="produto">
        <img src="bone.jpg" alt="Produto 3">
        <h2>
            Boné Infantil Estampado Sonic</h2>
        <p>- Ideal para crianças de 04 até 10 anos.
 
            Medidas aproximadas:
            58cm de circunferência
            7cm de aba</p>
        <p>Preço: R$ 35,00
            <div class="container">
                <div class="center">
                  <button class="btn" onclick="incrementNum('boné infantil')">
                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                    </svg>
                    <span>Comprar</span>
                  </button>
                </div>
              </div>
        </p>
    </div>

    <div class="produto">
        <img src="tubarao.jpg" alt="Produto 4">
        <h2>Chinelo Nuvem Tubarão Adulto</h2>
        <p>Disponivel do 34 ao 41, nas cores:
            -Amarelo
            -Azul
            -Rosa
        </p>
        <p>Preço: R$ 80,00
            <div class="container">
                <div class="center">
                  <button class="btn" onclick="incrementNum('chinelo tubarão')">
                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                    </svg>
                    <span>Comprar</span>
                  </button>
                </div>
              </div>
        </p>
    </div>

    <div class="produto">
        <img src="moletom.jpg" alt="Produto 5">
        <h2>Moletom Masculino Estampa Cartoon</h2>
        <p>Disponivel nas cores:
            -Branco
            -Amarelo
            -Azul
            -Preto
        </p>
        <p>Preço: R$ 90,00
            <div class="container">
                <div class="center">
                  <button class="btn" onclick="incrementNum('moletom masculino')">
                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                    </svg>
                    <span>Comprar</span>
                  </button>
                </div>
              </div>
        </p>
    </div>

    <div class="produto">
        <img src="paleta.jpg" alt="Produto 6">
        <h2>Paleta de maquiagem 78 cores</h2>
        <p>Junto com as cores de sobra vem também pó, Blush e batom</p>
        <p>Preço: R$ 45,00
            <div class="container">
                <div class="center">
                  <button class="btn" onclick="incrementNum('paleta de maquiagem')">
                    <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                      <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                    </svg>
                    <span>Comprar</span>
                  </button>
                </div>
              </div>

        </p>
    </div>
    <footer>
        <p>&copy; 3°DS - Letícia, Mateus e Rafael</p>
    </footer>
   
    <script>
      <?php
if (isset($_GET['user'])) {
        // Obtém a string de produtos da URL
        $usuario = $_GET['user'];
}else{
  $usuario = 'Login';
}?>
// No início do seu script, declare uma variável para armazenar os produtos selecionados
var selectedProducts = [];


// Depois, adicione essas funções ao seu script

function incrementNum(productName) {
    var spanNum = document.getElementById('span_num');
    var currentValue = parseInt(spanNum.innerText);
    var newValue = currentValue + 1;
    spanNum.innerText = newValue;

    // Adiciona o nome do produto à caixa de rolagem
    selectedProducts.push(productName);

    // Verifica se o usuário está logado antes de adicionar produtos ao carrinho
    checkUserLogin();
}

var usuario = "<?php echo $usuario; ?>";

function checkUserLogin() {
    var loginBtn = document.getElementById('loginBtn');

    if (usuario === 'Login') {
        // Se o usuário não estiver logado, redirecione para a página de cadastro
        window.location.href = "cadastro.php";
    } else {
        // Se o usuário estiver logado, troque o texto do botão pelo valor do $usuario
        loginBtn.innerHTML = usuario;
    }
}

function updateCartBox() {
    var cartBox = document.getElementById('caixaDeCompras');
    cartBox.innerHTML = '<h3>Produtos Selecionados</h3>';
    
    for (var i = 0; i < selectedProducts.length; i++) {
        cartBox.innerHTML += '<p>' + selectedProducts[i] + '</p>';
    }

    // Mostra a caixa de rolagem
    cartBox.style.display = 'block';
}
function closeCartBox() {
    var cartBox = document.getElementById('caixaDeCompras');
    cartBox.style.display = 'none';
}
document.addEventListener('mouseup', function(event) {
    var cartBox = document.getElementById('caixaDeCompras');
    var btnCompras = document.getElementById('btn_compras');

    if (!cartBox.contains(event.target) && event.target !== btnCompras) {
        closeCartBox();
    }
});
window.addEventListener('scroll', function() {
    closeCartBox();
});

botao_carrinho.addEventListener("click", function() {
  var produtosParaEnviar = selectedProducts.join(',');
  window.location.href = "carrinho.php?Produtos=" + produtosParaEnviar + "& User_logado=" + usuario;
});

    </script>

</body>
</html>
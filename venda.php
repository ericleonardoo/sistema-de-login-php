<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurum Motors</title>
    <link rel="stylesheet" href="venda.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><img src="./imagens/logoaurumpng.png" alt="Logo Aurum"></div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#carros">Carros</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#contato">Contato</a></li>
                <a href="carrinho.php" class="botao-carrinho"><i class="fi fi-rr-shopping-cart"></i></a>
            </ul>
        </nav>
    </header>

    <video class="video" autoplay loop muted>
        <source src="./video/revuelto.mp4" type="video/mp4">
        Seu navegador não suporta a tag de vídeo.
    </video>
    <section class="home" id="home">
        <div class="home-conteudo">
            <h1>Experiência de <span class="highlight">Luxo</span> e Desempenho</h1>
            <p>Explore a coleção exclusiva de carros de alta performance</p>
            <button class="botao-cta" href="#secao-carros">Explorar</button>
        </div>
    </section>

    <section class="secao-carros" id="carros">
        <h2 class="secaocarros-titulo">Nossa Frota</h2>
        <div class="grid-carros">
            <?php
            session_start();
            include "classes.php";
            $vendeProduto = new Produto("", "", "", "");
            $produtos = $vendeProduto->consultaProduto();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $quantidade = $_POST['quantidade'];
                if (!isset($_SESSION['carrinho'])) {
                    $_SESSION['carrinho'] = [];
                }
                if (isset($_SESSION['carrinho'][$id])) {
                    $_SESSION['carrinho'][$id] += $quantidade;
                } else {
                    $_SESSION['carrinho'][$id] = $quantidade;
                }
                echo "<script>alert('Produto adicionado ao carrinho!');</script>";
            }

            if ($produtos && count($produtos) > 0) {
                foreach ($produtos as $prod) {
                    echo "<div class='card-produto scroll-animate'>
                                <div class='imagem-produto-container'>
                                    <img src='{$prod['caminhoImagem']}' alt='{$prod['produto']}' class='imagem-produto'>
                                </div>
                                <div class='info-produto'>
                                    <div class='descricao-produto'>
                                        <h4 class='nome-produto'>{$prod['produto']}</h4>
                                    </div>
                                    <div class='preco-produto-container'>
                                        <span class='preco-produto'>R$ {$prod['preco']}</span>
                                    </div>
                                    <form method='post' class='adicionar-no-carrinho'>
                                        <input type='hidden' name='id' value='{$prod['id']}'>
                                        <input type='number' name='quantidade' value='1' min='1' class='quantidade'>
                                        <button type='submit' class='adicionar-no-carrinho-botao'>
                                            Adicionar
                                        </button>
                                    </form>
                                </div>
                            </div>";
                }
            } else {
                echo "<p'>Nenhum produto disponível no momento.</p>";
            }
            ?>
        </div>
    </section>

    <footer>
        <div class="conteudo-footer">
            <div class="footer-section">
                <h3>Aurum<span style="color: #ff1a1a;">Motors</span></h3>
                <p style="color: #aaa;">Experiência premium em mobilidade de luxo desde 2025.</p>
            </div>
            <div class="copyright-footer">
                <p>&copy; 2025 Aurum Motors. Todos os direitos reservados.</p>
            </div>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Vendas</title>
</head>
<body>
    <h2>Loja de Produtos</h2>
    <a href="carrinho.php">Ver Carrinho</a><br><br>
    <?php
        session_start();
        include "classes.php";
        $vendeProduto = new Produto("","","","");
        $produtos = $vendeProduto->consultaProduto();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $quantidade = $_POST['quantidade'];
            if(!isset($_SESSION['carrinho'])) {
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
                echo "<img src='{$prod['caminhoImagem']}' alt='{$prod['produto']}''>
                <h3>{$prod['produto']}</h3>
                <p>R$ {$prod['preco']}</p>
                <form method='post'>
                <input type='hidden' name='id' value='{$prod['id']}'>
                <input type='number' name='quantidade' value='1' min='1'>
                <button type='submit'>Comprar</button>
                </form>";
            }
        } else {
            echo "<p>Nenhum produto disponível.</p>";
        }
    ?>
</body>
</html>
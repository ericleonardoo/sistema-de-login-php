<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
<body>
    <h2>Carrinho de Compras</h2>
    <a href="venda.php">Continuar Comprando</a><br><br>
    <?php
        session_start();
        include "classes.php";
        $vendeProduto = new Produto("","","","");
        $produtos = $vendePrroduto->consultaProduto();
        $carrinho = $_SESSION['carrinho'] ?? [];
        if (isset($_POST['finalizar'])) {
            foreach ($carrinho as $id => $qtd) {
                $vendeproduto->vendeProduto($id,$qtd);
            }
            echo "<script>alert('Compra realizada com sucesso!');</script>";
            $_SESSION['carrinho'] = [];
            $carrinho = [];
        }
        if (empty($carrinho)) {
            echo "<p>Seu carrinho está vazio.</p>";
        } else {
            echo "<table>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                </tr>";
            $totalGeral = 0;
            foreach ($carrinho as $id => $qtd) {
                foreach ($produtos as $prod) {
                    if($prod['id'] == $id) {
                        $total = $prod['preco'] * $qtd;
                        $totalGeral += $total;
                        echo "<tr>
                        <td><img src='{prod['caminhoImagem']}' width='60'></td>
                        <td>{$prod['produto']}</td>
                        <td>R$ {$prod['preco']}</td>
                        <td>{$qtd}</td>
                        <td> R$ " . $total ."</td>
                        </tr>";

                    }
                }
            }
            echo "<tr>
                    <td colspan='4'>Total Geral</td>";
        }
    ?>
</body>
</html>
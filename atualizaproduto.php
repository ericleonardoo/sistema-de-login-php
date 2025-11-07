<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza Produtos</title>
</head>

<body>
    <?php
    include "classes.php";
    $atuProduto = new Produto("", "", "", "");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $acao = $_POST['acao'];
        if ($acao === 'salvar') {
            $produto = $_POST['nome'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];
            $categoria = $_POST['categoria'];
            $atuProduto->setProduto($produto);
            $atuProduto->setPreco($preco);
            $atuProduto->setQuantidade($quantidade);
            $atuProduto->setCategoria($categoria);
            $atuProduto->atualizaProduto($id);
        } elseif ($acao === 'apagar') {
            $atuProduto->apagaProduto($id);
        }
    }
    $produtos = $atuProduto->consultaProduto();
    if ($produtos && is_array($produtos) && count($produtos) > 0) {
        echo "<h2>Produtos Cadastrados:</h2>";
        echo "<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>";
        foreach ($produtos as $prod) {
           echo "<tr>
            <form action='' method='post'>
            <td>{$prod['id']}<input type='hidden' name='id' value='{$prod['id']}'></td>
            <td><input type='text' name='nome' value='{$prod['produto']}'></td>
            <td><input type='number' step='0.01' name='preco' value='{$prod['preco']}'></td>
            <td><input type='number' name='quantidade' value='{$prod['quantidade']}'></td>
            <td><input type='text' name='categoria' value='{$prod['categoria']}'></td>
            <td><button type='submit' name='acao' value='salvar'>Salvar</button></td>
            <td><button type='submit' name='acao' value='apagar'>Apagar</button></td>
            </form>
            </tr>";
        }
        echo "</tdbody></table>";
    } else {
        echo "<p>Nenhum produto cadastrado.</p>";
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra Imagens</title>
</head>
<body>
    <h2>Olá
        <?php 
            session_start();
            if(!isset($_SESSION['admin'])) {
                header("Location: loginadmin.html");
                exit;
            } else {
                echo htmlspecialchars($_SESSION['admin_nome']);
            }
        ?>
    </h2>
    <?php
        include "classes.php";
        $atuImagem = new Produto ("", "", "", "");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $produto = $_POST['produto'];
            $foto = $_FILES['foto'];
            $atuImagem->cadastraImagem($id,$produto,$foto);
        }
        $produtos = $atuImagem->consultaProduto();
        if ($produtos && is_array($produtos) && count($produtos) > 0) {
            echo "<h2>Produtos Cadastrados</h2>";
            echo "<table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PRODUTO</th>
                            <th>IMAGEM</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
            ";
        foreach ($produtos as $prod) {
            echo "<tr>
                <form action='' method='post' enctype='multipart/form-data'>
                <td>
                {$prod['id']}
                <input type='hidden' name='id' value='{$prod['id']}'>
                </td>
                <td>{$prod['produto']}</td>
                    <input type=hidden' name='produto' value='{$prod['produto']}'>
                <td>";
        if (!empty($prod['caminhoImagem'])  && file_exists($prod['caminhoImagem'])) {

            echo "<img src='{$prod['caminhoImagem']}' alt='Imagem do produto' width='100'><br>";
        } else {
            echo "<em>Sem imagem</em><br>";
        };
        echo "</td>
                <td><input type='file' name='foto' accept='image/*' required>
                <td><button type='submit'>Enviar</button></td>
                </form>
                </tr>";
        }
        echo "</tbody></table>";
        }
    ?>
</body>
</html>
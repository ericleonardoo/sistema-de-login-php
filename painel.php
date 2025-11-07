<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .titulo {
        text-align: center;
        color: #333;
    }

    .logout {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #ff4d4d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .logout:hover {
        background-color: #e60000;
    }
</style>

<body>
    <h2>
        Olá
        <?php 
            session_start();
            if(!isset($_SESSION['usuario'])) {
                header("Location: login.html");
                exit();
            }else {
                echo htmlspecialchars($_SESSION['usuario']);
            }
        ?>
    </h2>
    <p><a href="logout.php">Sair</a></p>
    <br>
    <p><a href="alterarsenha.html">Alterar Senhe</a></p>
    <br>
    <p><a href="cadastraproduto.php">Cadastrar Produto</a></p>
    <br>
    <p><a href="atualizaproduto.php">Atualizar Produtos</a></p>
    <p><a href="cadastraimagem.php">Cadastra Imagens</a></p>
</body>
</html>
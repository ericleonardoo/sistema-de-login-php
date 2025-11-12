<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e3f2fd, fbefbbff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            max-width: 450px;
            width: 100%;
            padding: 30px 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #1e88e5;
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            margin: 15px 0;
        }

        a {
            display: inline-block;
            width: 80%;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            color: white;
            background-color: #d4af37;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #d4af37;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(30, 136, 229, 0.3);
        }

        a.logout {
            background-color: #ef5350;
        }

        a.logout:hover {
            background-color: #e53935;
            box-shadow: 0 5px 12px rgba(229, 57, 53, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>
            Olá,
            <?php 
                session_start();
                if(!isset($_SESSION['admin'])) {
                    header("Location: loginadmin.html");
                    exit();
                } else {
                    echo htmlspecialchars($_SESSION['admin_nome']);
                }
            ?>
        </h2>

        <p><a href="logout.php" class="logout">Sair</a></p>
        <p><a href="alterarsenha.html">Alterar Senha</a></p>
        <p><a href="cadastroadmin.html">Cadastra novos admins</a></p>
        <p><a href="cadastraproduto.php">Cadastrar Produto</a></p>
        <p><a href="atualizaproduto.php">Atualizar Produtos</a></p>
        <p><a href="cadastraimagem.php">Cadastrar Imagens</a></p>
        <p><a href="venda.php">Loja de Produtos</a></p>
    </div>
</body>

</html>

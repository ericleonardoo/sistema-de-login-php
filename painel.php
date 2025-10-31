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
    <div class="container">
        <h2 class="titulo">Bem-vindo,
            <?php
            session_start();
            if(!isset($_SESSION['usuario'])){
                header("Location: login.html");
                exit;
            } else {
                echo htmlspecialchars($_SESSION['usuario_nome']);
            }
            ?>
        </h2>
        <p><a href="logout.php" class="logout">Sair</a></p>
    </div>
</body>

</html>
Senha do InfinityFree: TWSE3bpigb



sql100.infinityfree.com
if0_40230953
TWSE3bpigb
if0_40230953_tomazinhodophp





<?php
    include "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST['nome']);
        $sobrenome = htmlspecialchars($_POST['sobrenome']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $data_nascimento = $_POST['data_nascimento'];
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
        try {
            $valida = "SELECT 1 FROM cadastro WHERE email = '$email'";
            $result = mysqli_query($conn, $valida);
            if (mysqli_num_rows($result) == 1) {
                echo "E-mail já cadastrado.";
            } else {
                $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
                $sql = "INSERT INTO cadastro (nome, sobrenome, telefone, data_nascimento, email, senha)
                        VALUES ('$nome', '$sobrenome', '$telefone', '$data_nascimento', '$email', '$hash_senha')";
                        mysqli_query($conn, $sql);
                        echo "Cadastro realizado com sucesso! <a href='login.html'>Login</a>";
            }
        } catch (mysqli_sql_exception $e) {
            die('Erro ao processar o cadastro.' . $e->getMessage());
        } finally {
            mysqli_close($conn);
        }
    }
?>







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
        <p><a href="logout.php" class="logout">Sair</a></p><br>
        <p><a href="alterarsenha.html">Alterar Senha</a></p>
    </div>
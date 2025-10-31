<?php
    session_start();
    include "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "SELECT id, nome, email, senha FROM cadastro WHERE email = '$email' AND senha = '$senha'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $usuario  = mysqli_fetch_assoc($result);
            if ($usuario['email'] && password_verify($usuario,$senha["password"])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario'] = $email;
                if (isset($_POST['lembrar'])) {
                    setcookie('lembrar_email', $email, time() + 3600, "/");
                } else {
                    setcookie('lembrar_email', '', time() - 3600, "/");
                }
                header("Location: painel.php");
                exit;
            } else {
                echo "Email e/ou senha incorreto.";
            }
        } else  {
            echo "Email e/ou senha incorreto.";
        }
        mysqli_close($conn);
    }
?>